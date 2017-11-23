<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
	//carga librerias 
	function __construct(){
		parent::__construct();
		$this->load->model("modelo");
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
		$this->load->library('session');
		$this->load->library('form_validation');
	}
//divicion de pagina
	public function index()
	{
		$this->load->view('head');
		$this->load->view('body');
		$this->load->view('footer');
	}
//carga sistema según usuario
	function charger(){
		//primero consulta si existe un usuario logeado
		if ($this->session->userdata('logged')) {
			//si lo esta consulta por el tipo
			switch($this->session->userdata('type')){
				case 'Coordinator':
				$data['name'] = $this->session->userdata('name');
				$data['surname'] = $this->session->userdata('surname');
				//si es coordinador pasa se carga su vista y nombre de usuario
				$this->load->view('coordinator/home-coordinator', $data);
				break;
				case 'Teacher':
				$data['name'] = $this->session->userdata('name');
				$data['surname'] = $this->session->userdata('surname');
				//si es profesor pasa se carga su vista y nombre de usuario
				$this->load->view('teacher/home-teacher', $data);
				break;
				case 'Student':
				$data['name'] = $this->session->userdata('name');
				$data['surname'] = $this->session->userdata('surname');
				//si es alumno pasa se carga su vista y nombre de usuario
				$this->load->view('student/home-student', $data);
				break;
			}
		} else {
		//de no existir un usuario loggeado se envia al login
			$this->load->view('login');
		}}
//carga la session
//Carga Sesión de Usuario

//se extrae los valores de los campos de login
	function load_user(){
		$user = $this->input->post('user');
		$pass = md5($this->input->post('pass'));
    //se declaran los mensajes
		$msjs = '';
		$msje = '';
		$msjw = '';
	//se declara las variables
		$cookies = '';
    //se validan los campos para que no sean vacios
		if ($this->c_valide_field($user) || $this->c_valide_field($pass)) {
		//se consulta al modelo por usuario y su pass
			$datos = $this->modelo->login($user, $pass);
		//la respuesta se almacena en un arreglo
			$cookies = array(
				"user" => $user, 
				"rut" => $datos['rut'], 
				"type" => $datos['type'], 
				"name" => $datos['first_name'],
				"surname" => $datos['first_surname']);
			//se consulta si la respuesta es vacia para continuar
			if($datos['type'] != '') {
				$cookies['logged'] = true;
				//se caga la session
				$this->session->set_userdata($cookies);
				//se almacena un mensaje 
				$msjs = "<strong class='black-text'>Welcome!</strong>";
			} else {
				$cookies['logged'] = false;
				//se carga la sesion vacia
				$this->session->set_userdata($cookies);
				//se indica el mensaje
				$msje = "<strong class='black-text'>User don't exist!</strong>";
			}
		} else {
			//se carga el mensaje de que los campos son vacios
			$msjw = "<strong class='black-text'>The fields are empty!</strong>";
		}
		//se envia mediante json los mensajes de respuesta
		echo json_encode(array(
			"message_load_user_s" => $msjs, 
			"message_load_user_e" => $msje,
			"message_load_user_w" => $msjw
		));}
	//Cierra Sesión
		function close_session(){
			$this->session->sess_destroy();
			$msjclose= "<strong class='black-text'>Log Out!</strong>";
			echo json_encode(array('message_close' => $msjclose));}
//carga los menus de los usuarios en la vista general
	function teacher_menu(){$this->load->view('coordinator/menu-teacher');}
	function new_teacher(){$this->load->view('coordinator/new-teacher');}
	function student_menu(){$this->load->view('teacher/menu-student');}
	function new_student(){$this->load->view('teacher/new-student');}
//Guardar Profesor --vista Coordinador
function save_teacher(){
		//se extrae los datos de la vista 
				$rut = $this->input->post('rut');
				$first_name = $this->input->post('first_name');
				$middle_name = $this->input->post('middle_name');
				$first_surname = $this->input->post('first_surname');
				$second_surname = $this->input->post('second_surname');
				$name_user = $this->input->post('name_user');
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				$type = "Teacher";
		//array para validar campos vacios y coincidenca de password 

			$validate = array(
				'rut' => $rut,
				'first_name' => $first_name,
				'middle_name' => $middle_name,
				'first_surname' => $first_surname,
				'second_surname' => $second_surname,
				'name_user' => $name_user,
				'password' => $password,
				'password_confirm' => $password_confirm,
				'type' => $type);
		//declarando
			$msj_load_teacher = array();
			$m = array();
			$si = 0;
			$no = 0;	
		//si campos son Vacios	
				if ($this->c_valide_field($validate['password'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['password_confirm'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['rut'])) {
					$si += 1;}else{$no += 1;}
				if (!$this->valida_rut($validate['rut'])) {
						$m = array('msje' => "<strong class='black-text'>The field rut Incorrect!</strong>");
						array_push($msj_load_teacher, $m);
					}else{$si += 1;}
				if ($this->c_valide_field($validate['first_name'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['middle_name'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['first_surname'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['second_surname'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['name_user'])) {
					$si += 1;}else{$no += 1;}
				if($validate['password'] != $validate['password_confirm']){
					$m = array('msje' => "<strong class='black-text'>The pass does not match</strong>");
					array_push($msj_load_teacher, $m);}else{$si += 1;}
 		//valida coexion
			if ($si === 10) {
				$pass = md5($password);
				if ($this->modelo->save_teacher($rut,$first_name,$middle_name,$first_surname,$second_surname,$name_user,$pass,$type)) {
					$m = array('msjs' => "<strong class='black-text'>Save Teacher!!</strong>");
					array_push($msj_load_teacher, $m);
				}else{
					$m = array('msje' => "<strong class='black-text'>Error!, Teacher don't save!!</strong>");
					array_push($msj_load_teacher, $m);
				}
			}else{
				if ($no >= 2) {
					$m = array('msjw' => "<strong class='black-text'>Some fields are empty or the fields have less than 3 characters!</strong>");
					array_push($msj_load_teacher, $m);
				}else{
					$m = array('msjw' => "<strong class='black-text'>one field are empty or the field have less than 3 characters!</strong>");
					array_push($msj_load_teacher, $m);
				}
			}
			echo json_encode($msj_load_teacher);}
function save_student(){
		//se extrae los datos de la vista 
				$rut = $this->input->post('rut');
				$first_name = $this->input->post('first_name');
				$middle_name = $this->input->post('middle_name');
				$first_surname = $this->input->post('first_surname');
				$second_surname = $this->input->post('second_surname');
				$name_user = $this->input->post('name_user');
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				$type = "Student";
		//array para validar campos vacios y coincidenca de password 

			$validate = array(
				'rut' => $rut,
				'first_name' => $first_name,
				'middle_name' => $middle_name,
				'first_surname' => $first_surname,
				'second_surname' => $second_surname,
				'name_user' => $name_user,
				'password' => $password,
				'password_confirm' => $password_confirm,
				'type' => $type);
		//declarando
			$msj_load_student = array();
			$m = array();
			$si = 0;
			$no = 0;	
		//si campos son Vacios	
				if ($this->c_valide_field($validate['password'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['password_confirm'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['rut'])) {
					$si += 1;}else{$no += 1;}
				if (!$this->valida_rut($validate['rut'])) {
						$m = array('msje' => "<strong class='black-text'>The field rut Incorrect!</strong>");
						array_push($msj_load_student, $m);
					}else{$si += 1;}
				if ($this->c_valide_field($validate['first_name'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['middle_name'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['first_surname'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['second_surname'])) {
					$si += 1;}else{$no += 1;}
				if ($this->c_valide_field($validate['name_user'])) {
					$si += 1;}else{$no += 1;}
				if($validate['password'] != $validate['password_confirm']){
					$m = array('msje' => "<strong class='black-text'>The pass does not match</strong>");
					array_push($msj_load_student, $m);}else{$si += 1;}
 		//valida coexion
			if ($si === 10) {
				$pass = md5($password);
				if ($this->modelo->save_teacher($rut,$first_name,$middle_name,$first_surname,$second_surname,$name_user,$pass,$type)) {
					$m = array('msjs' => "<strong class='black-text'>Save Teacher!!</strong>");
					array_push($msj_load_student, $m);
				}else{
					$m = array('msje' => "<strong class='black-text'>Error!, Teacher don't save!!</strong>");
					array_push($msj_load_student, $m);
				}
			}else{
				if ($no >= 2) {
					$m = array('msjw' => "<strong class='black-text'>Some fields are empty or the fields have less than 3 characters!</strong>");
					array_push($msj_load_student, $m);
				}else{
					$m = array('msjw' => "<strong class='black-text'>one field are empty or the field have less than 3 characters!</strong>");
					array_push($msj_load_student, $m);
				}
			}
			echo json_encode($msj_load_student);}

			
		//oders
		//Lista de Profesores Vista Coordinador

function edit_user(){
			//datos desde vista
			//Declaraciones
			//validaciones
			//llamado query
			$this->db->edit_user($rut);}

//---------Listas---------
	function teacher_list(){
		$list['datos'] = $this->modelo->user_list_teacher()->result();
		$this->load->view('coordinator/list-teacher', $list);}
	function student_list(){
		$list['datos'] = $this->modelo->user_list_student()->result();
		$this->load->view('teacher/list-student',$list);}
//---------Cargas---------
	function load_teacher(){$list = $this->modelo->user_list_teacher();	echo json_encode($list);}
	function load_student(){$list = $this->modelo->user_list_student();	echo json_encode($list);}
	function student_load_menu(){$this->load->view('teacher/menu-students');}
	function learning_load(){$this->load->view('teacher/menu-learning');}



//-------------------------validaciones-----------------------------

		//valida que los camposs no esten vacios y que no sean menores de 3 caracteres
		function c_valide_field($field){ 
		   //compruebo que el tamaño del string sea válido. 
		   if (strlen($field)<3 || strlen($field)>30){  
		      return false; 
		   } 
		   //compruebo que los caracteres sean los permitidos 
		   $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_"; 
		   for ($i=0; $i<strlen($field); $i++){ 
		      if (strpos($permitidos, substr($field,$i,1))===false){ 
		         return false; 
		      } 
		   } 
		   return true; 
		}

		/**
		 * Comprueba si el rut ingresado es valido
		 * @param string $rut RUT
		 * @return boolean
		 */

		public function valida_rut($rut)
		{
		    if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
		        return false;
		    }
		    $rut = preg_replace('/[\.\-]/i', '', $rut);
		    $dv = substr($rut, -1);
		    $numero = substr($rut, 0, strlen($rut) - 1);
		    $i = 2;
		    $suma = 0;
		    foreach (array_reverse(str_split($numero)) as $v) {
		        if ($i == 8)
		            $i = 2;
		        $suma += $v * $i;
		        ++$i;
		    }
		    $dvr = 11 - ($suma % 11);
		    if ($dvr == 11)
		        $dvr = 0;
		    if ($dvr == 10)
		        $dvr = 'K';
		    if ($dvr == strtoupper($dv))
		        return true;
		    else
		        return false;
		}

}


