<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Whereis extends CI_Controller {

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
		$this->data['title'] = "whereis";
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['main_content'] = 'whereis_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "whereis";
		
		$locus_tag  =  $this->input->post('input_tag');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$input_mfe 	 = $this->input->post('input_mfe');
		$species     = $this->input->post('multiselect_species');
		
		if (!preg_match('/^(AT|at|At|aT)[0-9.]+/', $locus_tag)){
			print "no es un ATG valido";
			redirect('whereis');
		}

		
		if ($mismatch){
			$this->data['mismatch'] = 1;
		}
		else{
			$this->data['mismatch'] = 0;
		}

		$this->data['species'] = $species;


		$mirnas_list =  $this->home_model->get_microRNAs_list();
		
		foreach ($mirnas_list as $miR){
			$miR_name     = $miR->table_reference;
			$mfe = $this->home_model->get_energy_by_perc($input_mfe,$miR_name);		
			$query = $this->home_model->get_targets_by_locus_id($locus_tag,$miR_name, $mfe,$min_species,$mismatch,$input_mfe,$species);
			$this->data['targets'][$miR_name] = $query->result();
			$this->data['energy'][$miR_name] = $mfe;
		}
		
		$this->data['main_content'] = 'whereis_result_view';
		$this->load->view('temp/template', $this->data);
	}

}
