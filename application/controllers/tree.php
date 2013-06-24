<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends CI_Controller {

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
		$this->data['title'] = "Tree";
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['main_content'] = 'tree_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "Targets";
		
		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$input_mfe 	 = $this->input->post('input_mfe');
		$species     = $this->input->post('multiselect_species');

		
		$this->data['mirna_name']	= $mirna_name;
		$this->data['targets']	    = $this->home_model->get_targets($mirna_name,$min_species,$mismatch,$input_mfe,$species);


		
		$this->data['main_content'] = 'tree_result_view';
		$this->load->view('temp/template', $this->data);
	}

}
