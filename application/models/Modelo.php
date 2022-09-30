<?php

use PhpParser\Node\Stmt\TryCatch;

class Modelo extends CI_Model
{
	function login($nombre_usuario, $password)
	{
		$this->db->select('*');
		$this->db->where('nombre_usuario', $nombre_usuario);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$query = $this->db->get('usuario');

		//se declara los arreglos vacios para evitar errores de compilacion
		$data_response['id_usuario'] = '';
		$data_response['nombre_usuario'] = '';
		$data_response['primer_nombre'] = '';
		$data_response['primer_apellido'] = '';
		$data_response['rut'] = '';
		$data_response['rol_id_rol'] = '';
		$data_response['genero_id_genero'] = '';
		$data_response['email'] = '';

		if ($query->num_rows() != 0) {
			//se almacena la respuesta 
			foreach ($query->result() as $fila) {
				$data_response['id_usuario'] = $fila->id_usuario;
				$data_response['nombre_usuario'] = $fila->nombre_usuario;
				$data_response['primer_nombre'] = $fila->primer_nombre;
				$data_response['primer_apellido'] = $fila->primer_apellido;
				$data_response['rut'] = $fila->rut;
				$data_response['email'] = $fila->email;
				$data_response['rol_id_rol'] = $fila->rol_id_rol;
				$data_response['genero_id_genero'] = $fila->genero_id_genero;
			}
		}

		//devuelve el arreglo
		return $data_response;
	}
	function userlist()
	{
		$this->db->select('*');
		$res = $this->db->get('usuario');

		return $res;
	}
	function productList()
	{
		$this->db->select('*');
		$res = $this->db->get('producto');
		return $res;
	}
	function principal()
	{
		$this->db->select('*');
		$res = $this->db->get('principal');
		return $res;
	}
	function galeria()
	{
		$this->db->select('*');
		$res = $this->db->get('galeria');
		return $res;
	}
	function destacados()
	{
		$this->db->select('*');
		$res = $this->db->get('destacados');
		return $res;
	}
	function posteos()
	{
		$this->db->select('*');
		$res = $this->db->get('posteos');
		return $res;
	}
	function savelogstart($fecha, $username, $role_idrole)
	{
		$addlog = array(
			'start' => $fecha,
			'end' => null,
			'username' => $username,
			'role_idrole' => $role_idrole
		);
		$this->db->insert('log', $addlog);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	function savelogend($fecha, $username, $role_idrole)
	{
		$addlog = array(
			'start' => null,
			'end' => $fecha,
			'username' => $username,
			'role_idrole' => $role_idrole
		);
		$this->db->insert('log', $addlog);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	function genero()
	{
		$this->db->select('*');
		$res = $this->db->get('genero');

		return $res;
	}
	function rol($id_rol)
	{
		$this->db->select('*');
		$this->db->where('id_rol', $id_rol);
		$res = $this->db->get('rol');

		$nombre_rol = "";
		foreach ($res->result() as $fila) {
			$nombre_rol = $fila->nombre_rol;
		}
		return $nombre_rol;
	}
	function userrol()
	{
		$this->db->select('*');
		$res = $this->db->get('rol');

		return $res;
	}
	function usergender()
	{
		$this->db->select('*');
		$res = $this->db->get('genero');

		return $res;
	}
	function roleid($rolename)
	{
		$this->db->select('*');
		$this->db->where('rolename', $rolename);
		$res = $this->db->get('role');

		$idrole = "";
		foreach ($res->result() as $file) {
			$idrole = $file->idrole;
		}
		return $idrole;
	}
	function agregar_usuario($rut, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $nombre_usuario, $password, $email, $rol_id_rol, $genero_id_genero)
	{
		$data['rut'] = $rut;
		$data['primer_nombre'] = $primer_nombre;
		$data['segundo_nombre'] = $segundo_nombre;
		$data['primer_apellido'] = $primer_apellido;
		$data['segundo_apellido'] = $segundo_apellido;
		$data['nombre_usuario'] = $nombre_usuario;
		$data['password'] = $password;
		$data['email'] = $email;
		$data['rol_id_rol'] = $rol_id_rol;
		$data['genero_id_genero'] = $genero_id_genero;

		$this->db->insert('usuario', $data);
		return true;
	}
	function adProduct($name, $foto, $description, $price, $stock, $date)
	{
		$data = [
			'name' => $name,
			'descripcion' => $description,
			'stock' => $stock,
			'price' => $price,
			'img' => $foto,
			'created_date' => $date,
			'update_date' => $date
		];
		$this->db->insert('producto', $data);

		return true;
	}
	//Productos
	function productos(){
		$this->db->select('*');
		return $this->db->get('producto');
	}
	function productopedido($idproducto)
	{
		$this->db->select('*');
		$this->db->where('id', $idproducto);
		return $this->db->get('producto');
	}
	function confirm_delete($user_name, $password)
	{
		$this->db->select('name');
		$this->db->where('username', $user_name);
		$this->db->where('password', $password);
		$res = $this->db->get('administrator');

		if ($res->num_rows() != 0) {
			return true;
		} else {
			return false;
		}
	}
	//Carrito
	function getProduct($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->get('producto');
		return $res;
	}

	function realizar_pedido($data)
	{
		if ($data != null) {
			$this->db->insert('carro', $data);
			return true;
		} else {
			return false;
		}
	}
	function guarda_solicitud($data)
	{
		if ($data != null) {
			$this->db->insert('carro', $data);
			return true;
		} else {
			return false;
		}
	}
	function estado($nombre)
	{
		$this->db->select('id');
		$this->db->where('nombre', $nombre);
		$res = $this->db->get('estado');
		return $res;
	}
	function estados()
	{
		$this->db->select('*');
		$res = $this->db->get('estado');
		return $res;
	}
	function carro($codigo)
	{
		$this->db->select('*');
		$this->db->where('codigo', $codigo);
		$res = $this->db->get('carro');

		if ($res->num_rows() != 0) {
			return true;
		} else {
			return false;
		}
	}
	function pedidos()
	{
		$this->db->select('*');
		$res = $this->db->get('carro');
		return $res;
	}
	function verificar($codigo)
	{
		$this->db->select('*');
		$this->db->where('id', $codigo);
		return $this->db->get('carro');
	}
	function detalle_pedido($codigo){
		if($codigo != null){
			$this->db->select('*');
			$this->db->where('id_carro',$codigo);
			return $this->db->get('detalle_carro');
		}else{
			$this->db->select('*');
			return $this->db->get('detalle_carro');
		}

	}
	function pedido_up($nombre, $apellido, $direccion, $correo, $celular, $estado)
	{
		$data = [
			'nombre' => $nombre,
			'apellido' => $apellido,
			'direccion' => $direccion,
			'correo' => $correo,
			'celular' => $celular,
			'id_estado' => $estado
		];
		$this->db->insert('carro', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	function detalle_pedido_up($id_producto,$id_carro,$cantidad,$subtotal,$codigo){
		$data = [
			'id_producto' => $id_producto,
			'id_carro' => $id_carro,
			'cantidad' => $cantidad,
			'subtotal' => $subtotal,
			'codigo' => $codigo
		];
		$res = $this->db->insert('detalle_carro', $data);
		return $res;
	}
}
