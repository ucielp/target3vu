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
		$this->data['plants']   = $this->home_model->get_plants(); //para el combo box


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
		$species     = $this->input->post('multiselect_species');
		
		
		$this->data['mirna_name']	= $mirna_name;
		$this->data['targets']	    = $this->home_model->get_targets_by_family($mirna_name,$min_species,$mismatch,$energy,$species);
		$this->data['species'] = $species;

		if ($mismatch){
			$this->data['mismatch'] = 1;
		}
		else{
			$this->data['mismatch'] = 0;
		}
		$this->data['energy']	    = $this->home_model->get_energy_by_perc($energy,$mirna_name);
		
		$this->data['main_content'] = 'family_result_view';
		$this->load->view('temp/template', $this->data);
	}
	
	function show_tags($mirna_name,$family,$mm,$energy,$sp)
	{
		$this->data['title'] = "Family";
		$family = str_replace(unserialize(REPLACE_B) , unserialize(REPLACE_A), $family);
		$species = unserialize(base64_decode($sp));

		$this->data['family_targets']	= $this->home_model->get_similar_by_family($mirna_name,$family,$species);
		
		$this->data['mismatch_filter']	= $mm;
		$this->data['energy']	    	= $energy;
		
		$this->data['main_content'] = 'family_targets_view';
		$this->load->view('temp/template', $this->data);
		
	}
	
}
