<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->view('cuerpo');
		$this->load->view('footer');
	}

	function cargador(){
		$this->load->view('login');
	}
	function carga_Alumno(){
		$this->load->view('alumno/home-alumno');
	}
	function carga_Coordinador(){
		$this->load->view('coordinador/home-coordinador');
	}
	function carga_Docente(){
		$this->load->view('docente/home-docente');
	}
	function progress_load(){
		$this->load->view('docente/progress');
	}
	function student_load(){
		$this->load->view('docente/students');
	}
}
