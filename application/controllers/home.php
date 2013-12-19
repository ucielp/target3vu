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
        $this->data['title'] = "Home";
		$this->data['subtitle'] = "Subtitle";

		$this->data['main_content'] = 'home_view';
		$this->load->view('temp/template_home', $this->data);
        
	}
}

