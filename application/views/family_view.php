 
 
  <?php echo form_open_multipart("family/search");?>


<div id='content'>
<div id="home">
<table id = 'home_target'>
<tr>
	<td > 
	<b><br>microRNAs</b> <br><br>
      <?php echo form_dropdown('dropdown_microRNAs', $microRNAs);?>
	</td>
    
    <td > 
	<b><br>Species (min)</b> <br><br>
      <?php echo form_dropdown('dropdown_num_species', $nroSpecies, 3);?>
	</td>
</tr>
<td><br><br>
	 <b> Mismatch<?php echo form_checkbox('mismatch_targets', 'accept', TRUE);?></b>
     <br><br>
      <b>MFE:  <?php echo form_dropdown('dropdown_energy', $energies, DEFAULT_PE);?> </b>
	
</td><td>  
	<p><small><b><big>
			<input type="image" src="css/button_search.gif" value="START" type="submit">
	</big></b> </small></p>

</td></tr>

<tr>

	<?php 
	$options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );
	?>
	<td colspan = 2 >
	<?php 

	echo form_multiselect('multiselect_species[]', $plants,'','id = species_mult'); 
?>

	</td>
</span>
</table>

<script>
$('#species_mult').multiSelect();
</script>



