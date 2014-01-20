<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Targets extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->helper('text');
		$this->load->helper('csv');


	}

	function index($selected_mirna = NULL)
	{
		$this->data['title'] = "Targets";
		$this->data['subtitle'] = "Find conserved microRNAs targets";

		$this->data['microRNAs']  = $this->home_model->get_microRNAs(); //para el combo box
		$this->data['nroSpecies'] = $this->home_model->get_nro_species(); //para el combo box

		$this->data['selected_mirna'] = $selected_mirna;
        
		$this->data['main_content'] = 'targets_view';
		$this->load->view('temp/template', $this->data);
	}

	function search()
	{
		$this->data['title'] = "Targets";
		$this->output->enable_profiler(PROFILING_CONST);

		$mirna_name  = $this->input->post('dropdown_microRNAs');
		$min_species = $this->input->post('dropdown_num_species');
		$mismatch    = $this->input->post('mismatch_targets');
		$species     = $this->input->post('multiselect_species');
		$input_mfe 	 = $this->input->post('input_mfe');
		
		if (empty($mirna_name)){
			redirect('targets');			
		}
		
		$this->data['mirna_name']	= $mirna_name;

		
		if ((sizeof($species) < $min_species) and !empty($species)){

			$this->data['species'] = "";
			$this->data['msg'] = "Failed to execute search request. You need to select at least $min_species species.";
			$this->data['main_content'] = 'error_message';
			$this->load->view('temp/template', $this->data);
		}
		
		else{

			$mfe = $this->home_model->get_energy_by_perc($input_mfe,$mirna_name);		

			//~ $not_in_species = $this->home_model->not_in_species($species);
			$this->data['min_species']	= $min_species;
			$this->data['energy'] = $mfe;
			$this->data['species'] = $species;

			if ($mismatch){
				$this->data['mismatch'] = 1;
			}
			else{
				$this->data['mismatch'] = 0;
			}
			
			
			$query = $this->home_model->get_targets($mirna_name,$min_species,$mismatch,$mfe,$species);
			
			if ($query->num_rows() > 0 ) {
				$this->data['targets'] = $query->result();
				#si quiero guardar los datos en csv
				//~ query_to_csv($query, TRUE, 'toto.csv');
				$this->data['main_content'] = 'targets_result_view';
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
	
	function view_alignment($mirna_name,$similar,$mm,$energy,$sp,$title_var)
	{
		
		$this->data['title'] = $title_var;

		$this->output->enable_profiler(PROFILING_CONST);
		
		$species = unserialize(base64_decode($sp));
		
		$this->data['mirna_name']	= $mirna_name;
		$this->data['mismatch'] = $mm;

		#No tengo especies, por lo tanto hago la busqueda en todos
		$empty_sp = 0;
		#Quiero las que estan dentro de esas especies
		$in_sp = 1;
		#Quiero las que NO estan dentro de esas especies
		$not_in_sp = 2;
		
		
		if (empty($species)){
				$this->data['alignments']	= $this->home_model->get_alignment_in($mirna_name,$similar,$mm,$energy,$species,$empty_sp);
				$this->data['alignments_not_in']	= "";

		}
		else{
			$this->data['alignments']	= $this->home_model->get_alignment_in($mirna_name,$similar,$mm,$energy,$species,$in_sp);
			$this->data['alignments_not_in']	= $this->home_model->get_alignment_in($mirna_name,$similar,$mm,$energy,$species,$not_in_sp);
		}
		$this->data['mismatch_filter']	= $mm;
		$this->data['energy']	    = $energy;
		$this->data['similar']	    = $similar;

		$this->data['main_content'] = 'alginments_result_view';
		$this->load->view('temp/template', $this->data);
	}
	
	function mirna_list(){
		
		$this->output->enable_profiler(PROFILING_CONST);
		$this->data['mirnas_list']	 =  $this->home_model->get_microRNAs_list();
		$this->data['title'] = 'List of conserved miRNAs from Angiosperms';

		$this->data['main_content'] = 'list_of_mirnas_view';
		$this->load->view('temp/template', $this->data);
		
	}
}
