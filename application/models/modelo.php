<?php

class Modelo extends CI_Model{


//seccion usuarios

	function login($username, $password){
	//se consulta por el rut y contraseña en la tabla teacher
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$queryteacher = $this->db->get('teacher');
		//se consulta por el rut y contraseña en la tabla student
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$querystudent = $this->db->get('student');
                //se consulta por el rut y contraseña en la tabla coordinator
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$querycoordinator = $this->db->get('coordinator');

		//se declara los arreglos vacios para evitar errores de compilacion
                $data_response['idcoordinator'] = '';
		$data_response['idteacher'] = '';
		$data_response['idstudent'] = '';
		$data_response['username'] = ''; 
		$data_response['name'] = '';
		$data_response['lastname'] = '';
		$data_response['idnumber'] = '';
		$data_response['role_idrole'] = '';
                $data_response['gender_idgender'] = '';
		$data_response['email'] = '';

		if($queryteacher->num_rows() != 0){
			//se almacena la respuesta 
			foreach ($queryteacher->result() as $fila) {
				$data_response['idteacher'] = $fila->idteacher;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['name'] = $fila->name;				
				$data_response['lastname'] = $fila->lastname;
				$data_response['username'] = $fila->username;
                                $data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
		}elseif ($querystudent->num_rows() != 0){
			//se almacena la respuesta 
			foreach ($querystudent->result() as $fila) {
				$data_response['idstudent'] = $fila->idstudent;
				$data_response['username'] = $fila->username;
				$data_response['name'] = $fila->name;
				$data_response['lastname'] = $fila->lastname;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
		}else{
                    //se almacena la respuesta 
			foreach ($querycoordinator->result() as $fila) {
				$data_response['idcoordinator'] = $fila->idcoordinator;
				$data_response['username'] = $fila->username;
				$data_response['name'] = $fila->name;
				$data_response['lastname'] = $fila->lastname;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
                }
                
		//devuelve el arreglo
		return $data_response;}

	function confirm_user($user_name){
	//Consulta nombre de usuario devuelve un booleano
		$this->db->select('name_user');
		$this->db->where('name_user', $user_name);
		$res = $this->db->get('user');

		if ($res->num_rows() != 0) {
			return true;
		} else {
			return false;
		}}
        function gendername($idgender){
            $this->db->select('*');
            $this->db->where('idgender', $idgender);
            $this->db->limit(1);
            $query = $this->db->get('gender');
            
            $data_response['name'] = "";
            
            foreach ($query->result() as $fila) {
                $data_response['name'] = $fila->name;
            }
            
            return $data_response;
        }

        function unityclass($unity_idunity){
        	$this->db->select('*');
        	$this->db->where('idunity', $unity_idunity);
                $this->db->limit(1);
        	$res = $this->db->get('unity');
                
                $idclass['unity_class_idclass'] = "";
                
                foreach ($res->result() as $fila){
                    $idclass['class_idclass'] = $fila->class_idclass;
                }
                return $idclass;
        }

        function unitymaretialtype($material_idmaterial){
        	$this->db->select('*');
        	$this->db->where('idmaterial', $material_idmaterial);
                $this->db->limit(1);
        	$query = $this->db->get('material');
                
                $idmaterial['materialtype_idmaterialtype']= "";
                
                foreach ($query->result() as $fila){
                    $idmaterial['materialtype_idmaterialtype']= $fila->materialtype_idmaterialtype;
                }
            return $idmaterial;
        }
        function questionactivity($activity_idactivity){
            $this->db->select('*');
            $this->db->where('idactivity',$activity_idactivity);
            $this->db->limit(1);
            $query = $this->db->get('activity');
            
            $datos['unity_idunity']="";
            $datos['unity_class_idclass']="";
            $datos['material_idmaterial']="";
            $datos['material_materialtype_idmaterialtype']="";
            
            foreach ($query->result() as $fila){
                $datos['unity_idunity']= $fila->unity_idunity;
                $datos['unity_class_idclass']= $fila->unity_class_idclass;
                $datos['material_idmaterial']= $fila->material_idmaterial;
                $datos['material_materialtype_idmaterialtype']= $fila->material_materialtype_idmaterialtype;
            }
            return $datos;
        }

	function studentexist($idnumber){
	//valida si existe el rut que se intenta ingresar
		$this->db->select('*');
		$this->db->where('idnumber', $idnumber);
		$res = $this->db->get('student');
		if ($res->num_rows() != 0) {return true;} else {return false;}}
        function existunity($unityname){
            //valida si existe el nombre de la unidad
            $this->db->select('*');
            $this->db->where('unityname',$unityname);
            $res = $this->db->get('unity');
            if ($res->num_rows() != '') {return false;} else {return true;}
        }

	function save_teacher($rut,$first_name,$middle_name,$first_surname,$second_surname,$name_user,$pass,$type){
		//Guarda el docente en la base de datos
		$insert_teacher = array(
			'rut' => $rut,
			'first_name' => $first_name,
			'middle_name' => $middle_name,
			'first_surname' => $first_surname,
			'second_surname' => $second_surname,
			'name_user' => $name_user,
			'password' => $pass,
			'type_user_id_type_user' => $type
		);

		$this->db->insert('user', $insert_teacher);

		return true;
	}
		
	function savestudent($idnumber,$name,$lastname,$username,$password,$email,$role_idrole,$gender_idgender){
		//Guarda el docente en la base de datos
		$insert_student = array(
			'idnumber' => $idnumber,
			'name' => $name,
			'lastname' => $lastname,
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'role_idrole' => $role_idrole,
			'gender_idgender' => $gender_idgender
		);

		$this->db->insert('student', $insert_student);

		return true;
	}
	function saveyoutubelink($materialname, $descriptionleft,$descriptionright,$link,$idmaterialtype){
		//Guarda el link en la base de datos
		$insert_material = array(
			'materialname' => $materialname,
			'descriptionleft' => $descriptionleft,
			'descriptionright' => $descriptionright,
			'link' => $link,
			'route' => '',
			'url' => '',
			'materialtype_idmaterialtype' => $idmaterialtype
		);

		$this->db->insert('material', $insert_material);

		return true;
	}

	function saveclass($classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright,$teacher_idteacher){
		$insertclass = array(
			'classname' => $classname,
			'descriptioncenter' => $descriptionclasscenter,
			'descriptionleft' => $descriptionclassleft,
			'descriptionright' => $descriptionclassright,
			'teacher_idteacher' => $teacher_idteacher
		);
		
		$this->db->insert('class', $insertclass);
		return true;
	}

	function saveunity($unityname,$descriptioncenter,$descriptionleft,$descriptionright,$class_idclass,$class_teacher_idteacher){
		$insertunity = array(
			'unityname' => $unityname,
			'descriptioncenter' =>$descriptioncenter,
			'descriptionleft' =>$descriptionleft,
			'descriptionright' =>$descriptionright,
			'class_idclass' => $class_idclass,
                        'class_teacher_idteacher' => $class_teacher_idteacher
		);
		
		$this->db->insert('unity', $insertunity);
		return true;
	}
        
        function saveactivity($activityname,$descriptionleft,$descriptionright,$unity_idunity,$unity_class_idclass,$unity_class_teacher_idteacher,$material_idmaterial,$material_materialtype_idmaterialtype){
            $insertactivity = array(
                'activityname' => $activityname,
                'descriptionleft' => $descriptionleft,
                'descriptionright' => $descriptionright,
                'unity_idunity' => $unity_idunity,
                'unity_class_idclass' => $unity_class_idclass,
                'unity_class_teacher_idteacher' => $unity_class_teacher_idteacher,
                'material_idmaterial' => $material_idmaterial,
                'material_materialtype_idmaterialtype' => $material_materialtype_idmaterialtype
            );
            
            $this->db->insert('activity', $insertactivity);
            return true;
        }
        
        function savequestion($questionname,$description,$activity_idactivity,$activity_unity_idunity,$activity_unity_class_idclass,$activity_unity_class_teacher_idteacher,$activity_material_idmaterial,$activity_material_materialtype_idmaterialtype){
            $insertquestion = array(
                'questionname' => $questionname,
                'description' => $description,
                'activity_idactivity' => $activity_idactivity,
                'activity_unity_idunity' => $activity_unity_idunity,
                'activity_unity_class_idclass' => $activity_unity_class_idclass,
                'activity_unity_class_teacher_idteacher' => $activity_unity_class_teacher_idteacher,
                'activity_material_idmaterial' => $activity_material_idmaterial,
                'activity_material_materialtype_idmaterialtype' => $activity_material_materialtype_idmaterialtype
            );
            $this->db->insert('question', $insertquestion);
            return true;
        }
        function saveanswere($answerename,$description,$value_idvalue,$question_idquestion){
            $insertanswere = array(
                'answername' => $answerename,
                'description' => $description,
                'value_idvalue' => $value_idvalue,
                'question_idquestion' => $question_idquestion
            );
            $this->db->insert('answer', $insertanswere);
            return true;
        }
        
        function saveword($wordname,$description,$aditionaldescription){
            $insertword = array(
                'wordname' => $wordname,
                'description' => $description,
                'aditionaldescription' => $aditionaldescription
            );
            
            $this->db->insert('glosary', $insertword);
            return true;
        }

	function teacherlist(){
		//Lista de profesores
		$this->db->select("*");
		return $this->db->get('teacher');
	}

	function studentlist(){
		$this->db->select("*");
		$student = $this->db->get('student');
		return $student;
	}
	function rolelist(){
		$this->db->select("*");
		$role = $this->db->get('role');
		return $role;
	}
	function genderlist(){
		$this->db->select("*");
		$gender = $this->db->get('gender');
		return $gender;
	}
	function classlist($idteacher){
		$this->db->select("*");
		$this->db->where('teacher_idteacher', $idteacher);
		return $this->db->get('class');
	}
	function unitylist($idteacher){
		$this->db->select("*");
		$this->db->where('class_teacher_idteacher', $idteacher);
		return $this->db->get('unity');
	}
	function activitylist($idteacher){
		$this->db->select("*");
		$this->db->where('unity_class_teacher_idteacher', $idteacher);
		return $this->db->get('activity');
	}
        function questionlist($idteacher){
            $this->db->select("*");
            $this->db->where('activity_unity_class_teacher_idteacher', $idteacher);
            return $this->db->get('question');
        }
        function answerlist(){
            $this->db->select("*");
            return $this->db->get('answer');
        }
        function valuelist(){
            $this->db->select("*");
            return $this->db->get('value');
        }
	function materiallist(){
		$this->db->select('*');
		return $this->db->get('material');
	}
	function materialtypelist(){
		$this->db->select('*');
		return $this->db->get('materialtype');
	}
        function glosarylist(){
            $this->db->select('*');
            return $this->db->get('glosary');
        }
	//*faltan datos para el update
	function updateclass($idclass,$classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright,$idteacher){
		//Realiza un update a la tabla usuario
		$this->db->where('idclass', $idclass);
		$query = array(
			'idclass' => $idclass,
			'classname' => $classname,
			'descriptioncenter' => $descriptionclasscenter,
			'descriptionleft' => $descriptionclassleft,
			'descriptionright' => $descriptionclassright,
			'teacher_idteacher' => $idteacher
		);
		$this->db->update('class', $query);

		return true;
	}

	function updatestudent($idstudent,$idnumber,$name,$lastname,$username,$email,$gender_idgender){

		$this->db->where('idstudent', $idstudent);
		$query = array(
			'idnumber' => $idnumber,
			'name' => $name,
			'lastname' => $lastname,
			'username' => $username,
			'email' => $email,
			'gender_idgender' => $gender_idgender
		);

		$this->db->update('student', $query);

		return true;

	}

	function deleteteacher($idteacher, $role_idrole, $gender_idgender){
		$this->db->query("DELETE FROM `teacher` WHERE `teacher`.`idteacher` = $idteacher AND `teacher`.`role_idrole` = $role_idrole AND `teacher`.`gender_idgender` = $gender_idgender");
		return true;
	}
        
    function deleteclass($idclass){
    	$this->db->where('idclass', $idclass);
        $query = $this->db->delete('class');
        return true;
    }






}

?>