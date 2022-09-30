<?php

use CodeIgniter\CLI\Console;
use PHPUnit\Util\Printer;
use SebastianBergmann\Environment\Console as EnvironmentConsole;

defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_controller
{
    //carga librerias para trabajar
    function __construct()
    {
        parent::__construct();
        $this->load->model("modelo");
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->library('cart');
    }
    //división de pagina
    public function index()
    {
        //NAVBAR
        $this->load->view('head');
        //Container
        $this->load->view('body');
        //Footer
        $this->load->view('footer');
    }
    //carga sistema
    function charger()
    {
        //primero consulta si existe un usuario loggeado
        if ($this->session->userdata('logged')) {
            //se almacenan las variables del usuario activo
            $id_genero = $this->session->userdata('genero_id_genero');
            $id_rol = $this->session->userdata('rol_id_rol');
            //con el id del rol se trae el dato 
            $nombre_rol = $this->modelo->rol($id_rol);
            $data['id_usuario'] = $this->session->userdata('id_usuario');
            $data['primer_nombre'] = $this->session->userdata('primer_nombre');
            $data['primer_apellido'] = $this->session->userdata('primer_apellido');
            $data['email'] = $this->session->userdata('email');
            //con el nombre del rol se filtra al usuario:
        
            // Ahora existen [estos]:
            //-- Administrador - Director - Jefe de Unidad - Usuario de Unidad --

            switch ($nombre_rol) {
                case 'Administrador':
                    //si es Administrador pasa y se carga su vista y datos de usuario
                    $this->load->view('administrator/home-administrator', $data);
                    break;
                    // case 'Director':
                    //     //si es Administrador pasa y se carga su vista y datos de usuario
                    //     $this->load->view('administrator/home-director', $data);
                    //     break;
                    // case 'Jefe de Unidad':
                    //     //si es Administrador pasa y se carga su vista y datos de usuario
                    //     $this->load->view('administrator/home-jefe-unidad', $data);
                    //     break;
                    // case 'Usuario de Unidad':
                    //     //si es Administrador pasa y se carga su vista y datos de usuario
                    //     $this->load->view('administrator/home-usuario-unidad', $data);
                    //     break;
            }
        } else {
            //de no existir un usuario loggeado se envia al login
            $data['principal'] = $this->modelo->principal()->result();
            $data['galeria'] = $this->modelo->galeria()->result();
            $data['destacados'] = $this->modelo->destacados()->result();
            $data['posteos'] = $this->modelo->posteos()->result();
            $this->load->view('login', $data);
        }
    }
    function load_user()
    {
        $nombre_usuario = $this->input->post('nombre_usuario');
        $password = md5($this->input->post('password'));
        //se declaran los mensajes
        $msjs = '';
        $msje = '';
        $msjw = '';
        //se declara las variables
        $cookies = '';
        //se validan los campos para que no sean vacios
        if ($this->nullcheck($nombre_usuario) & $this->nullcheck($password)) {
            //se consulta al modelo por usuario y su pass
            $datos = $this->modelo->login($nombre_usuario, $password);
            //la respuesta se almacena en un arreglo
            $cookies = array(
                "id_usuario" => $datos['id_usuario'],
                "rut" => $datos['rut'],
                "primer_nombre" => $datos['primer_nombre'],
                "primer_apellido" => $datos['primer_apellido'],
                "nombre_usuario" => $datos['nombre_usuario'],
                "email" => $datos['email'],
                "rol_id_rol" => $datos['rol_id_rol'],
                "genero_id_genero" => $datos['genero_id_genero']
            );
            //se consulta si la respuesta es vacia para continuar
            if ($datos['rol_id_rol'] != '') {
                $cookies['logged'] = true;
                //se carga la session
                $this->session->set_userdata($cookies);
                //se almacena un mensaje 
                $msjs = "<strong class='black-text'>Bienvenido!</strong>";
            } else {
                $cookies['logged'] = false;
                //se carga la session vacia
                $this->session->set_userdata($cookies);
                //se indica el mensaje
                $msje = "<strong class='black-text'>No a logrado entrar!</strong>";
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
        ));
    }
    //Cierra Sesión
    function close_session()
    {

        // $fecha = date('Y-m-d H:i:s');
        //     $username = $this->session->userdata('username');
        //     $role_idrole = $this->session->userdata('role_idrole');
        //     $teacher_idteacher = $this->session->userdata('idteacher');

        //     $idlog = $this->modelo->savelogend($fecha,$username,$role_idrole);
        //     $this->modelo->saveteacherhaslog($teacher_idteacher, $role_idrole, $idlog);

        $this->session->sess_destroy();
        $msjclose = "<strong class='black-text'>Nos Vemos!</strong>";
        echo json_encode(array('message_close' => $msjclose));
    }
    //carga vistas de agregado
    function useradd()
    {
        $data['rol'] = $this->modelo->userrol()->result();
        $data['gender'] = $this->modelo->usergender()->result();
        $data['usuario'] = $this->modelo->userlist()->result();
        $this->load->view('administrator/user/useradd', $data);
    }
    function productadd()
    {
        $data['producto'] = $this->modelo->productList()->result();
        $this->load->view('administrator/product/productadd', $data);
    }
    function principaladd()
    {
        $data['principal'] = $this->modelo->principal()->result();
        $this->load->view('administrator/portada/principal', $data);
    }
    function galeryadd()
    {
        $data['galeria'] = $this->modelo->galeria()->result();
        $this->load->view('administrator/portada/galeria', $data);
    }
    function destacadosadd()
    {
        $data['destacados'] = $this->modelo->destacados()->result();
        $this->load->view('administrator/portada/destacados', $data);
    }
    function postadd()
    {
        $data['posteos'] = $this->modelo->posteos()->result();
        $this->load->view('administrator/portada/posteos');
    }
    function adProduct()
    {
        //inicio mensajes:
        $msj = array();
        $m = array();

        $name = $this->input->post('name');
        $foto = $this->input->post('foto');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $date = date('Y-m-d');
        if ($this->modelo->adProduct($name, $foto, $description, $price, $stock, $date) === true) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>no se pudo realizar el ingreso</strong>");
            array_push($msj, $m);
        }


        //Finalmente Guardado de informacion o mensajes de error!
        if ($msj == null) {
            $m = array('msjs' => "<strong class='black-text'>Producto ingresado correctamente</strong>");
            array_push($msj, $m);
        } else {
            $m = array('msje' => "<strong class='black-text'>No se puede completar el ingreso del producto/strong>");
            array_push($msj, $m);
        }

        //Respuesta Ajax
        echo json_encode($msj);
    }
    function agregar_usuario()
    {
        //inicio mensajes:
        $msj = array();
        $m = array();

        //Datos Post desde js/funciones.js 
        $rut = $this->input->post('rut');
        $primer_nombre = $this->input->post('primer_nombre');
        $segundo_nombre = $this->input->post('segundo_nombre');
        $primer_apellido = $this->input->post('primer_apellido');
        $segundo_apellido = $this->input->post('segundo_apellido');
        $nombre_usuario = $this->input->post('nombre_usuario');
        $password = $this->input->post('password');
        $passwordConfirm = $this->input->post('passwordConfirm');
        $email = $this->input->post('email');
        $rol = $this->input->post('rol');
        $genero = $this->input->post('genero');


        //validacion de datos
        if ($this->nullcheck($rut)) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el rut</strong>");
            array_push($msj, $m);
        }

        if ($this->nullcheck($primer_nombre)) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el nombre</strong>");
            array_push($msj, $m);
        }
        if ($this->nullcheck($segundo_nombre)) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el apellido</strong>");
            array_push($msj, $m);
        }
        if ($this->nullcheck($primer_apellido)) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el apellido</strong>");
            array_push($msj, $m);
        }
        if ($this->nullcheck($segundo_apellido)) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el nombre de usuario</strong>");
            array_push($msj, $m);
        }
        if ($this->nullcheck($nombre_usuario)) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el nombre de usuario</strong>");
            array_push($msj, $m);
        }
        if ($password != null) {
            if ($password != $passwordConfirm) {
                $m = array('msjw' => "<strong class='black-text'>la clave debe ser igual</strong>");
                array_push($msj, $m);
            }
        } else {
            $m = array('msjw' => "<strong class='black-text'>el usuario debe tener clave</strong>");
            array_push($msj, $m);
        }
        if ($email != "") {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el correo</strong>");
            array_push($msj, $m);
        }
        if ($rol != 0) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el rol</strong>");
            array_push($msj, $m);
        }
        if ($genero != 0) {
        } else {
            $m = array('msjw' => "<strong class='black-text'>Falta el genero</strong>");
            array_push($msj, $m);
        }

        //consulta base de datos validar existencia
        if ($msj == null) {
            if ($this->modelo->agregar_usuario($rut, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $nombre_usuario, md5($password), $email, $rol, $genero)) {
                $m = array('msjs' => "<strong class='black-text'>Guardado!</strong>");
                array_push($msj, $m);
            } else {
                $m = array('msje' => "<strong class='black-text'>No se puede completar el ingreso del usuario</strong>");
                array_push($msj, $m);
            }
        }
        //Finalmente Guardado de informacion o mensajes de error!
        if ($msj == null) {
            $m = array('msjs' => "<strong class='black-text'>$rut Ingresado Correctamente!</strong>");
            array_push($msj, $m);
        } else {
            $m = array('msje' => "<strong class='black-text'>No se puede completar el ingreso del usuario</strong>");
            array_push($msj, $m);
        }

        //Respuesta Ajax
        echo json_encode($msj);
    }
    //funciones de carro de compras!
    function catalogo()
    {
        $data['producto'] = $this->modelo->productList()->result();
        $this->load->view('catalogo/catalogo', $data);
    }

    /**
     * Funcion que ingresa productos al carrito
     * @param Object producto
     * @return void
     */
    public function addProductCart()
    {
        //inicio mensajes:
        $msj = array();
        $m = array();
        //se obtiene el id del producto desde el js
        $idproducto = $this->input->post('idproducto');
        //se busca el producto mediante el id
        $producto['producto'] = $this->modelo->getProduct($idproducto)->result();
        //default se agrega solo un producto a la vez
        $cantidad = 1;
        //se crea un arreglo para pasar al carrito
        $info = $producto['producto'][0];
        $data = [
            'id' => $info->id,
            'qty' => $cantidad,
            'price' => $info->price,
            'name' => $info->name
        ];
        //se agrega el producto al carrito
        if($this->cart->insert($data)){
            $m = array('msjs' => "<strong class='black-text'>Se agrego tu producto al carro</strong>");
            array_push($msj, $m);
        }else{
            $m = array('msje' => "<strong class='black-text'>No fue posible producto agregar el producto.</strong>");
            array_push($msj, $m);
        }

        


        echo json_encode($msj);
    }

    public function verCarrito()
    {
        //se envia la informacion de los productos para en la vista poder mostrar las fotos
        $productos['producto'] = $this->modelo->productList()->result();
        //se muestra la vista con el contenido del carrito
        $this->load->view('catalogo/listacarro', $productos);
    }

    function conteoCart()
    {
        $this->load->view('conteoCart');
    }

    public function cancelCart()
    {
        //se elimina el carrito
        $this->cart->destroy();
        //se retorna al bazar
        $this->charger();
    }

    /**
     * Funcion que retorna el total del carrito
     * @param void
     * @return int total
     */
    public function getTotalCart()
    {
        return $this->cart->total();
    }

    /**
     * Funcion que retorna el contenido del carrito
     * @param void
     * @return Array contents
     */
    public function getContentCart()
    {
        return $this->cart->contents();
    }

    /**
     * Funcion que destruye el carrito
     * @param void
     * @return resultado
     */
    public function cancelar_pedido()
    {
        return $this->cart->destroy();
    }

    function realizar_pedido()
    {
        //inicio mensajes:
        $msj = array();
        $m = array();

        $contenido = $this->cart->contents();

        if ($contenido != null) {
            foreach ($contenido as $fila) :
                $data = array(
                    'codigo' => $fila['rowid'],
                    'idproducto' => $fila['id'],
                    'cantidad' => $fila['qty'],
                    'total' => $fila['subtotal']
                );
            endforeach;

            if ($this->session->userdata('logged')) {
                //no se permite comprar con usuario sistema.
            } else {
                $m = array('msjs' => "<strong class='black-text'>primero se deben llenar los datos del pedido!</strong>");
                array_push($msj, $m);
            }
        }

        //Respuesta Ajax
        echo json_encode($msj);
    }
    function datos_pedido()
    {
        $data['producto'] = $this->modelo->productList()->result();
        $this->load->view('catalogo/datos_pedido', $data);
    }
    function generar_solicitud()
    {
        //inicio mensajes:
        $msj = array();
        $m = array();

        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $direccion = $this->input->post('direccion');
        $correo = $this->input->post('correo');
        $celular = $this->input->post('celular');
        $codigo = "";

        if($nombre != null && $apellido && $direccion != null && $correo != null && $celular != null){
            $estadomodelo = $this->modelo->estado('ingresado')->result();

            foreach ($estadomodelo as $fila) :
                $estado = $fila->id;
            endforeach;
    
            $contenido = $this->cart->contents();
    
            $id_carro = $this->modelo->pedido_up($nombre, $apellido, $direccion, $correo, $celular, $estado);
    
            foreach ($contenido as $fila) :
                $id_producto = $fila['id'];
                $cantidad = $fila['qty'];
                $subtotal = $fila['subtotal'];
                $codigo = $fila['rowid'];
                $this->modelo->detalle_pedido_up($id_producto, $id_carro, $cantidad, $subtotal, $codigo);
            endforeach;
    
            $data = array(
                'codigo' => $id_carro,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo
            );
            $this->session->set_userdata($data);
        }else{
            $m = array('msjs' => "<strong class='black-text'>primero se deben llenar los datos del pedido!</strong>");
            array_push($msj, $m);
        }
 

        //Respuesta Ajax
        echo json_encode($msj);
    }

    function vista_codigo()
    {
        $data['codigo'] = $this->session->userdata('codigo');
        $data['nombre'] = $this->session->userdata('nombre');
        $data['apellido'] = $this->session->userdata('apellido');
        $data['correo'] = $this->session->userdata('correo');
        $this->session->sess_destroy();
        $this->load->view('catalogo/vista_codigo', $data);
    }

    function pedidos()
    {
        $data['carro'] = $this->modelo->pedidos()->result();
        $data['detalle'] = $this->modelo->detalle_pedido(null)->result();
        $data['producto'] = $this->modelo->productos()->result();
        $data['estado'] = $this->modelo->estados()->result();
        $this->load->view('administrator/pedido/pedidos', $data);
    }

    function revisar_pedido()
    {
        $this->load->view('catalogo/revisar_pedido');
    }

    function verificar()
    {
        $codigo = $this->input->post('codigo');

        $data['carro'] = $this->modelo->verificar($codigo)->result();
        $data['detalle'] = $this->modelo->detalle_pedido($codigo)->result();
        $data['producto'] = $this->modelo->productos()->result();
        $data['estado'] = $this->modelo->estados()->result();

        $this->load->view('catalogo/resultado', $data);
    }
    //valida que los camposs no esten vacios y que no sean menores de 3 caracteres
    function nullcheck($field)
    {
        //compruebo que el tamaño del string sea válido. 
        if (strlen($field) < 3 || strlen($field) > 200) {
            return false;
        }
        //comprueba que los caracteres sean los permitidos 
        $permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ0123456789-_ @.,:;'¿?#";
        for ($i = 0; $i < strlen($field); $i++) {
            if (strpos($permitidos, substr($field, $i, 1)) === false) {
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

    public function validate_rut($rut)
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
        if ($dvr == 11) {
            $dvr = 0;
        }
        if ($dvr == 10) {
            $dvr = 'K';
        }
        if ($dvr == strtoupper($dv)) {
            return true;
        } else {
            return false;
        }
    }
}
