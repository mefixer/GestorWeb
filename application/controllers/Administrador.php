<?php

use CodeIgniter\CLI\Console;
use PHPUnit\Util\Printer;

defined('BASEPATH') or exit('No direct script access allowed');

class Administrador extends CI_controller
{
        //carga librerias para trabajar
        function __construct()
        {
            parent::__construct();
            $this->load->model("modelo");
            $this->load->helper(array('url', 'form'));
            $this->load->library('session');
        }
        //división de pagina
        public function index()
        {
            //NAVBAR
            $this->load->view('head');
            //Container
            $this->load->view('log');
            //Footer
            $this->load->view('footer');
        }

}
