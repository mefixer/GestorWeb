<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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
            switch($this->session->userdata('role_idrole')){
                case 3:
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idcoordinator'] = $this->session->userdata('idcoordinator');
                                $data['gender_name'] = $gender['name'];
                //si es coordinador pasa se carga su vista y nombre de usuario
                $this->load->view('coordinator/home-coordinator', $data);
                break;
                case 2:
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idteacher'] = $this->session->userdata('idteacher');
                                $data['gender_name'] = $gender['name'];
                //si es profesor pasa se carga su vista y nombre de usuario
                $this->load->view('teacher/home-teacher', $data);
                break;
                case 1:
                $data['name'] = $this->session->userdata('name');
                $data['lastname'] = $this->session->userdata('lastname');
                $data['email'] = $this->session->userdata('email');
                $data['idstudent'] = $this->session->userdata('idstudent');
                                $data['gender_name'] = $gender['name'];
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
                    $msjs = "<strong>Welcome!</strong>";
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
//Save Transaction                    
    function savestudent(){
        //se extrae los datos de la vista 
        $idnumber = $this->input->post('idnumber');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $passwordconfirm = $this->input->post('passwordconfirm');
        $role_idrole = 1;
        $gender_idgender = $this->input->post('gender_idgender');
        //declarando
                $msj_load_student = array();
                $m = array();
                $si = 0;
                $no = 0;    
        //si campos son Vacios  
                    if ($this->c_valide_field($idnumber)) {
                            $si += 1;}else{$no += 1;}
                    if ($this->validate_rut($idnumber)) {
                            $si += 1;
                    }else{
                        $m = array('msje' => "<strong class='black-text'>The field rut Incorrect!</strong>");
                        array_push($msj_load_student, $m);
                        $no += 1;
                    }
                    if ($this->modelo->studentexist($idnumber)) {
                        $m = array('msje' => "<strong class='black-text'>The Rut exist in System!</strong>");
                        array_push($msj_load_student, $m);
                         $no += 1;
                    }else{
                         $si += 1;
                    }
                    if ($this->c_valide_field($name)) {
                            $si += 1;}else{$no += 1;}
                    if ($this->c_valide_field($lastname)) {
                            $si += 1;}else{$no += 1;}
                    if ($this->c_valide_field($username)) {
                            $si += 1;}else{$no += 1;}
                    if ($this->c_valide_field($role_idrole)) {
                            $si += 1;}else{$no += 1;}
                    if ($this->c_valide_field($gender_idgender)) {
                            $si += 1;}else{$no += 1;}
                    if($password != $passwordconfirm || $password === "" || $passwordconfirm === ""){
                            $m = array('msje' => "<strong class='black-text'>The pass does not match and not empty</strong>");
                            array_push($msj_load_student, $m);
                            $no += 1;}else{$si += 1;}
            //valida coexion
                            // echo $si;
                            // echo $no;
                if ($si === 7) {
                    $pass = md5($password);
                    if ($this->modelo->savestudent($idnumber,$name,$lastname,$username,$pass,$email,$role_idrole,$gender_idgender)) {
                        $m = array('msjs' => "<strong class='black-text'>Save Teacher!!</strong>");
                        array_push($msj_load_student, $m);
                    }else{
                        $m = array('msje' => "<strong class='black-text'>Error!, Teacher don't save!!</strong>");
                        array_push($msj_load_student, $m);
                    }
                }else{
                    if ($no >= 1) {
                        $m = array('msjw' => "<strong class='black-text'>Some fields are empty or the fields have less than 3 characters!</strong>");
                        array_push($msj_load_student, $m);
                    }
                }
                echo json_encode($msj_load_student);
        }
    function saveclass(){
        //se extrae los datos de la vista
        $classname = $this->input->post('classname');
        $descriptionclasscenter = $this->input->post('descriptionclasscenter');
        $descriptionclassleft = $this->input->post('descriptionclassleft');
        $descriptionclassright = $this->input->post('descriptionclassright');
        $idteacher = $this->session->userdata('idteacher');
            //declaracion de variables mensajes y 
            $classmsj = array();
            $m = array();
            $si = 0;
            $no = 0;
            $nconfirm = false;
            //consulta si el nombre de la clase ya existe
            $date = $this->modelo->classlist($idteacher)->result();
            foreach ($date as $fila) {
                if($classname == $fila->classname){
                    $nconfirm = false;
                }else{
                    $nconfirm = true;
                }
            }
            //valida campos vacios 
            if ($this->c_valide_field($classname)){
                $si += 1;
            }else{
                $no += 1;
                }
            if ($this->c_valide_field($descriptionclasscenter)){
                $si += 1;
            }else{
                $no += 1;
            }
            //valida si existe el nombre
            if ($nconfirm){
                $si += 1;
            }else{
                $m = array('msjw' => "<strong class='black-text'>Class exit in sistem, pleace change name!</strong>");
                array_push($classmsj, $m);
                $no += 1;
            }
                    
            if($si === 3){
                if($this->modelo->saveclass($classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright,$idteacher)){
                    $m = array('msjs' => "<strong class='black-text'>Save class!</strong>");
                    array_push($classmsj, $m);
                }else{
                    $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
                    array_push($classmsj, $m);
                }
            }else{if($no > 1){
                $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
                array_push($classmsj, $m);}
            }
            echo json_encode($classmsj);
        }
    function saveunity() {
            //se extrae los datos de la vista
            $unityname = $this->input->post('unityname');
            $descriptioncenter = $this->input->post('descriptioncenter');
            $descriptionleft = $this->input->post('descriptionleft');
            $descriptionright = $this->input->post('descriptionright');
            $class_idclass = $this->input->post('class_idclass');
            $class_teacher_idteacher = $this->session->userdata('idteacher');
            //declaracion de variables mensajes y errores
            $unitymsj = array();
            $m = array();
            $si = 0;
            $no = 0;
            //consulta si el nombre de la unidad ya existe
            if ($this->modelo->existunity($unityname)== true) {
                $si += 1;
            } else {
                $m = array('msjs' => "<strong class='black-text'>Unity Name Exist!</strong>");
                array_push($unitymsj, $m);
                $no += 1;
            }
            //valida campos vacios 
            if ($this->c_valide_field($unityname)== true) {
                $si += 1;
            } else {
                $no += 1;
            }
            if($si === 2){
                if($this->modelo->saveunity($unityname,$descriptioncenter,$descriptionleft,$descriptionright,$class_idclass,$class_teacher_idteacher)){
                    $m = array('msjs' => "<strong class='black-text'>Save unity!</strong>");
                    array_push($unitymsj, $m);
                }else{
                    $m = array('msje' => "<strong class='black-text'>Error, Don't save the unity!</strong>");
                    array_push($unitymsj, $m);
                }
            }else{if($no > 0){
                $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
                array_push($unitymsj, $m);}
            }
            echo json_encode($unitymsj);}
    function saveactivity(){
        $activityname = $this->input->post('activityname');
        $descriptionleft = $this->input->post('descriptionleft');
        $descriptionright = $this->input->post('descriptionright');
        $unity_idunity = $this->input->post('unity_idunity');
        $class_idclass = $this->modelo->unityclass($unity_idunity);
        $unity_class_idclass = $class_idclass['class_idclass'];
        $unity_class_teacher_idteacher = $this->session->userdata('idteacher');
        $material_idmaterial = $this->input->post('material_idmaterial');
        $materialtype_idmaterialtype = $this->modelo->unitymaretialtype($material_idmaterial);
        $material_materialtype_idmaterialtype = $materialtype_idmaterialtype['materialtype_idmaterialtype'];

        $msjactivity = array();
        $m = array();
        $si = 0;
        $no = 0;

        if ($this->c_valide_field($activityname) == true) {$si += 1;}else{$no += 1;}
        if ($si === 1) {
            if ($this->modelo->saveactivity($activityname,$descriptionleft,$descriptionright,$unity_idunity,$unity_class_idclass,$unity_class_teacher_idteacher,$material_idmaterial,$material_materialtype_idmaterialtype) === true) {
                $m = array('msjs' => "<strong class='black-text'>Save activity!</strong>");
                array_push($msjactivity, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Don't save activity!</strong>");
                array_push($msjactivity, $m);
            }
        }else{
            $m = array('msjw' => "<strong class='black-text'>Field name are empty!</strong>");
                array_push($msjactivity, $m);
        }
        echo json_encode($msjactivity);}
    function savequestion(){
        $questionname = $this->input->post('questionname');
        $description = $this->input->post('description');
        $activity_idactivity = $this->input->post('activity_idactivity');
        $datos = $this->modelo->questionactivity($activity_idactivity);
        $activity_unity_idunity = $datos['unity_idunity'];
        $activity_unity_class_idclass = $datos['unity_class_idclass'];
        $activity_unity_class_teacher_idteacher = $this->session->userdata('idteacher');
        $activity_material_idmaterial = $datos['material_idmaterial'];
        $activity_material_materialtype_idmaterialtype = $datos['material_materialtype_idmaterialtype'];
        
        $msjquestion = array();
        $m = array();
        $si = 0;
        $no = 0;
        
        if($this->c_valide_field($questionname) == true) {$si += 1;}else{$no += 1;}
        if($si === 1){
            if($this->modelo->savequestion($questionname,$description,$activity_idactivity,$activity_unity_idunity,$activity_unity_class_idclass,$activity_unity_class_teacher_idteacher,$activity_material_idmaterial,$activity_material_materialtype_idmaterialtype)){
                $m = array('msjs' => "<strong class='black-text'>Save question!</strong>");
            array_push($msjquestion, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Don't save question! Error Database!</strong>");
            array_push($msjquestion, $m);
            }
        }else{
            $m = array('msjw' => "<strong class='black-text'>Question are empty!</strong>");
            array_push($msjquestion, $m);
        }
        echo json_encode($msjquestion);}
    function saveanswere(){
        $answerename = $this->input->post('answerename');
        $description = $this->input->post('description');
        $value_idvalue = $this->input->post('value_idvalue');
        $question_idquestion = $this->input->post('question_idquestion');
        $msjanswere = array();
        $m = array();
        $si = 0;
        $no = 0;
        if($this->c_valide_field($answerename) == true){$si += 1;}else{$no += 1;}
        if($si === 1){
            if($this->modelo->saveanswere($answerename,$description,$value_idvalue,$question_idquestion) == true){
                $m = array('msjs' => "<strong class='black-text'>Answere Save!</strong>");
            array_push($msjanswere, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Answere Don't Save!</strong>");
            array_push($msjanswere, $m);
            }
        }else{
            $m = array('msjw' => "<strong class='black-text'>Answere are empty!</strong>");
            array_push($msjanswere, $m);
        }
        echo json_encode($msjanswere);}
    function saveword(){
        $wordname = $this->input->post('wordname');
        $description = $this->input->post('description');
        $aditionaldescription = $this->input->post('aditionaldescription');
        
        $msjword = array();
        $m = array();
        $si = 0;
        $no = 0;
        
        if ($this->c_valide_field($wordname) == true){$si += 1;}else{$no += 1;}
        if ($this->c_valide_field($description) == true){$si += 1;}else{$no += 1;}
        
        if($si == 2){
            if($this->modelo->saveword($wordname,$description,$aditionaldescription) == true){
                $m = array('msjs' => "<strong class='black-text'>Save word!</strong>");
                array_push($msjword, $m);
            }else{
                $m = array('msjw' => "<strong class='black-text'>Dont save word!</strong>");
                array_push($msjword, $m);
            }
        }else{
            $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
            array_push($msjword, $m);
        }
        echo json_encode($msjword);}
//Update Transaction
    function updateclass(){
        //se extrae los datos de la vista
        $idclass = $this->input->post('idclassedit');
        $classname = $this->input->post('classnameedit');
        $descriptioncenter = $this->input->post('classdescriptioncenteredit');
        $descriptionleft = $this->input->post('classdescriptionleftedit');
        $descriptionright = $this->input->post('classdescriptionrightedit');
        $teacher_idteacher = $this->session->userdata('idteacher');
            //declaracion de variables mensajes y 
            $classmsj = array();
            $m = array();
            $si = 0;
            $no = 0;
            //valida campos vacios 
                if ($this->c_valide_field($classname)==true){$si += 1;}else{$no += 1;}
                if ($this->c_valide_field($descriptioncenter)== true){$si += 1;}else{$no += 1;}
                    if($si === 2){
                        if($this->modelo->updateclass($idclass,$classname,$descriptioncenter,$descriptionleft,$descriptionright,$teacher_idteacher) == true){
                            $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
                            array_push($classmsj, $m);
                        }else{
                            $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
                            array_push($classmsj, $m);
                        }
                    }else{if($no > 1){
                        $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
                        array_push($classmsj, $m);}
                    }
            echo json_encode($classmsj);}
    function updateunity(){
        //se extrae los datos de la vista
            $idunity = $this->load->post('idunity');
            $unityname = $this->input->post('unityname');
            $descriptioncenter = $this->input->post('descriptioncenter');
            $descriptionleft = $this->input->post('descriptionleft');
            $descriptionright = $this->input->post('descriptionright');
            $class_idclass = $this->input->post('class_idclass');
            $class_teacher_idteacher = $this->session->userdata('idteacher');
            //declaracion de variables mensajes y errores
            $unityupdatemsj = array();
            $m = array();
            $si = 0;
            $no = 0;
            //valida campos vacios 
            if ($this->c_valide_field($unityname)== true) {
                $si += 1;
            } else {
                $no += 1;
            }
            if($si === 1){
                if($this->modelo->updateunity($idunity,$unityname,$descriptioncenter,$descriptionleft,$descriptionright,$class_idclass,$class_teacher_idteacher)){
                    $m = array('msjs' => "<strong class='black-text'>Save unity!</strong>");
                    array_push($unityupdatemsj, $m);
                }else{
                    $m = array('msje' => "<strong class='black-text'>Error, Don't save the unity!</strong>");
                    array_push($unityupdatemsj, $m);
                }
            }else{if($no > 0){
                $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
                array_push($unityupdatemsj, $m);}
            }
            echo json_encode($unityupdatemsj);}
    function updateactivity(){
        $idactivity = $this->input->post('idactivity');
        $activityname = $this->input->post('activityname');
        $descriptionleft = $this->input->post('descriptionleft');
        $descriptionright = $this->input->post('descriptionright');
        $unity_idunity = $this->input->post('unity_idunity');
        $class_idclass = $this->modelo->unityclass($unity_idunity);
        $unity_class_idclass = $class_idclass['class_idclass'];
        $unity_class_teacher_idteacher = $this->session->userdata('idteacher');
        $material_idmaterial = $this->input->post('material_idmaterial');
        $materialtype_idmaterialtype = $this->modelo->unitymaretialtype($material_idmaterial);
        $material_materialtype_idmaterialtype = $materialtype_idmaterialtype['materialtype_idmaterialtype'];

        $msjactivityupdate = array();
        $m = array();
        $si = 0;
        $no = 0;

        if ($this->c_valide_field($activityname) == true) {$si += 1;}else{$no += 1;}
        if ($si === 1) {
            if ($this->modelo->updateactivity($idactivity,$activityname,$descriptionleft,$descriptionright,$unity_idunity,$unity_class_idclass,$unity_class_teacher_idteacher,$material_idmaterial,$material_materialtype_idmaterialtype) === true) {
                $m = array('msjs' => "<strong class='black-text'>Save activity!</strong>");
                array_push($msjactivityupdate, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Don't save activity!</strong>");
                array_push($msjactivityupdate, $m);
            }
        }else{
            $m = array('msjw' => "<strong class='black-text'>Field name are empty!</strong>");
                array_push($msjactivityupdate, $m);
        }
        echo json_encode($msjactivityupdate);}
    function updatestudent(){
        $idstudent = $this->input->post('idstudent');
        $idnumber = $this->input->post('idnumber');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $gender_idgender = $this->input->post('gender_idgender');
        //declaracion de variables mensajes
        $msjsupdatestudent = array();
        $m = array();
        $si = 0;
        $no = 0;

        if ($this->c_valide_field($idnumber)){$si += 1;}else{$no += 1;}
        if ($this->c_valide_field($name)){$si += 1;}else{$no += 1;}
        if ($this->c_valide_field($lastname)){$si += 1;}else{$no += 1;}
        if ($this->c_valide_field($username)){$si += 1;}else{$no += 1;}
        if ($this->c_valide_field($email)){$si += 1;}else{$no += 1;}

        if($si === 5){
            if($this->modelo->updatestudent($idstudent,$idnumber,$name,$lastname,$username,$email,$gender_idgender)){
                $m = array('msjs' => "<strong class='black-text'>Save changes!</strong>");
                array_push($msjsupdatestudent, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Error, Don't save the changes!</strong>");
                array_push($msjsupdatestudent, $m);
            }
        }else{
            if($no > 1){
            $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
            array_push($msjsupdatestudent, $m);
            }
        }
        echo json_encode($msjsupdatestudent);}      
    function saveyoutubelink(){
        $materialname = $this->input->post('materialname');
        $descriptionleft = $this->input->post('descriptionleft');
        $descriptionright = $this->input->post('descriptionright');
        $link = $this->input->post('link');
        $idmaterialtype = 4;

        $this->modelo->saveyoutubelink($materialname, $descriptionleft,$descriptionright,$link,$idmaterialtype);}
//Delete Transaction
    function deleteteacher(){
        $idteacher = $this->input->post('idteacher');
        $role_idrole = 2;
        $gender_idgender = $this->input->post('gender_idgender');
        $password = md5($this->input->post('password'));

        $msjdelete = array();
        $m = array();

        if ($password == $this->session->userdata('password')) {
            if ($this->modelo->deleteteacher($idteacher, $role_idrole, $gender_idgender)) {
                $m = array('msjs' => "<strong class='black-text'>Delete teacher</strong>");
                array_push($msjdelete, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Don't delete teacher, Error Database!</strong>");
                array_push($msjdelete, $m);
            }
        }else{
            $m = array('msje' => "<strong class='black-text'>Password incorrect! don't delete teacher</strong>");
            array_push($msjdelete, $m);
        }
        echo json_encode($msjdelete);}
    function deleteclass(){
        $idclass = $this->input->post('idclass');
        $password = md5($this->input->post('password'));
        $user = $this->session->userdata('username');
        $idteacher = $this->session->userdata('idteacher');
        $ressultDelete = "";
        
        $msjdeleteclass = array();
        $m = array();
        
        if ($this->modelo->confirm_delete($user,$password)) {
            if($this->modelo->deleteclass($idclass,$idteacher)){
                $m = array('msjs' => "<strong class='black-text'>Delete Class!</strong>");
                array_push($msjdeleteclass, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Don't delete Class, Unit depend of this class!</strong>");
                array_push($msjdeleteclass, $m);
            }
        }else{
            $m = array('msje' => "<strong class='black-text'>Don't delete Class, Error!; Pass is Incorrect!</strong>");
                array_push($msjdeleteclass, $m);
        }
        echo json_encode($msjdeleteclass);
    }
    function deleteStudent(){
        $idstudent = $this->input->post('idstudent');
        $password = md5($this->input->post('password'));
        $user = $this->session->userdata('username');

        $msjdeletestudent = array();
        $m = array();
        
        if ($this->modelo->confirm_delete($user,$password)) {
            if($this->modelo->deleteStudent($idstudent)){
                $m = array('msjs' => "<strong class='black-text'>Delete Student!</strong>");
                array_push($msjdeletestudent, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Don't delete student!</strong>");
                array_push($msjdeletestudent, $m);
            }
        }else{
            $m = array('msje' => "<strong class='black-text'>Don't delete student, Error! Pass is Incorrect!</strong>");
                array_push($msjdeletestudent, $m);
        }
        echo json_encode($msjdeletestudent);
    }
//Files Transaction
    public function upload_audio(){
            $config['upload_path']          = './media';
            $config['allowed_types']        = '*';
            $config['max_size']             = 10000000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')){
                //error
            }else{
                $data = array('upload_data' => $this->upload->data());
                redirect(base_url());
            }}
    public function upload_video(){
            $config['upload_path']          = './media';
            $config['allowed_types']        = '*';
            $config['max_size']             = 1000000000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                //error
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                redirect(base_url());
            }}
//---------Select List Transaction---------
    function teacherlist(){
        $list['teacher'] = $this->modelo->teacherlist()->result();
        $list['gender'] = $this->modelo->genderlist()->result();
        $this->load->view('coordinator/teacherlist',$list);
    }
    function studentlist(){
        $list['student'] = $this->modelo->studentlist()->result();
        $list['role'] = $this->modelo->rolelist()->result();
        $list['gender'] = $this->modelo->genderlist()->result();
        $this->load->view('teacher/class/studentlist',$list);}
    function classlist(){
        $list['class'] = $this->modelo->classlist($this->session->userdata('idteacher'))->result();
        $list['name'] = $this->session->userdata('name');
        $list['lastname'] = $this->session->userdata('lastname');
        $list['email'] = $this->session->userdata('email');
        $list['idteacher'] = $this->session->userdata('idteacher');
        $this->load->view('teacher/class/classlist',$list);}
    function unitylist(){
        $list['unity'] = $this->modelo->unitylist($this->session->userdata('idteacher'))->result();
        $list['class'] = $this->modelo->classlist($this->session->userdata('idteacher'))->result();
        $list['name'] = $this->session->userdata('name');
        $list['lastname'] = $this->session->userdata('lastname');
        $list['idteacher'] = $this->session->userdata('idteacher');
        $this->load->view('teacher/unity/unitylist',$list);}
    function materiallist(){
        $list['material'] = $this->modelo->materiallist()->result();
        $list['materialtype'] = $this->modelo->materialtypelist()->result();
        $this->load->view('teacher/material/materiallist',$list);}
    function activitylist(){
        $list['activity'] = $this->modelo->activitylist($this->session->userdata('idteacher'))->result();
        $list['unity'] = $this->modelo->unitylist($this->session->userdata('idteacher'))->result();
        $list['material'] = $this->modelo->materiallist()->result();
        $list['name'] = $this->session->userdata('name');
        $list['lastname'] = $this->session->userdata('lastname');
        $this->load->view('teacher/activity/activitylist',$list);}
    function questionlist(){
        $list['value'] = $this->modelo->valuelist()->result();
        $list['answer'] = $this->modelo->answerlist()->result();
        $list['question'] = $this->modelo->questionlist($this->session->userdata('idteacher'))->result();
        $list['activity'] = $this->modelo->activitylist($this->session->userdata('idteacher'))->result();
        $this->load->view('teacher/activity/questionlist',$list);
    }
    function glosarylist(){
        $list['glosary'] = $this->modelo->glosarylist()->result();
        $this->load->view('teacher/glosary/glosarylist',$list);
    }
    function progresslist(){
        $this->load->view('teacher/progress/progresslist');
    }
//---------Load Page Web---------
    function load_teacher(){$list = $this->modelo->user_list_teacher(); echo json_encode($list);}
    function load_student(){$list = $this->modelo->user_list_student(); echo json_encode($list);}
    function student_load_menu(){$this->load->view('teacher/class/menu-students');}
    function learning_load(){$this->load->view('teacher/class/menu-learning');}
    function newclass(){$this->load->view('teacher/class/newclass');}
//-------------------------validaciones-----------------------------
        //valida que los camposs no esten vacios y que no sean menores de 3 caracteres
        function c_valide_field($field){ 
           //compruebo que el tamaño del string sea válido. 
           if (strlen($field)<3 || strlen($field)>200){  
              return false; 
           } 
           //comprueba que los caracteres sean los permitidos 
           $permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ0123456789-_ @.,:;'?#"; 
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





