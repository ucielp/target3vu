<?php 

class Home_model extends CI_Model{

	function __construct()

	{
		parent::__construct();
	}
		
	function get_microRNAs(){
		$this->db->select('name, table_reference');	
		$this->db->from('mirnas');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['table_reference']] = $row['name'];	
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
		$combo[$k] = 'No filter';
		$k = PE;
		$combo[$k]= PE;
		for($i=ENERGY_FROM;$i<=ENERGY_TO;$i++){
				$combo[-$i]= -$i;	
		}
		return $combo;
	}
		
	function get_targets($mirna_name,$min_species,$mismatch,$energy){
		$new_energy = 0;
		# saco la energía
		if ($energy == PE){
			$this->db->select('hyb_perf');
			$this->db->from(tabEnergy);
			$this->db->where('table_reference',$mirna_name);
			
			$query = $this->db->get();
			foreach ($query->result() as $row){
				$new_energy = ($row->hyb_perf)*PE_VAL/100;
			}
		}
		
		else
		{
				$new_energy = $energy;
		}
		
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select('similar1, count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, family');
		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = similar1','left');
		
		### Esto no hace falta porque family esta dentro de MIRNA_...
		### TODO: puedo sacarlo de mirna y hacer el join
		### $this->db->join('families f', 'f.locus_id = similar1','left');

		$this->db->where('similar1 !=', '');
		$this->db->where('deltag <=', $new_energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		$this->db->group_by('similar1');
		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		
		
		//~ echo $this->db->last_query() . "<br>";
		return $query->result();
		//~ 
		# Esto si quiero armar la tabla directamente
		//~ $plantilla = $this->generate_plantilla('2');
		//~ $this->table->set_template($plantilla);
		//~ $this->table->set_heading('Tag', 'Count','Species', 'Description' , 'Family' );
		//~ return $this->table->generate($query);
	}
	
	function get_species_from_target($mirna_name,$filtro_mm,$new_energy,$similar1){
			
		$this->db->select('distinct(file),align,id,gen,target,deltag,file');
		$this->db->from($mirna_name);
		$this->db->where('similar1', $similar1);
		$this->db->where('deltag <=', $new_energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		$this->db->order_by('file','desc');
		$this->db->order_by('file','deltag');	
		
		$query = $this->db->get();
        $res = $query->result_array();
        return $res;	
		
	}
	
	function get_alginment($mirna_name,$similar1){
		
		# my $query = "select file,gen,target,align,mirna,deltag,filtro_mm from $file where similar1 = '$similar1' 
		# group by file,target order by target";
		$this->db->select('file,gen,target,align,mirna,deltag,filtro_mm');
		$this->db->from($mirna_name);
		$this->db->where('similar1', $similar1);
		## TODO: Ver si pongo el group by porque estoy ocultando targets
		# POdria mostrar uno y al poner el mouse arriba ver el resto
		$this->db->group_by('file,target');
		
		//~ $this->db->where('deltag <=', $new_energy);
		//~ $this->db->where('filtro_mm >=',$filtro_mm);
		//~ $this->db->order_by('file','desc');
		//~ $this->db->order_by('file','deltag');	

		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";
		return $query->result();
	}	
	
	function generate_plantilla($nro){
		
		if ($nro == 1){
			$plantilla = array ( 'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
		}
		elseif ($nro == 2){
			$plantilla = array (
			
				'table_open' => '<table border="1" cellpadding="4" cellspacing="0">',
				'heading_row_start' => '<tr>',
				'heading_row_end' => '</tr>',
				'heading_cell_start' => '<th>',
				'heading_cell_end'=> '</th>',
				
				'row_start' => '<tr>',
				'row_end' => '</tr>',
				'cell_start' => '<td>',
				'cell_end' => '</td>',
				
				'row_alt_start' => '<tr>',
				'row_alt_end' => '</tr>',
				'cell_alt_start' => '<td>',
				'cell_alt_end' => '</td>',
				'table_close' => '</table>'
			);
		}
		
		return $plantilla;
	}
	
	function get_targets_by_family($mirna_name,$min_species,$mismatch,$energy){
		$new_energy = 0;
		# saco la energía
		if ($energy == PE){
			$this->db->select('hyb_perf');
			$this->db->from(tabEnergy);
			$this->db->where('table_reference',$mirna_name);
			
			$query = $this->db->get();
			foreach ($query->result() as $row){
				$new_energy = ($row->hyb_perf)*PE_VAL/100;
			}
		}
		
		else
		{
				$new_energy = $energy;
		}
		
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select('count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  
		GROUP_CONCAT(distinct similar1  SEPARATOR " ") as similar1,  
		short_description, family');
		
		#TENGO QUE VER SI QUIERO HACER ESTO con el avg de deltag
		//~ $this->db->select('count(distinct file) as contador, 
		//~ GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  
		//~ GROUP_CONCAT(distinct similar1  SEPARATOR " ") as similar1,  
		//~ short_description, family, ROUND(AVG(distinct deltag),2) as average_deltag', FALSE);
		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = similar1','left');
		$this->db->where('similar1 !=', '');
		$this->db->where('deltag <=', $new_energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		$this->db->where('family !=', '');
		$this->db->group_by('family');
		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		
		
		
		return $query->result();
	}
}
		
