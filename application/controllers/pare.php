<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pare extends CI_Controller {

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
		$this->data['title'] = "Pare";
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['main_content'] = 'pare_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "Pare";
		
		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$input_mfe 	 = $this->input->post('input_mfe');
		$species     = $this->input->post('multiselect_species');

		$mfe = $this->home_model->get_energy_by_perc($input_mfe,$mirna_name);		

		$this->data['mirna_name']	= $mirna_name;
		$this->data['targets']  = $this->home_model->get_targets_by_pare($mirna_name);

		$this->data['main_content'] = 'pare_result_view';
		$this->load->view('temp/template', $this->data);
	}
	
	function view_alignment($mirna_name,$similar)
	{
		$this->data['mirna_name']	= $mirna_name;
			
		$this->data['title'] = "Pare";
		$this->data['alignments']	= $this->home_model->get_alginment_pare_in($mirna_name,$similar);

		$this->data['similar']	    = $similar;

		$this->data['main_content'] = 'alginments_result_pare_view';
		$this->load->view('temp/template', $this->data);
	}
}
