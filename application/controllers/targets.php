<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Targets extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index()
	{
		$this->data['title'] = "Targets";
		
		$this->data['microRNAs'] = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['energies'] = $this->home_model->get_energies(); //para el combo box

		$this->data['main_content'] = 'targets_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "Targets";
		
		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$species_num = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$energy      = $this->input->post('dropdown_energy');
		
		echo $mirna_name . "<br>";
		echo $species_num . "<br>";
		echo $mismatch . "<br>";
		echo $energy . "<br>";
		
		$this->data['main_content'] = 'targets_result_view';
		$this->load->view('temp/template', $this->data);
	}


}
