<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	public function index()
	{
		#redirect('inscripcion', 'refresh');
		$this->data['title'] = "Titulo";
		$this->data['prueba'] = $this->home_model->get_algo();
		$this->data['main_content'] = 'home_view';

		$this->load->view('temp/template', $this->data);
	}
}

