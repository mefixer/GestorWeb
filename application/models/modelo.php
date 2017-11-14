<?php

class Modelo extends CI_Model{


//seccion usuarios

	function login($user, $pass){
	//se consulta por el nombre y pass a la tabla user
		$this->db->select('*');
		$this->db->where('name_user',$user);
		$this->db->where('password', $pass);
		$this->db->limit(1);
		//se almacena la respuesta
		$response = $this->db->get('user');
		//se declara los arreglos
		$data_response['rut'] = ''; 
		$data_response['type'] = '';
		$data_response['first_name'] = '';
		$data_response['first_surname'] = '';
		//se almacena la respuesta 
		foreach ($response->result() as $fila) {
		$data_response['rut'] = $fila->rut;
		$data_response['type'] = $fila->type;
		$data_response['first_name'] = $fila->first_name;
		$data_response['first_surname'] = $fila->first_surname;
		}
		//devuelve el arreglo
		return $data_response;}

	function confirm_user($user_name){
	//Consulta nombre de usuario devuelve un booleano
		$this->db->select('*');
		$this->db->where('name_user', $user_name);
		$res = $this->db->get('user');

		if ($res.num_rows() != 0) {
			return true;
		} else {
			return false;
		}}

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
			'type' => $type
		);

		$this->db->insert('user', $insert_teacher);

		return true;}
		function save_student($rut,$first_name,$middle_name,$first_surname,$second_surname,$name_user,$pass,$type){
	//Guarda el docente en la base de datos
		$insert_teacher = array(
			'rut' => $rut,
			'first_name' => $first_name,
			'middle_name' => $middle_name,
			'first_surname' => $first_surname,
			'second_surname' => $second_surname,
			'name_user' => $name_user,
			'password' => $pass,
			'type' => $type
		);

		$this->db->insert('user', $insert_teacher);

		return true;}

	function user_list_teacher(){
	//Lista de profesores
		$this->db->select("*");
		$this->db->where('type','Teacher');
		$response = $this->db->get('user');
		//se almacena la respuesta 
		$data_response = array();
		foreach ($response->result() as $fila) {
			$fil= array(
				'rut' => $fila->rut,
				'first_name' => $fila->first_name,
				'middle_name' => $fila->middle_name,
				'first_surname' => $fila->first_surname,
				'second_surname' => $fila->second_surname,
				'name_user' => $fila->name_user,
				'type' => $fila->type
			);
			array_push($data_response, $fil);
		}
		//devuelve el arreglo
		return $data_response;
	}
	function user_list_student(){
	//Lista de profesores
		$this->db->select("*");
		$this->db->where('type','Student');
		$response = $this->db->get('user');
		//se almacena la respuesta 
		$data_response = array();
		foreach ($response->result() as $fila) {
			$fil= array(
				'rut' => $fila->rut,
				'first_name' => $fila->first_name,
				'middle_name' => $fila->middle_name,
				'first_surname' => $fila->first_surname,
				'second_surname' => $fila->second_surname,
				'name_user' => $fila->name_user,
				'type' => $fila->type
			);
			array_push($data_response, $fil);
		}
		//devuelve el arreglo
		return $data_response;
	}
	//*faltan datos para el update
	function edit_user($rut){
		//Realiza un update a la tabla usuario
		$this->db->where('rut', $rut);
		$query = array(
			//con datos desde controlador
			//'valor db1' => 'valorc1',
			//'valor db2' => 'valorc2'
		);
		$this->db->update('user', $query);

		return true;
	}
}

?>