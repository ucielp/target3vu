 
 
  <?php echo form_open_multipart("targets/search");?>


<div id='content'>
<span class="class1">
<table>

<tr>
	<td > 
	<b><br>microRNAs</b> <br><br>
      <?php echo form_dropdown('dropdown_microRNAs', $microRNAs);?>
	</td>
    
    <td > 
	<b><br>Species (min)</b> <br><br>
      <?php echo form_dropdown('dropdown_num_species', $nroSpecies);?>
	</td>
</tr>
<td><b>Filters<br><br></b> 
	 <b> Mismatch<?php echo form_checkbox('mismatch_targets', 'accept', TRUE);?></b>
     <br><br>
      <b>MFE:  <?php echo form_dropdown('dropdown_energy', $energies);?> </b>
	
</td><td>  
	<p><small><b><big>
	<!--
			<input type="image" src="i/button_search.gif" value="START" type="submit">
	-->
             <p><?php echo form_submit('submit', 'Search');?></p>
	</big></b> </small></p>

</td></tr>
</span>
</table>


