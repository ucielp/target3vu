<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bygeneid extends CI_Controller {

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
		
		$this->data['title'] = "Potential miRNA target";
		$this->data['subtitle'] = "Is this gene a potential target?";
		
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['plants']   = $this->home_model->get_plants(); //para el combo box


		$this->data['main_content'] = 'bygeneid_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "Potential miRNA target";
		
		$this->output->enable_profiler(PROFILING_CONST);

		$locus_tag  =  $this->input->post('input_tag');
		$mismatch    = $this->input->post('mismatch_targets');
		$input_mfe 	 = $this->input->post('input_mfe');
		$species     = $this->input->post('multiselect_species');
		
		if (strlen($locus_tag) < 1){
			redirect('bygeneid/index/1');			
		}
		
		if ($mismatch){
			$this->data['mismatch'] = 1;
		}
		else{
			$this->data['mismatch'] = 0;
		}

		$this->data['species'] = $species;


		$mirnas_list =  $this->home_model->get_microRNAs_list();
		
		$results_is_not_empty = 0;
		
		foreach ($mirnas_list as $miR){
			$miR_name     = $miR->table_reference;
			$mfe = $this->home_model->get_energy_by_perc($input_mfe,$miR_name);
			#Esta query es como la de whereis pero no tiene min de especies
			$query = $this->home_model->get_targets_by_gene_id($locus_tag,$miR_name,$mismatch,$mfe,$species);
			if ($query->num_rows() > 0 ) {
				$results_is_not_empty = 1;
			}
			$this->data['targets'][$miR_name] = $query->result();
			$this->data['energy'][$miR_name] = $mfe;
			$this->data['short_name'][$miR_name] = $miR->name;
		}
		
		if($results_is_not_empty){
			$this->data['main_content'] = 'bygeneid_result_view';
			$this->load->view('temp/template', $this->data);
		}
		else
		{	
			$this->data['msg'] = "This gene is not a potential target with the selected input parameters.";
			$this->data['main_content'] = 'error_message';
			$this->load->view('temp/template', $this->data);
		}

	}
	
		


}
