<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Targets extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
	}

	function index()
	{
		$this->data['title'] = "Targets";
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['energies']   = $this->home_model->get_energies(); //para el combo box

		$this->data['main_content'] = 'targets_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "Targets";
		
		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$energy      = $this->input->post('dropdown_energy');
		
		$this->data['mirna_name']	= $mirna_name;
		$this->data['targets']	    = $this->home_model->get_targets($mirna_name,$min_species,$mismatch,$energy);
		
		$this->data['main_content'] = 'targets_result_view';
		$this->load->view('temp/template', $this->data);
	}
	
	function view_alignment($mirna_name,$similar1)
	{
		//~ if(!$mirna_name or !$similar1){
			//~ echo "AAAAAAAA";
			//~ return;
		//~ }
		
		$this->data['title'] = "Targets";
		//~ ,$mismatch,$energy
		$this->data['alignments']	= $this->home_model->get_alginment($mirna_name,$similar1);

		$this->data['main_content'] = 'alginments_result_view';
		$this->load->view('temp/template', $this->data);
	}
	
}
