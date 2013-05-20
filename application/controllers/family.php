<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Controller {

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
		$this->data['title'] = "Family";
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['energies']   = $this->home_model->get_energies(); //para el combo box

		$this->data['main_content'] = 'family_view';
		$this->load->view('temp/template', $this->data);
	}
	
	function search()
	{
		$this->data['title'] = "Family";
		
		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$energy      = $this->input->post('dropdown_energy');
		$this->data['mirna_name']	= $mirna_name;
		$this->data['targets']	    = $this->home_model->get_targets_by_family($mirna_name,$min_species,$mismatch,$energy);
		
		$this->data['main_content'] = 'family_result_view';
		$this->load->view('temp/template', $this->data);
	}
	
}
