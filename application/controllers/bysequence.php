<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bysequence extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->helper('text');

	}

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('sequence', 'Sequence', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//~ $this->form_validation->set_rules('tel', 'Teléfono', 'required');
		//~ $this->form_validation->set_rules('asunto', 'Asunto', 'required');

		if ($this->form_validation->run() == FALSE)
		{
            $this->data['main_content'] = 'myform';
		}
		else
		{
            $this->data['main_content'] = 'formsuccess';
		}

       $this->load->view('temp/template_home', $this->data);

	}
         
    function success()
    {
        
        $name  = $this->input->post('name');
		$email = $this->input->post('email');
		$user_country    = $this->input->post('user_country');
		$sequence     = $this->input->post('sequence');
        $ip = $this->input->ip_address();
        $user_agent = $this->input->user_agent();
        
        if($mirna_name = $this->home_model->is_a_conserved_mirna($sequence)){
            $this->data['mirna_name'] = $mirna_name;
             
            $this->data['main_content'] = 'formsuccess_conserved_mirna';
            $this->load->view('temp/template_home', $this->data);

        }
        else{
            $this->data['main_content'] = 'formsuccess';

            $job = 'perl patmatch   _cluster.pl ';
            $params = $sequence . ' ' . $name;
            $exec = $job . $params;
        
            //~ echo $exec;
            exec($exec,$output);
            
            # Es un array de resultados
            //~ echo $output[5];
            $this->load->view('temp/template_home', $this->data);
        
        }
        
        
    }

}

		
