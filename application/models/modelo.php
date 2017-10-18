<?php

class Modelo extends CI_Model{


//seccion usuarios

	function login($user, $pass){
		//se consulta por el nombre y pass a la tabla user
		$this->db->select('*');
		$this->db->where('name_user',$user);
		$this->db->where('password',$pass);
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
		return $data_response;

	}

	function confirm_user($user_name){
		$this->db->select('*');
		$this->db->where('name_user', $user_name);
		$res = $this->db->get('user');

		if ($res.num_rows() != 0) {
			return true;
		} else {
			return false;
		}
		
	}

	function save_teacher($rut,$first_name,$middle_name,$first_surname,$second_surname,$user_name,$password,$type){
		$insert_teacher = array(
			'rut' => $rut,
			'first_name' => $first_name,
			'middle_name' => $middle_name,
			'first_surname' => $first_surname,
			'second_surname' => $second_surname,
			'name_user' => $user_name,
			'password' => $password,
			'type' => $type
		);

		$this->db->insert('user', $insert_teacher);

		return true;
	}






}

?>