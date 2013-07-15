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
		$this->data['subtitle'] = "Find conserved microRNAs target families";
		
		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box
		$this->data['plants']   = $this->home_model->get_plants(); //para el combo box


		$this->data['main_content'] = 'family_view';
		$this->load->view('temp/template', $this->data);
	}
	
	function search()
	{
		$this->data['title'] = "Family";
		$this->output->enable_profiler(PROFILING_CONST);

		
		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$species     = $this->input->post('multiselect_species');
		$input_mfe 	 = $this->input->post('input_mfe');

		
		$this->data['mirna_name']	= $mirna_name;
		$this->data['species'] = $species;
		$this->data['min_species']	= $min_species;

		if ((sizeof($species) < $min_species) and !empty($species)){
			
			$this->data['msg'] = "Failed to execute search request. You need to select at least $min_species species.";
			$this->data['main_content'] = 'error_message';
			$this->load->view('temp/template', $this->data);
		}
		
		else{
			$mfe = $this->home_model->get_energy_by_perc($input_mfe,$mirna_name);		

			if ($mismatch){
				$this->data['mismatch'] = 1;
			}
			else{
				$this->data['mismatch'] = 0;
			}

			$this->data['targets']	    = $this->home_model->get_targets_by_family($mirna_name,$min_species,$mismatch,$mfe,$species);
				
			if (!empty($this->data['targets'])) {
				$this->data['energy']	    = $mfe;
				$this->data['main_content'] = 'family_result_view';
				$this->load->view('temp/template', $this->data);
			}
			else
			{	
				$this->data['msg'] = "No targets found.";
				$this->data['main_content'] = 'error_message';
				$this->load->view('temp/template', $this->data);
			}
		}
	}
	
	function show_tags($mirna_name,$family,$mm,$energy,$sp)
	{
		$this->data['title'] = "Family";
		$this->output->enable_profiler(PROFILING_CONST);
		
		$family = unserialize(base64_decode($family));
		$species = unserialize(base64_decode($sp));
		
		#No tengo especies, por lo tanto hago la busqueda en todos
		$empty_sp = 0;
		#Quiero las que estan dentro de esas especies
		$in_sp = 1;
		#Quiero las que NO estan dentro de esas especies
		$not_in_sp = 2;

		if (empty($species)){
			$this->data['family_targets']	= $this->home_model->get_similar_by_family($mirna_name,$family,$species,$empty_sp);
			$this->data['family_targets_not_in']	= "";
		}
		else{
			$this->data['family_targets']	= $this->home_model->get_similar_by_family($mirna_name,$family,$species,$in_sp);
			$this->data['family_targets_not_in']	= $this->home_model->get_similar_by_family($mirna_name,$family,$species,$not_in_sp);
		}

		
		$this->data['mismatch_filter']	= $mm;
		$this->data['energy']	    	= $energy;
		$this->data['mirna_name']	= $mirna_name;
		$this->data['mismatch'] = $mm;
		
		$this->data['main_content'] = 'family_targets_view';
		$this->load->view('temp/template', $this->data);
		
	}
	
}
