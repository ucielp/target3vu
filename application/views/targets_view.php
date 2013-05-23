 
 
  <?php echo form_open_multipart("targets/search");?>


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
</span>
</table>


<select id='optgroup' multiple='multiple'>
  <optgroup label='Friends'>
    <option value='1'>Yoda</option>
    <option value='2'>Obiwan</option>
  </optgroup>
  <optgroup label='Enemies'>
    <option value='3'>Palpatine</option>
    <option value='4'>Darth Vader</option>
  </optgroup>
</select>




<script type="text/javascript" language="javascript">// 
$('#optgroup').multiSelect({ selectableOptgroup: true });
</script>
