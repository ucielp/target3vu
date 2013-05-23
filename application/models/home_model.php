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
		$val = array("70PE","72PE","76PE");
		foreach(unserialize(PE) as $perf_en){
			$k = $perf_en;
			$combo[$k]= $perf_en;
		}

		//~ $k = PE;
		//~ $combo[$k]= PE;
		for($i=ENERGY_FROM;$i<=ENERGY_TO;$i++){
				$combo[-$i]= -$i;	
		}
		return $combo;
	}
		
	function get_targets($mirna_name,$min_species,$mismatch,$energy){
		
		$new_energy = $this->get_energy_by_perc($energy,$mirna_name);
		
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select(SIMILAR_field . ', count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  short_description, ' . FAMILY_field);
		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		
		### Esto no hace falta porque family esta dentro de MIRNA_...
		### TODO: puedo sacarlo de mirna y hacer el join
		### $this->db->join('families f', 'f.locus_id = ' . SIMILAR_field ,'left');

		$this->db->where(SIMILAR_field . ' !=', '');
		$this->db->where('deltag <=', $new_energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		
		### TODO: GU Esto no va a andar para las db viejas!
		$this->db->where(GU_RULE);

		$this->db->group_by(SIMILAR_field);


		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		
		
		//~ echo $this->db->last_query() . "<br>";
		return $query->result();

		# Esto si quiero armar la tabla directamente
		//~ $plantilla = $this->generate_plantilla('2');
		//~ $this->table->set_template($plantilla);
		//~ $this->table->set_heading('Tag', 'Count','Species', 'Description' , 'Family' );
		//~ return $this->table->generate($query);
	}
	
	//~ function get_species_from_target($mirna_name,$filtro_mm,$new_energy,$similar){
			//~ 
		//~ $this->db->select('distinct(file),align,id,gen,target,deltag,file');
		//~ $this->db->from($mirna_name);
		//~ $this->db->where(SIMILAR_field, $similar);
		//~ $this->db->where('deltag <=', $new_energy);
		//~ $this->db->where('filtro_mm >=',$filtro_mm);
		//~ ### TODO: GU Esto no va a andar para las db viejas!
		//~ $where = "((mm<4) OR (mm=4 AND  gu>0))";
		//~ $this->db->where($where);
		//~ $this->db->order_by('file','desc');
		//~ $this->db->order_by('file','deltag');	
		//~ 
		//~ $query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";
        //~ $res = $query->result_array();
        //~ return $res;	
		//~ 
	//~ }
	
	function get_alginment($mirna_name,$similar,$mm,$energy){
		
		# my $query = "select file,gen,target,align,mirna,deltag,filtro_mm from $file where " . SIMILAR_field . " = '$similar' 
		# group by file,target order by target";
		$this->db->select('file,gen,target,align,mirna,deltag,filtro_mm');
		$this->db->from($mirna_name);
		$this->db->where(SIMILAR_field, $similar);
		
		### TODO: GU Esto no va a andar para las db viejas!
		$this->db->where(GU_RULE);

		# Esto es si quiero mostrar solamente los que pasan el filtro
		//~ $this->db->where('filtro_mm >=', $mm);
		//~ $this->db->where('deltag <=', $energy);

		## TODO: Ver si pongo el group by porque estoy ocultando targets
		# POdria mostrar uno y al poner el mouse arriba ver el resto
		$this->db->group_by('file,target');
		
		//~ $this->db->where('deltag <=', $new_energy);
		//~ $this->db->where('filtro_mm >=',$filtro_mm);
		//~ $this->db->order_by('file','desc');
		//~ $this->db->order_by('file','deltag');	

		$query = $this->db->get();
		return $query->result();
	}	
	
	
	
	
	
	
	function get_targets_by_family($mirna_name,$min_species,$mismatch,$energy){
	
		$new_energy = $this->get_energy_by_perc($energy,$mirna_name);
		
		if ($mismatch) { $filtro_mm = 1; } else { $filtro_mm = 0; }
		
		$this->db->select('count(distinct file) as contador, 
		GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  
		GROUP_CONCAT(distinct '. SIMILAR_field .'  SEPARATOR " ") as similars,  
		short_description, ' . FAMILY_field);
		
		#TENGO QUE VER SI QUIERO HACER ESTO con el avg de deltag
		//~ $this->db->select('count(distinct file) as contador, 
		//~ GROUP_CONCAT(distinct file ORDER BY file ASC SEPARATOR "'. SPECIES_SEPARATOR .'") as species,  
		//~ GROUP_CONCAT(distinct '. SIMILAR_field.'  SEPARATOR " ") as similars,  
		//~ short_description, ' . FAMILY_field . ', ROUND(AVG(distinct deltag),2) as average_deltag', FALSE);
		$this->db->from($mirna_name);
		$this->db->join(tabDescription . ' d', 'd.locus_tag = ' . SIMILAR_field ,'left');
		$this->db->where(SIMILAR_field . ' !=', '');
		$this->db->where('deltag <=', $new_energy);
		$this->db->where('filtro_mm >=',$filtro_mm);
		$this->db->where(FAMILY_field . ' !=', '');
		
		### TODO: GU Esto no va a andar para las db viejas!
		$this->db->where(GU_RULE);
		
		$this->db->group_by(FAMILY_field);
		$this->db->having('contador >=', $min_species); 
		$this->db->order_by('contador','desc');
		$query = $this->db->get();		

		//~ echo $this->db->last_query() . "<br>";
		
		return $query->result();
	}
	
	function get_similar_by_family($mirna_name,$family){
		
		$this->db->select(SIMILAR_field. ',file,gen,target,align,mirna,deltag,filtro_mm');
		$this->db->from($mirna_name);
		$this->db->where(FAMILY_field, $family);
		
		
		### TODO: GU Esto no va a andar para las db viejas!
		$this->db->where(GU_RULE);
		
		$this->db->group_by('file,target');
		$this->db->order_by(SIMILAR_field,'desc');
		
		

		//~ $this->db->where_in(SIMILAR_field,$similars);
		//~ $this->db->where('deltag <=', $new_energy);
		//~ $this->db->where('filtro_mm >=',$filtro_mm);
		//~ $this->db->order_by('file','desc');
		//~ $this->db->order_by('file','deltag');	

		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";

		return $query->result();
	}
	
	function get_energy_by_perc($energy,$mirna_name){
		
		
		# Chequeo que sea un numero o tenga un menos
		if (!preg_match('/^[0-9.-]+$/', $energy)){
			$this->db->select('hyb_perf');
			$this->db->from(tabEnergy);
			$this->db->where('table_reference',$mirna_name);
			
			$query = $this->db->get();
			foreach ($query->result() as $row){
				$new_energy = ($row->hyb_perf)*$energy/100;
			}
		}
		
		else
		{
				$new_energy = $energy;
		}

		return $new_energy;
	}
	
	#obsolete
	
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
}
