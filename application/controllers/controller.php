<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
	//carga librerias 
	function __construct(){
		parent::__construct();
		$this->load->model("modelo");
		$this->load->library('session');
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
	}
//divicion de pagina
	public function index()
	{
		$this->load->view('head');
		$this->load->view('body');
		$this->load->view('footer');
	}
//carga sistema segun usuario
	function charger(){
		//primero consulta si existe un usuario logeado
		if ($this->session->userdata('logged')) {
			//si lo esta consulta por el tipo
			switch($this->session->userdata('type')){
				case '1':
				$data['name'] = $this->session->userdata('name');
				$data['surname'] = $this->session->userdata('surname');
				//si es coordinador pasa se carga su vista y nombre de usuario
				$this->load->view('coordinator/home-coordinator', $data);
				break;
				case '2':
				$data['name'] = $this->session->userdata('name');
				$data['surname'] = $this->session->userdata('surname');
				//si es profesor pasa se carga su vista y nombre de usuario
				$this->load->view('teacher/home-teacher', $data);
				break;
				case '3':
				$data['name'] = $this->session->userdata('name');
				$data['surname'] = $this->session->userdata('surname');
				//si es alumno pasa se carga su vista y nombre de usuario
				$this->load->view('student/home-student', $data);
				break;
			}
		} else {
			//de no existir un usuario loggeado se envia al login
			$this->load->view('login');
		}
	}
//carga la session
	function load_user(){
	//se extrae los valores de los campos de login
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
    //se declaran los mensajes
		$msjs = '';
		$msje = '';
		$msjw = '';
		//se declara las variables
		$cookies = '';
		$datos['rut'] = ''; 
		$datos['type'] = '';
		$datos['first_name'] = '';
		$datos['first_surname'] = '';
    //se validan los campos para que no sean vacios
		if ($user != '' && $pass != '') {
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
			if($datos['type'] != 0) {
				$cookies['logged'] = true;
				//se caga la session
				$this->session->set_userdata($cookies);
				//se almacena un mensaje 
				$msjs = 'Login is succesfull!';
			} else {
				$cookies['logged'] = false;
				//se carga la sesion vacia
				$this->session->set_userdata($cookies);
				//se indica el mensaje
				$msje = 'User not exist!';
			}
		} else {
			//se carga el mensaje de que los campos son vacios
			$msjw = 'the fields are empty';
		}
		//se envia mediante json los mensajes de respuesta
		echo json_encode(array(
			"message_s" => $msjs, 
			"message_e" => $msje,
			"message_w" => $msjw
		));}

	//cierra la session
		function close_session(){
			$this->session->sess_destroy();
			$msjclose= 'Close session';
			echo json_encode(array('messageclose' => $msjclose));}

		//carga los menus de los usuarios en la vista general
			function teacher_menu(){
				$this->load->view('coordinator/menu-teacher');
			}
			function new_teacher(){
				$this->load->view('coordinator/new-teacher');
			}


			function save_teacher(){
		//se extrae los datos de la vista
				$rut = $this->input->post('rut');
				$first_name = $this->input->post('first_name');
				$middle_name = $this->input->post('middle_name');
				$first_surname = $this->input->post('first_surname');
				$second_surname = $this->input->post('second_surname');
				$user_name = $this->input->post('user_name');
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				$type = 2;
		//se declaran los mensajes
				$msjs = '';
				$msje = '';
				$msjf = '';

				if(	$rut != '' && 
					$first_name != '' && 
					$middle_name != '' && 
					$first_surname != '' && 
					$second_surname != '' &&
					$user_name != '' &&
					$password != '' &&
					$password_confirm != ''
				){
			//se consulta por el nombre de usuario para que no se repita
					if($this->modelo->confirm_user($user_name) == false){
				//si logra pasar se genera la consulta
						if($this->modelo->save_teacher($rut,$first_name,$middle_name,$first_surname,$second_surname,$user_name,$password,$type) == true){
					//si se completa correctamente se indica con un mensaje
							$msjs = "the teacher has been created";
						}else{
					//si no se indica el error
							$msje = "a error has ocurred, pleace try agaen";
						}
					}
				}else{
					$msjf = 'the fields are empty';
				}
				
				echo json_encode(array(
					'message_s' => $msjs,
					'message_e' => $msje,
					'message_f' => $msjf
				));

			}







		}
