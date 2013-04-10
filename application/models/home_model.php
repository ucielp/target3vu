<?php 

class Home_model extends CI_Model{

	function __construct()

	{
		parent::__construct();
	}
	
	function get_algo(){
		$this->db->from('description');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_microRNAs(){
		$this->db->select('id, name');	
		$this->db->from('mirnas');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		return $combo;
	}
	
	function get_nro_species(){
		for($i=MIN_SPECIES;$i<=MAX_SPECIES;$i++){
			$combo[$i]=$i;	
			}
		return $combo;
	}	
	
	function get_energies(){
		$k = 0;
		$combo[$k]= '72PE';
		$k++;
		$combo[$k] = 'No filter';
		$k++;
		for($i=ENERGY_FROM;$i<=ENERGY_TO;$i++){
				$combo[$k]= -$i;	
				$k++;
		}
		return $combo;
		}	
}
		
