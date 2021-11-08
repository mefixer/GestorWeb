<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_controller {

//carga librerias 
    function __construct(){
        parent::__construct();
        $this->load->model("modelo");
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->library('session');
        $this->load->library('form_validation');}
        //divicion de pagina
        public function index(){
                $this->load->view('head');
                $this->load->view('body');
                $this->load->view('footer');}
//carga sistema según usuario
    function charger(){
        //primero consulta si existe un usuario logeado
        if ($this->session->userdata('logged')) {
            //si lo esta consulta por el tipo
            $idgender = $this->session->userdata('gender_idgender');
            $gender = $this->modelo->gendername($idgender);
            $idrole = $this->session->userdata('role_idrole');
            $role = $this->modelo->role($idrole);
            switch($role){
                case 'Administrator':
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idadministrator'] = $this->session->userdata('idadministrator');
                $data['gender_name'] = $gender['name'];
                //si es coordinador pasa se carga su vista y nombre de usuario
                $this->load->view('administrator/home-administrator', $data);
                break;
                case 'Coordinador':
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idcoordinator'] = $this->session->userdata('idcoordinator');
                $data['gender_name'] = $gender['name'];
                //si es coordinador pasa se carga su vista y nombre de usuario
                $this->load->view('coordinator/home-coordinator', $data);
                break;
                case 'Teacher':
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idteacher'] = $this->session->userdata('idteacher');
                $data['gender_name'] = $gender['name'];
                $data['materialtype'] = $this->modelo->materialtypelist()->result();
                //se realiza guardado de inicio de session
                $fecha = date('Y-m-d H:i:s');
                $username = $this->session->userdata('username');
                $role_idrole = $this->session->userdata('role_idrole');
                $teacher_idteacher = $this->session->userdata('idteacher');

                $idlog = $this->modelo->savelogstart($fecha,$username,$role_idrole);
                $this->modelo->saveteacherhaslog($teacher_idteacher, $role_idrole, $idlog);
                //si es profesor pasa se carga su vista y nombre de usuario
                $this->load->view('teacher/home-teacher', $data);
                break;
                case 'Student':
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idstudent'] = $this->session->userdata('idstudent');
                $data['gender_name'] = $gender['name'];

                $data['unity'] = $this->modelo->studentunit($this->session->userdata('idstudent'))->result();
                //se realiza guardado de inicio de session
                $fecha = date("Y-m-d H:i:s");
                $username = $this->session->userdata('username');
                $role_idrole = $this->session->userdata('role_idrole');
                $student_idstudent = $this->session->userdata('idstudent');

                $idlog = $this->modelo->savelogstart($fecha,$username,$role_idrole)->result();
                $this->modelo->savestudenthaslog($student_idstudent, $role_idrole, $idlog);
                //si es alumno pasa se carga su vista y nombre de usuario
                $this->load->view('student/home-student', $data);
                break;
            }
        } else {
        //de no existir un usuario loggeado se envia al login
            $this->load->view('login');
        }}
        function load_user(){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
        //se declaran los mensajes
            $msjs = '';
            $msje = '';
            $msjw = '';
        //se declara las variables
            $cookies = '';
        //se validan los campos para que no sean vacios
            if ($this->c_valide_field($username) & $this->c_valide_field($password)) {
            //se consulta al modelo por usuario y su pass
                $datos = $this->modelo->login($username, $password);
            //la respuesta se almacena en un arreglo
                $cookies = array(
                    "idadministrator" => $datos['idadministrator'],
                    "idcoordinator" => $datos['idcoordinator'],
                    "idteacher" => $datos['idteacher'],
                    "idstudent" => $datos['idstudent'],
                    "idnumber" => $datos['idnumber'], 
                    "name" => $datos['name'],
                    "lastname" => $datos['lastname'],
                    "username" => $datos['username'],
                    "email" => $datos['email'],
                    "role_idrole" => $datos['role_idrole'],
                    "gender_idgender" => $datos['gender_idgender']
                );
                //se consulta si la respuesta es vacia para continuar
                if($datos['role_idrole'] != '') {
                    $cookies['logged'] = true;
                    //se caga la session
                    $this->session->set_userdata($cookies);
                    //se almacena un mensaje 
                    $msjs = "<strong class='black-text'>Bienvenido!</strong>";
                } else {
                    $cookies['logged'] = false;
                    //se carga la sesion vacia
                    $this->session->set_userdata($cookies);
                    //se indica el mensaje
                    $msje = "<strong class='black-text'>El usuario No existe!</strong>";
                }
            } else {
                //se carga el mensaje de que los campos son vacios
                $msjw = "<strong class='black-text'>Los campos están vacios!</strong>";
            }
            //se envia mediante json los mensajes de respuesta
            echo json_encode(array(
                "message_load_user_s" => $msjs, 
                "message_load_user_e" => $msje,
                "message_load_user_w" => $msjw
            ));}
    //Cierra Sesión
    function close_session(){

            // $fecha = date('Y-m-d H:i:s');
            //     $username = $this->session->userdata('username');
            //     $role_idrole = $this->session->userdata('role_idrole');
            //     $teacher_idteacher = $this->session->userdata('idteacher');

            //     $idlog = $this->modelo->savelogend($fecha,$username,$role_idrole);
            //     $this->modelo->saveteacherhaslog($teacher_idteacher, $role_idrole, $idlog);

            $this->session->sess_destroy();
            $msjclose= "<strong >Nos Vemos!</strong>";
            echo json_encode(array('message_close' => $msjclose));}
//Save Transaction 
    // function savesection(){
    //     $name = $this->input->post('sectionname');
    //     $description = $this->input->post('description');

    //     $msj_section = array();
    //     $m = array();

    //     if ($this->c_valide_field($name)) {
    //         if ($this->modelo->savesection($name,$description)) {
    //             $m = array('msjs' => "<strong class='black-text'>Save section!</strong>");
    //             array_push($msj_section, $m);
    //         }else{
    //             $m = array('msje' => "<strong>Don't save section!</strong>");
    //             array_push($msj_section, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Nmae is Empty!</strong>");
    //             array_push($msj_section, $m);
    //     }
    //     echo json_encode($msj_section);
    // }
    // function saveteacher(){
    //     $idnumber = $this->input->post('idnumber');
    //     $name = $this->input->post('name');
    //     $lastname = $this->input->post('lastname');
    //     $username = $this->input->post('username');
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');
    //     $passwordconfirm = $this->input->post('passwordconfirm');
    //     $gender_idgender = $this->input->post('gender');
    //     $role_idrole = $this->modelo->roleid('Teacher');

    //     $msjteacher = array();
    //     $m = array();
    //     $si = 0;
    //     $no = 0;

    //     if ($this->c_valide_field($idnumber)) {$si+=1;}else{$no+=1;}
    //     if ($this->c_valide_field($name)) {$si+=1;}else{$no+=1;}
    //     if ($this->c_valide_field($lastname)) {$si+=1;}else{$no+=1;}
    //     if ($this->c_valide_field($username)) {$si+=1;}else{$no+=1;}
    //     if ($this->c_valide_field($password)) {$si+=1;}else{$no+=1;}
    //     if ($this->c_valide_field($passwordconfirm)) {$si+=1;}else{$no+=1;}
    //     if ($si === 6) {
    //         if ($password === $passwordconfirm) {
    //             if ($this->modelo->saveteacher($idnumber,$name,$lastname,$username,$email,md5($password),$role_idrole,$gender_idgender)) {
    //                 $m = array('msjs' => "<strong class='black-text'>Save Teacher!</strong>");
    //                 array_push($msjteacher, $m);
    //             }else{
    //                 $m = array('msje' => "<strong class='black-text'>Don't save teacher!</strong>");
    //                 array_push($msjteacher, $m);
    //             }
    //         }else{
    //             $m = array('msjw' => "<strong class='black-text'>Password confirm is diference to password</strong>");
    //             array_push($msjteacher, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Some files are empty!</strong>");
    //             array_push($msjteacher, $m);
    //     }echo json_encode($msjteacher);}                
    // function savestudent(){
    //     //se extrae los datos de la vista 
    //     $idnumber = $this->input->post('idnumber');
    //     $name = $this->input->post('name');
    //     $lastname = $this->input->post('lastname');
    //     $username = $this->input->post('username');
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');
    //     $passwordconfirm = $this->input->post('passwordconfirm');
    //     $gender_idgender = $this->input->post('gender_idgender');
    //     $role_idrole = $this->modelo->roleid('Student');
    //     //declarando
    //             $msj_load_student = array();
    //             $m = array();
    //             $si = 0;
    //             $no = 0;    
    //     //si campos son Vacios  
    //                 if ($this->c_valide_field($idnumber)) {
    //                         $si += 1;}else{$no += 1;}
    //                 if ($this->validate_rut($idnumber)) {
    //                         $si += 1;
    //                 }else{
    //                     $m = array('msje' => "<strong class='black-text'>The field rut Incorrect!</strong>");
    //                     array_push($msj_load_student, $m);
    //                     $no += 1;
    //                 }
    //                 if ($this->modelo->studentexist($idnumber)) {
    //                     $m = array('msje' => "<strong class='black-text'>The Rut exist in System!</strong>");
    //                     array_push($msj_load_student, $m);
    //                      $no += 1;
    //                 }else{
    //                      $si += 1;
    //                 }
    //                 if ($this->c_valide_field($name)) {
    //                         $si += 1;}else{$no += 1;}
    //                 if ($this->c_valide_field($lastname)) {
    //                         $si += 1;}else{$no += 1;}
    //                 if ($this->c_valide_field($username)) {
    //                         $si += 1;}else{$no += 1;}
    //                 if ($this->c_valide_field($role_idrole)) {
    //                         $si += 1;}else{$no += 1;}
    //                 if ($this->c_valide_field($gender_idgender)) {
    //                         $si += 1;}else{$no += 1;}
    //                 if($password != $passwordconfirm || $password === "" || $passwordconfirm === ""){
    //                         $m = array('msje' => "<strong class='black-text'>The pass does not match and not empty</strong>");
    //                         array_push($msj_load_student, $m);
    //                         $no += 1;}else{$si += 1;}
    //         //valida coexion
    //                         // echo $si;
    //                         // echo $no;
    //             if ($si === 7) {
    //                 $pass = md5($password);
    //                 if ($this->modelo->savestudent($idnumber,$name,$lastname,$username,$pass,$email,$role_idrole,$gender_idgender)) {
    //                     $m = array('msjs' => "<strong class='black-text'>Save student!!</strong>");
    //                     array_push($msj_load_student, $m);
    //                 }else{
    //                     $m = array('msje' => "<strong class='black-text'>Error!, Teacher don't save!!</strong>");
    //                     array_push($msj_load_student, $m);
    //                 }
    //             }else{
    //                 if ($no >= 1) {
    //                     $m = array('msjw' => "<strong class='black-text'>Some fields are empty or the fields have less than 3 characters!</strong>");
    //                     array_push($msj_load_student, $m);
    //                 }
    //             }
    //             echo json_encode($msj_load_student);
    //     }

    // function saveclass(){
    //     //se extrae los datos de la vista
    //     $classname = $this->input->post('classname');
    //     $descriptionclasscenter = $this->input->post('descriptionclasscenter');
    //     $descriptionclassleft = $this->input->post('descriptionclassleft');
    //     $descriptionclassright = $this->input->post('descriptionclassright');

    //         //declaracion de variables mensajes y 
    //         $classmsj = array();
    //         $m = array();
    //         $nconfirm = false;
    //         $si = 0;
    //         $no = 0;
    //         //consulta si el nombre de la clase ya existe
    //         $date = $this->modelo->classname($classname)->result();
    //             if(empty($date)){
    //                 $nconfirm = true;
    //             }else{
    //                 $nconfirm = false;
    //             }

    //         //valida campos vacios 
    //         if ($this->c_valide_field($classname)){
    //             $si += 1;
    //         }else{
    //             $no += 1;
    //             }
    //         if ($this->c_valide_field($descriptionclasscenter)){
    //             $si += 1;
    //         }else{
    //             $no += 1;
    //         }

    //         //valida si existe el nombre
    //         if ($nconfirm){
    //             $si += 1;
    //         }else{
    //             $m = array('msjw' => "<strong class='black-text'>Class exit in system, please change name!</strong>");
    //             array_push($classmsj, $m);
    //             $no += 1;
    //         }
                    
    //         if($si === 3){
    //             if($this->modelo->saveclass($classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright)){
    //                 $m = array('msjs' => "<strong class='black-text'>Save class!</strong>");
    //                 array_push($classmsj, $m);
    //             }else{
    //                 $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
    //                 array_push($classmsj, $m);
    //             }
    //         }else{if($no > 1){
    //             $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
    //             array_push($classmsj, $m);}
    //         }
    //         echo json_encode($classmsj);
    //     }
    // function saveunity() {
    //         //se extrae los datos de la vista
    //         $unityname = $this->input->post('unityname');
    //         $descriptioncenter = $this->input->post('descriptioncenter');
    //         $descriptionleft = $this->input->post('descriptionleft');
    //         $descriptionright = $this->input->post('descriptionright');
    //         //declaracion de variables mensajes y errores
    //         $unitymsj = array();
    //         $m = array();
    //         $si = 0;
    //         $no = 0;
    //         //consulta si el nombre de la unidad ya existe
    //         if ($this->modelo->existunity($unityname)== true) {
    //             $si += 1;
    //         } else {
    //             $m = array('msjs' => "<strong class='black-text'>Unity Name Exist!</strong>");
    //             array_push($unitymsj, $m);
    //             $no += 1;
    //         }
    //         //valida campos vacios 
    //         if ($this->c_valide_field($unityname)== true) {
    //             $si += 1;
    //         } else {
    //             $no += 1;
    //         }
    //         if($si === 2){
    //             if($this->modelo->saveunity($unityname,$descriptioncenter,$descriptionleft,$descriptionright)){
    //                 $m = array('msjs' => "<strong class='black-text'>Save unity!</strong>");
    //                 array_push($unitymsj, $m);
    //             }else{
    //                 $m = array('msje' => "<strong class='black-text'>Error, Don't save the unity!</strong>");
    //                 array_push($unitymsj, $m);
    //             }
    //         }else{if($no > 0){
    //             $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
    //             array_push($unitymsj, $m);}
    //         }
    //         echo json_encode($unitymsj);}
    // function saveactivity(){
    //     $activityname = $this->input->post('activityname');
    //     $descriptionleft = $this->input->post('descriptionleft');
    //     $descriptionright = $this->input->post('descriptionright');

    //     $msjactivity = array();
    //     $m = array();
    //     $si = 0;
    //     $no = 0;

    //     if ($this->c_valide_field($activityname)) {
    //         if ($this->modelo->saveactivity($activityname,$descriptionleft,$descriptionright)) {
    //             $m = array('msjs' => "<strong class='black-text'>Save activity!</strong>");
    //             array_push($msjactivity, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't save activity!</strong>");
    //             array_push($msjactivity, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Field name are empty!</strong>");
    //             array_push($msjactivity, $m);
    //     }
    //     echo json_encode($msjactivity);}
    // function savequestion(){
    //     $questionname = $this->input->post('questionname');
    //     $description = $this->input->post('description');
    //     $idquestiontype = $this->input->post('idquestiontype');
        
    //     $msjquestion = array();
    //     $m = array();
        
    //     if($this->c_valide_field($questionname)) {
    //         if($this->modelo->savequestion($questionname,$description,$idquestiontype)){
    //             $m = array('msjs' => "<strong class='black-text'>Save question!</strong>");
    //         array_push($msjquestion, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't save question! Error Database!</strong>");
    //         array_push($msjquestion, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Question are empty!</strong>");
    //         array_push($msjquestion, $m);
    //     }
    //     echo json_encode($msjquestion);}
    // function saveanswer(){
    //     $answerename = $this->input->post('answerename');
    //     $description = $this->input->post('description');
    //     $value_idvalue = $this->input->post('value_idvalue');
    //     $question_idquestion = $this->input->post('question_idquestion');

    //     $msjanswer = array();
    //     $m = array();

    //     if($this->c_valide_field($answerename)){
    //         if($this->modelo->saveanswer($answerename,$description,$value_idvalue,$question_idquestion)){
    //             $m = array('msjs' => "<strong class='black-text'>Answere Save!</strong>");
    //         array_push($msjanswer, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Answere Don't Save!</strong>");
    //         array_push($msjanswer, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Answere are empty!</strong>");
    //         array_push($msjanswer, $m);
    //     }
    //     echo json_encode($msjanswer);}
    // function saveword(){
    //     $wordname = $this->input->post('wordname');
    //     $description = $this->input->post('description');
    //     $aditionaldescription = $this->input->post('aditionaldescription');
        
    //     $msjword = array();
    //     $m = array();
    //     $si = 0;
    //     $no = 0;
        
    //     if ($this->c_valide_field($wordname) == true){$si += 1;}else{$no += 1;}
    //     if ($this->c_valide_field($description) == true){$si += 1;}else{$no += 1;}
        
    //     if($si == 2){
    //         if($this->modelo->saveword($wordname,$description,$aditionaldescription) == true){
    //             $m = array('msjs' => "<strong class='black-text'>Save word!</strong>");
    //             array_push($msjword, $m);
    //         }else{
    //             $m = array('msjw' => "<strong class='black-text'>Dont save word!</strong>");
    //             array_push($msjword, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
    //         array_push($msjword, $m);
    //     }
    //     echo json_encode($msjword);}
//Update Transaction
    // function updateclass(){
    //     //se extrae los datos de la vista
    //     $idclass = $this->input->post('idclassedit');
    //     $classname = $this->input->post('classnameedit');
    //     $descriptioncenter = $this->input->post('classdescriptioncenteredit');
    //     $descriptionleft = $this->input->post('classdescriptionleftedit');
    //     $descriptionright = $this->input->post('classdescriptionrightedit');
    //         //declaracion de variables mensajes y 
    //         $classmsj = array();
    //         $m = array();
    //         $si = 0;
    //         $no = 0;
    //         //valida campos vacios 
    //             if ($this->c_valide_field($classname)){$si += 1;}else{
    //                 $no += 1;
    //                 $m = array('msjw' => "<strong class='black-text'>Class name is empy!</strong>");
    //                     array_push($classmsj, $m);
    //             }
    //             if ($this->c_valide_field($descriptioncenter)){$si += 1;}else{
    //                 $no += 1;
    //                 $m = array('msjw' => "<strong class='black-text'>Description Center is empy!</strong>");
    //                     array_push($classmsj, $m);
    //             }
    //                 if($si === 2){
    //                     if($this->modelo->updateclass($idclass,$classname,$descriptioncenter,$descriptionleft,$descriptionright) == true){
    //                         $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //                         array_push($classmsj, $m);
    //                     }else{
    //                         $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
    //                         array_push($classmsj, $m);
    //                     }
    //                 }else{
    //                     $m = array('msjw' => "<strong class='black-text'>!</strong>");
    //                     array_push($classmsj, $m);
    //                 }
    //         echo json_encode($classmsj);}
    // function updateword(){
    //     $idglosary = $this->input->post('idglosary');
    //     $wordname = $this->input->post('wordname');
    //     $description = $this->input->post('description');
    //     $aditionaldescription = $this->input->post('aditionaldescription');

    //     $msj = array();
    //     $m = array();

    //     $si = 0;
    //     $no = 0;

    //     if ($this->c_valide_field($wordname)) {$si+=1;}else{
    //         $no += 1;
    //         $m = array('msjw' => "<strong class='black-text'>Word Name is empy!</strong>");
    //         array_push($msj, $m);}
    //     if ($this->c_valide_field($description)) {$si+=1;}else{
    //         $no += 1;
    //         $m = array('msjw' => "<strong class='black-text'>Description is empy!</strong>");
    //         array_push($msj, $m);}
    //     if ($si === 2) {
    //         if ($this->modelo->updateword($idglosary,$wordname,$description,$aditionaldescription)) {
    //             $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //             array_push($msj, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Error, Don't save changes!</strong>");
    //             array_push($classmsj, $m);
    //         }
    //     }
    //     echo json_encode($msj);
    // }
    // function updatesection(){
    //     $idsection = $this->input->post('idsection');
    //     $sectionname = $this->input->post('sectionname');
    //     $description = $this->input->post('description');

    //     $msj = array();
    //     $m = array();

    //     if ($this->c_valide_field($sectionname)) {
    //         if ($this->modelo->updatesection($idsection,$sectionname,$description)) {
    //             $m = array('msjs' => "<strong class='black-text'>Update Section!</strong>");
    //             array_push($msj, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't save changes!</strong>");
    //             array_push($msj, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Section name is empty!</strong>");
    //         array_push($msj, $m);}
    //     echo json_encode($msj);}
    //     function updateunit(){
    //           //se extrae los datos de la vista
    //         $idunity = $this->input->post('idunity');
    //         $unityname = $this->input->post('unityname');
    //         $descriptioncenter = $this->input->post('descriptioncenter');
    //         $descriptionleft = $this->input->post('descriptionleft');
    //         $descriptionright = $this->input->post('descriptionright');
    //         //declaracion de variables mensajes y errores
    //         $unitmsj = array();
    //         $m = array();

    //         if ($this->c_valide_field($unityname) === true) {
    //             if($this->modelo->updateunit($idunity,$unityname,$descriptioncenter,$descriptionleft,$descriptionright)){
    //                 $m = array('msjs' => "<strong class='black-text'>Save unity!</strong>");
    //                 array_push($unitmsj, $m);
    //             }else{
    //                 $m = array('msje' => "<strong class='black-text'>Error, Don't save the unity!</strong>");
    //                 array_push($unitmsj, $m);
    //             }
    //         }else{if($no > 0){
    //             $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
    //             array_push($unitmsj, $m);}
    //         }
    //         echo json_encode($unitmsj);
    //     } 
    //     function updateunity(){
    //     //se extrae los datos de la vista
    //         $idunity = $this->load->post('idunity');
    //         $unityname = $this->input->post('unityname');
    //         $descriptioncenter = $this->input->post('descriptioncenter');
    //         $descriptionleft = $this->input->post('descriptionleft');
    //         $descriptionright = $this->input->post('descriptionright');
    //         $class_idclass = $this->input->post('class_idclass');
    //         $class_teacher_idteacher = $this->session->userdata('idteacher');
    //         //declaracion de variables mensajes y errores
    //         $unityupdatemsj = array();
    //         $m = array();
    //         $si = 0;
    //         $no = 0;
    //         //valida campos vacios 
    //         if ($this->c_valide_field($unityname)== true) {
    //             $si += 1;
    //         } else {
    //             $no += 1;
    //         }
    //         if($si === 1){
    //             if($this->modelo->updateunity($idunity,$unityname,$descriptioncenter,$descriptionleft,$descriptionright,$class_idclass,$class_teacher_idteacher)){
    //                 $m = array('msjs' => "<strong class='black-text'>Save unity!</strong>");
    //                 array_push($unityupdatemsj, $m);
    //             }else{
    //                 $m = array('msje' => "<strong class='black-text'>Error, Don't save the unity!</strong>");
    //                 array_push($unityupdatemsj, $m);
    //             }
    //         }else{if($no > 0){
    //             $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
    //             array_push($unityupdatemsj, $m);}
    //         }
    //         echo json_encode($unityupdatemsj);}
    // function updateactivity(){
    //     $idactivity = $this->input->post('idactivity');
    //     $activityname = $this->input->post('activityname');
    //     $descriptionleft = $this->input->post('descriptionleft');
    //     $descriptionright = $this->input->post('descriptionright');

    //     $msjactivityupdate = array();
    //     $m = array();
        
    //     if ($this->c_valide_field($activityname)){
    //         if ($this->modelo->updateactivity($idactivity,$activityname,$descriptionleft,$descriptionright)) {
    //             $m = array('msjs' => "<strong class='black-text'>Save activity!</strong>");
    //             array_push($msjactivityupdate, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't save activity!</strong>");
    //             array_push($msjactivityupdate, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Field name are empty!</strong>");
    //             array_push($msjactivityupdate, $m);
    //     }
    //     echo json_encode($msjactivityupdate);}
    // function updatestudent(){
    //     $idstudent = $this->input->post('idstudent');
    //     $idnumber = $this->input->post('idnumber');
    //     $name = $this->input->post('name');
    //     $lastname = $this->input->post('lastname');
    //     $username = $this->input->post('username');
    //     $email = $this->input->post('email');
    //     $gender_idgender = $this->input->post('gender_idgender');
    //     //declaracion de variables mensajes
    //     $msjsupdatestudent = array();
    //     $m = array();
    //     $si = 0;
    //     $no = 0;

    //     if ($this->c_valide_field($idnumber)){$si += 1;}else{$no += 1;}
    //     if ($this->c_valide_field($name)){$si += 1;}else{$no += 1;}
    //     if ($this->c_valide_field($lastname)){$si += 1;}else{$no += 1;}
    //     if ($this->c_valide_field($username)){$si += 1;}else{$no += 1;}
    //     if ($this->c_valide_field($email)){$si += 1;}else{$no += 1;}

    //     if($si === 5){
    //         if($this->modelo->updatestudent($idstudent,$idnumber,$name,$lastname,$username,$email,$gender_idgender)){
    //             $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //             array_push($msjsupdatestudent, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Error, Don't save the changes!</strong>");
    //             array_push($msjsupdatestudent, $m);
    //         }
    //     }else{
    //         if($no > 1){
    //         $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
    //         array_push($msjsupdatestudent, $m);
    //         }
    //     }
    //     echo json_encode($msjsupdatestudent);}
    // function studentsaveclass(){
    //     $idclass = $this->input->post('idclass');
    //     $idstudent = $this->input->post('idstudent');
    //     $idteacher = $this->session->userdata('idteacher');
        
    //     $msjsstudenclass= array();
    //     $m = array();
    //         if ($this->modelo->studentsaveclass($idclass,$idstudent,$idteacher)){
    //             $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //             array_push($msjsstudenclass, $m);
    //         }else{
    //             $m = array('msjw' => "<strong class='black-text'>No es posible Realizar los cambios, el alumno ya pertenece a la clase!</strong>");
    //             array_push($msjsstudenclass, $m);
    //         }
    //     echo json_encode($msjsstudenclass);
    // }
    // function unitysavesection(){
    //     $unity_idunity = $this->input->post('unity_idunity');
    //     $section_idsection = $this->input->post('section_idsection');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->unitysavesection($unity_idunity,$section_idsection)) {
    //         $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //         array_push($msj, $m);
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>No es posible Realizar los cambios, la unidad ya pertenece a la seccion!</strong>");
    //         array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
    // function activitysaveunity(){
    //     $unity_idunity = $this->input->post('unity_idunity');
    //     $activity_idactivity = $this->input->post('activity_idactivity');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->activitysaveunity($unity_idunity, $activity_idactivity)) {
    //         $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //         array_push($msj, $m);
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>No es posible Realizar los cambios, la actividad ya pertenece a la unidad!</strong>");
    //         array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
    // function materialhasclass(){
    //     $class_idclass = $this->input->post('class_idclass');
    //     $material_idmaterial = $this->input->post('material_idmaterial');
    //     $material_materialtype_idmaterialtype = $this->input->post('material_materialtype_idmaterialtype');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->materialhasclass($class_idclass, $material_idmaterial,$material_materialtype_idmaterialtype)) {
    //         $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //         array_push($msj, $m);
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>No es posible Realizar los cambios, el material ya pertenece a la Clase!</strong>");
    //         array_push($msj, $m);
    //     }
    //     echo json_encode($msj);
    // }

    // function sectionhasclass(){
    //     $idclass = $this->input->post('idclass');
    //     $idsection = $this->input->post('idsection');

    //     $msjsectionhasclass = array();
    //     $m = array();

    //     if ($this->modelo->sectionhasclass($idclass,$idsection)) {
    //         $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
    //         array_push($msjsectionhasclass, $m);
    //     }else{
    //         $m = array('msjs' => "<strong class='black-text'>No es posible Realizar los cambios, la sección ya pertenece a la clase!</strong>");
    //         array_push($msjsectionhasclass, $m);
    //     }
    //     echo json_encode($msjsectionhasclass);
    // }
    // function teachersavesection(){
    //     $teacher_idteacher = $this->input->post('teacher_idteacher');
    //     $teacher_role_idrole = $this->input->post('teacher_role_idrole');
    //     $teacher_gender_idgender = $this->input->post('teacher_gender_idgender');
    //     $section_idsection = $this->input->post('section_idsection');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->teachersavesection($teacher_idteacher,$teacher_role_idrole,$teacher_gender_idgender,$section_idsection)) {
    //             $m = array('msjs' => "<strong class='black-text'>Save relation!</strong>");
    //             array_push($msj, $m);
    //     }else{
    //         $m = array('msjs' => "<strong class='black-text'>No es posible Realizar los cambios, la sección ya pertenece a la clase!</strong>");
    //         array_push($msjs, $m);   
    //     }
    //     echo json_encode($msj);
    // }
    // function studentsavesection(){
    //     $student_idstudent = $this->input->post('student_idstudent');
    //     $student_role_idrole = $this->input->post('student_role_idrole');
    //     $student_gender_idgender = $this->input->post('student_gender_idgender');
    //     $section_idsection = $this->input->post('section_idsection');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->studentsavesection($student_idstudent,$student_role_idrole,$student_gender_idgender,$section_idsection)) {
    //             $m = array('msjs' => "<strong class='black-text'>Save relation!</strong>");
    //             array_push($msj, $m);
    //     }else{
    //         $m = array('msjs' => "<strong class='black-text'>No es posible Realizar los cambios, la sección ya pertenece a la section!</strong>");
    //         array_push($msjs, $m);   
    //     }
    //     echo json_encode($msj);
    // }
    

    // function saveyoutubelink(){
    //     $materialname = $this->input->post('materialname');
    //     $descriptionleft = $this->input->post('descriptionleft');
    //     $descriptionright = $this->input->post('descriptionright');
    //     $link = $this->input->post('link');
    //     $idmaterialtype = 4;

    //     $this->modelo->saveyoutubelink($materialname, $descriptionleft,$descriptionright,$link,$idmaterialtype);}

    // function materialsaveactivity(){
    //     $idmaterial = $this->input->post('idmaterial');
    //     $materialidtype = $this->modelo->materialtyṕe($idmaterial);
    //     $idactivity = $this->input->post('idactivity');
    //     $idunity = $this->modelo->activityunity($idactivity);
    //     $idclass = $this->modelo->unityclass($idunity);
    //     $idteacher = $this->session->userdata('idteacher');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->materialsaveactivity($idmaterial,$materialidtype,$idactivity,$idunity,$idclass,$idteacher)) {
    //         $m = array('msjs' => "<strong class='black-text'>Save Material in Activity</strong>");
    //         array_push($msj, $m);
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Don't Save Material in Activity, Material exist</strong>");
    //         array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
//Delete Transaction
    // function deleteteacher(){
    //     $idteacher = $this->input->post('idteacher');
    //     $role_idrole = 2;
    //     $gender_idgender = $this->input->post('gender_idgender');
    //     $password = md5($this->input->post('password'));

    //     $msjdelete = array();
    //     $m = array();

    //     if ($password == $this->session->userdata('password')) {
    //         if ($this->modelo->deleteteacher($idteacher, $role_idrole, $gender_idgender)) {
    //             $m = array('msjs' => "<strong class='black-text'>Delete teacher</strong>");
    //             array_push($msjdelete, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete teacher, Error Database!</strong>");
    //             array_push($msjdelete, $m);
    //         }
    //     }else{
    //         $m = array('msje' => "<strong class='black-text'>Password incorrect! don't delete teacher</strong>");
    //         array_push($msjdelete, $m);
    //     }
    //     echo json_encode($msjdelete);}
    // function deleteclass(){
    //     $idclass = $this->input->post('idclass');
    //     $password = md5($this->input->post('password'));
    //     $user = $this->session->userdata('username');
        
    //     $msjdeleteclass = array();
    //     $m = array();
        
    //     if ($this->modelo->confirm_delete($user,$password)) {
    //         if($this->modelo->deleteclass($idclass)){
    //             $m = array('msjs' => "<strong class='black-text'>Delete Class!</strong>");
    //             array_push($msjdeleteclass, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete Class, section depend of this class!</strong>");
    //             array_push($msjdeleteclass, $m);
    //         }
    //     }else{
    //         $m = array('msje' => "<strong class='black-text'>Don't delete Class, Error!; Pass is Incorrect!</strong>");
    //             array_push($msjdeleteclass, $m);
    //     }
    //     echo json_encode($msjdeleteclass);}
    // function deletesection(){
    //     $idsection = $this->input->post('idsection');
    //     $password = md5($this->input->post('password'));
    //     $user = $this->session->userdata('username');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->confirm_delete($user,$password)) {
    //         if ($this->modelo->deletesection($idsection)) {
    //             $m = array('msjs' => "<strong class='black-text'>Delete Section!</strong>");
    //             array_push($msj, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete section, section is asociated of class or contain teacher and students asignament!</strong>");
    //             array_push($msj, $m);
    //         }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Don't delete Section, Error!; Pass is Incorrect!</strong>");
    //             array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
    // function deleteactivity(){
    //     $idactivity = $this->input->post('idactivity');
    //     $user = $this->session->userdata('username');
    //     $password = md5($this->input->post('password'));

    //     $msjdeleteactivity = array();
    //     $m = array();

    //     if ($this->modelo->confirm_delete($user,$password)) {
    //          if ($this->modelo->deleteactivity($idactivity)) {
    //              $m = array('msjs' => "<strong class='black-text'>Delete activity!</strong>");
    //             array_push($msjdeleteactivity, $m);
    //          }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete activity! because activity content a question</strong>");
    //             array_push($msjdeleteactivity, $m);
    //          }
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Password is incorrect!</strong>");
    //             array_push($msjdeleteactivity, $m);
    //     }
    //     echo json_encode($msjdeleteactivity); }
    // function deleteunity(){
    //     $idunity = $this->input->post('idunity');
    //     $password = md5($this->input->post('password'));
    //     $user = $this->session->userdata('username');
        
    //     $msjdeleteunity = array();
    //     $m = array();
        
    //     if ($this->modelo->confirm_delete($user,$password)) {
    //         if($this->modelo->deleteunity($idunity)){
    //             $m = array('msjs' => "<strong class='black-text'>Delete unity!</strong>");
    //             array_push($msjdeleteunity, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete unity, activity depend of this class!</strong>");
    //             array_push($msjdeleteunity, $m);
    //         }
    //     }else{
    //         $m = array('msje' => "<strong class='black-text'>Don't delete unity, Error! Pass is Incorrect!</strong>");
    //             array_push($msjdeleteunity, $m);
    //     }
    //     echo json_encode($msjdeleteunity);}
    // function deleteStudent(){
    //     $idstudent = $this->input->post('idstudent');
    //     $password = md5($this->input->post('password'));
    //     $user = $this->session->userdata('username');

    //     $msjdeletestudent = array();
    //     $m = array();
        
    //     if ($this->modelo->confirm_delete($user,$password)) {
    //         if($this->modelo->deleteStudent($idstudent)){
    //             $m = array('msjs' => "<strong class='black-text'>Delete Student!</strong>");
    //             array_push($msjdeletestudent, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete student!</strong>");
    //             array_push($msjdeletestudent, $m);
    //         }
    //     }else{
    //         $m = array('msje' => "<strong class='black-text'>Don't delete student, Error! Pass is Incorrect!</strong>");
    //             array_push($msjdeletestudent, $m);
    //     }
    //     echo json_encode($msjdeletestudent);}
    // function deleteword(){
    //     $idglosary = $this->input->post('idglosary');
    //     $password = md5($this->input->post('password'));
    //     $user = $this->session->userdata('username');

    //     $msj = array();
    //     $m = array();

    //     if ($this->modelo->confirm_delete($user,$password)) {
    //         if ($this->modelo->deleteword($idglosary)) {
    //            $m = array('msjs' => "<strong class='black-text'>Delete Word!</strong>");
    //             array_push($msj, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>Don't delete word!</strong>");
    //             array_push($msj, $m);
    //         }
    //     }else{
    //         $m = array('msje' => "<strong class='black-text'>Don't delete student, Error! Pass is Incorrect!</strong>");
    //             array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
    // function deleterelstudentsection(){
    //     $student_idstudent = $this->input->post('student_idstudent');
    //     $section_idsection = $this->input->post('section_idsection');

    //     $msjsstudent= array();
    //     $m = array();

    //     if ($this->modelo->deleterelstudentsection($student_idstudent,$section_idsection )){
    //             $m = array('msjs' => "<strong class='black-text'>delete relations!</strong>");
    //             array_push($msjsstudent, $m);
    //         }else{
    //             $m = array('msje' => "<strong class='black-text'>No es posible Realizar los cambios existe una unidad asociada a la seccion.</strong>");
    //             array_push($msjsstudent, $m);
    //         }
    //     echo json_encode($msjsstudent);}
    // function deleterelsectionclass(){
    //     $section_idsection = $this->input->post('section_idsection');
    //     $class_idclass = $this->input->post('class_idclass');


    //     $msj = array();
    //     $m = array();

    //     if($this->modelo->deleterelsectionclass($section_idsection,$class_idclass)){
    //         $m = array('msje' => "<strong class='black-text'>Delete Relation!</strong>");
    //             array_push($msj, $m);
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Don't delete section content a teacher or student asignament</strong>");
    //             array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
    // function deleterelactivityunity(){
    //     $activity_idactivity = $this->input->post('activity_idactivity');
    //     $unity_idunity = $this->input->post('unity_idunity');

    //     $msj = array();
    //     $m = array();

    //     if($this->modelo->deleterelactivityunity($activity_idactivity,$unity_idunity)){
    //         $m = array('msje' => "<strong class='black-text'>Delete Relation!</strong>");
    //             array_push($msj, $m);
    //     }else{
    //         $m = array('msjw' => "<strong class='black-text'>Don't delete activity content a question asignament</strong>");
    //             array_push($msj, $m);
    //     }
    //     echo json_encode($msj);
    // }
    // function deletereltechersection(){
    //     $section_idsection = $this->input->post('section_idsection');
    //     $teacher_idteacher = $this->input->post('teacher_idteacher');

    //     $msj = array();
    //     $m = array();
    //     if ($this->modelo->deletereltechersection($section_idsection, $teacher_idteacher)) {
    //         $m = array('msjs' => "<strong class='black-text'> Delete relation!</strong>");
    //         array_push($msj, $m);
    //     }else{
    //         $m = array('msje' => "<strong class='black-text'>Don't delete relation, exist estudent in this section!</strong>");
    //         array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
    // function deleterelunitysection(){
    //     $section_idsection = $this->input->post('section_idsection');
    //     $unity_idunity = $this->input->post('unity_idunity');

    //     $msj = array();
    //     $m = array();
    //     if ($this->modelo->deleterelunitysection($section_idsection, $unity_idunity)) {
    //         $m = array('msjs' => "<strong class='black-text'> Delete relation!</strong>");
    //         array_push($msj, $m);
    //     }else{
    //         $m = array('msjs' => "<strong class='black-text'>Don't delete relation, exist activity in this unity!</strong>");
    //         array_push($msj, $m);
    //     }
    //     echo json_encode($msj);}
// //Files Transaction
//     public function upload_video(){
//             $config['file_name'] =  $this->input->post('archivename');
//             $config['upload_path']          = './media';
//             $config['allowed_types']        = '*';
//             $config['max_size']             = 10000000000;

//             $this->load->library('upload', $config);

//             if ( ! $this->upload->do_upload('userfile')){
//                 //no se a seleccionado archivo de video
//             }else{
//                 if($this->upload->data('file_name') != ""){
//                     $name = $this->upload->data('file_name');
//                     $type = $this->input->post('selectmaterialtype');
//                     $this->modelo->savevideo($name,$type);
//                     $data = array('upload_data' => $this->upload->data());
//                     $msjsavevideo= "<strong class='black-text'>save video!</strong>";
//                     echo json_encode(array('msjs' => $msjsavevideo));
//                     redirect($this->load->view('teacher/home-teacher'));
//                 } else{
//                     //no se a asignado nombre al archivo de video
//                 }
//             }}
// //---------Select List Transaction---------
//     function teacherlist(){
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['teacher_has_section'] = $this->modelo->teacher_has_section()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();
//         $list['teacher'] = $this->modelo->teacherlist()->result();
//         $list['gender'] = $this->modelo->genderlist()->result();
//         $this->load->view('administrator/class/teacherlist',$list);}
//     function studentlist(){
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['student_has_section'] = $this->modelo->studenthassection()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();
//         $list['student'] = $this->modelo->studentlist()->result();
//         $list['role'] = $this->modelo->rolelist()->result();
//         $list['gender'] = $this->modelo->genderlist()->result();

//         $idrole = $this->session->userdata('role_idrole');
//         $role = $this->modelo->role($idrole);

//         switch($role){
//                 case 'Administrator':
//                     $this->load->view('administrator/class/studentlist',$list);
//                 break;
//                 case 'Coordinador':
//                     $this->load->view('teacher/class/studentlist',$list);
//                 break;
//                 case 'Teacher':
//                     $this->load->view('teacher/class/studentlist',$list);
//                 break;
//             }}
//     function classlist(){
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['name'] = $this->session->userdata('name');
//         $list['lastname'] = $this->session->userdata('lastname');
//         $list['email'] = $this->session->userdata('email');
//         $list['idteacher'] = $this->session->userdata('idteacher');

//         $idrole = $this->session->userdata('role_idrole');
//         $role = $this->modelo->role($idrole);

//         switch($role){
//                 case 'Administrator':
//                     $this->load->view('teacher/class/classlist',$list);
//                 break;
//                 case 'Coordinador':
//                     $this->load->view('teacher/class/classlist',$list);
//                 break;
//                 case 'Teacher':
//                     $this->load->view('teacher/class/classlist',$list);
//                 break;
//             }}
//     function sectionlist(){
//         $list['class'] = $this->modelo->classlist()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $this->load->view('administrator/class/sectionlist',$list);}
//     function unitylist(){
//         $list['unity'] = $this->modelo->unitylist()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['unity_has_section'] = $this->modelo->unity_has_section()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();


//         $idrole = $this->session->userdata('role_idrole');
//         $role = $this->modelo->role($idrole);

//         switch($role){
//                 case 'Administrator':
//                     $this->load->view('teacher/unity/unitylist',$list);
//                 break;
//                 case 'Coordinador':
//                     $this->load->view('teacher/class/classlist',$list);
//                 break;
//                 case 'Teacher':
//                     $this->load->view('teacher/class/classlist',$list);
//                 break;
//             }

//         }
//     function materiallist(){
//         $list['material'] = $this->modelo->materiallist()->result();
//         $list['materialtype'] = $this->modelo->materialtypelist()->result();
//         $list['unity'] = $this->modelo->unitylist()->result();
//         $list['unity_has_section'] = $this->modelo->unity_has_section()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();
//         $list['material_has_class'] = $this->modelo->material_has_class()->result();

//         $this->load->view('teacher/material/materiallist',$list);}
//     function activitylist(){
//         $list['activity'] = $this->modelo->activitylist()->result();
//         $list['activity_has_unity'] = $this->modelo->activity_has_unity()->result();
//         $list['unity'] = $this->modelo->unitylist()->result();
//         $list['unity_has_section'] = $this->modelo->unity_has_section()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();


//         $idrole = $this->session->userdata('role_idrole');
//         $role = $this->modelo->role($idrole);

//         switch($role){
//                 case 'Administrator':
//                     $this->load->view('teacher/activity/activitylist',$list);
//                 break;
//                 case 'Coordinador':
//                     $this->load->view('teacher/activity/activitylist',$list);
//                 break;
//                 case 'Teacher':
//                     $this->load->view('teacher/activity/activitylist',$list);
//                 break;
//             }}
//     function examlist(){
//         $list['exam'] = $this->modelo->examlist()->result();
//         $list['exam_has_unity'] = $this->modelo->exam_has_unity()->result();
//         $list['unity'] = $this->modelo->unitylist()->result();
//         $list['unity_has_section'] = $this->modelo->unity_has_section()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();


//         $idrole = $this->session->userdata('role_idrole');
//         $role = $this->modelo->role($idrole);

//         switch($role){
//                 case 'Administrator':
//                     $this->load->view('teacher/activity/examlist',$list);
//                 break;
//                 case 'Coordinador':
//                     $this->load->view('teacher/activity/examlist',$list);
//                 break;
//                 case 'Teacher':
//                     $this->load->view('teacher/activity/examlist',$list);
//                 break;
//             }}
//     function questionlist(){
//         $list['question'] = $this->modelo->questionlist()->result();
//         $list['questiontype'] = $this->modelo->questiontype()->result();
//         $list['question_has_activity'] = $this->modelo->question_has_activity()->result();
//         $list['activity'] = $this->modelo->activitylist()->result();
//         $list['activity_has_unity'] = $this->modelo->activity_has_unity()->result();
//         $list['unity'] = $this->modelo->unitylist()->result();
//         $list['unity_has_section'] = $this->modelo->unity_has_section()->result();
//         $list['section'] = $this->modelo->sectionlist()->result();
//         $list['section_has_class'] = $this->modelo->section_has_class()->result();
//         $list['class'] = $this->modelo->classlist()->result();

//         $list['question_has_exam'] = $this->modelo->question_has_exam()->result();
//         $list['exam'] = $this->modelo->examlist()->result();
//         $list['answer'] = $this->modelo->answerlist()->result();
//         $list['value'] = $this->modelo->valuelist()->result();
        

//         $idrole = $this->session->userdata('role_idrole');
//         $role = $this->modelo->role($idrole);

//         switch($role){
//                 case 'Administrator':
//                     $this->load->view('teacher/activity/questionlist',$list);
//                 break;
//                 case 'Coordinador':
//                     $this->load->view('teacher/activity/questionlist',$list);
//                 break;
//                 case 'Teacher':
//                    $this->load->view('teacher/activity/questionlist',$list);
//                 break;
//             }}
//     function glosarylist(){
//         $list['glosary'] = $this->modelo->glosarylist()->result();
//         $this->load->view('teacher/glosary/glosarylist',$list);}
//     function progresslist(){$this->load->view('teacher/progress/progresslist');}
// //---------Load Page Web---------
//     function load_teacher(){$list = $this->modelo->user_list_teacher(); echo json_encode($list);}
//     function load_student(){$list = $this->modelo->user_list_student(); echo json_encode($list);}
//     function student_load_menu(){$this->load->view('teacher/class/menu-students');}
//     function learning_load(){$this->load->view('teacher/class/menu-learning');}
//     function newclass(){$this->load->view('teacher/class/newclass');}
// //-------------------------------------------------------------------------------------------------------------

// //-----------------------------Student---------------------------------------------------------------------
//         function unity_activities(){

//         $idunity = $this->input->post('idunity');
//         $idteacher = $this->modelo->teacherbyidunity($idunity);
//         $data['material_has_activity'] = $this->modelo->unity_activities($idunity)->result();
//         $data['activity'] = $this->modelo->activitybyunity($idunity)->result();
//         $data['material'] = $this->modelo->materiallist()->result();
//         $data['question'] = $this->modelo->questionlist($idteacher)->result();
//         $data['answer'] = $this->modelo->answerlist()->result();
//         $data['teacher'] = $this->modelo->teacherlist()->result();

//         $this->load->view('student/activity',$data);
//     }
//---------------------------------------------------------------------------------------------------------

//-------------------------validaciones-----------------------------
        //valida que los camposs no esten vacios y que no sean menores de 3 caracteres
        function c_valide_field($field){ 
           //compruebo que el tamaño del string sea válido. 
           if (strlen($field)<3 || strlen($field)>200){  
              return false; 
           } 
           //comprueba que los caracteres sean los permitidos 
           $permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ0123456789-_ @.,:;'¿?#"; 
           for ($i=0; $i<strlen($field); $i++){ 
              if (strpos($permitidos, substr($field,$i,1))===false){ 
                 return false; 
              } 
           } 
           return true;}

        /**
         * Comprueba si el rut ingresado es valido
         * @param string $rut RUT
         * @return boolean
         */

        public function validate_rut($rut){
            if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {return false;}
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
            if ($dvr == 11){
                $dvr = 0;
            }
            if ($dvr == 10){
                $dvr = 'K';
            }
            if ($dvr == strtoupper($dv)){
                return true;
            }
            else{
                return false;
            }}

}





