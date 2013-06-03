 
 
  <?php echo form_open_multipart("targets/search",'id = form_search');?>


<div id='content'>
<div id="home">
<table id = 'home_target' >

<tr>
	<td> 
	<p>microRNA</p>
      <?php echo form_dropdown('dropdown_microRNAs', $microRNAs);?>
	</td>
    
    <td> 
	<p>Species (min)</p>
      <?php echo form_dropdown('dropdown_num_species', $nroSpecies, 3);?>
	</td>
</tr>

<tr>
<td>
	 <p> Mismatch filter<?php echo form_checkbox('mismatch_targets', 'accept', TRUE);?></p>
     <p> Minimum free energy cutoff <br>
     <?php $data = array(
              'name'          => 'input_mfe',
              'value'       => DEFAULT_PE,
              'maxlength'   => '10',
              'size'        => '5',
               'title'      => 'Enter the mfe cutoff value in kcal/mol (ex: -26) or as a percentage of the perfect mfe (PE) between miRNA and target  (ex:72PE)'
            );
			echo form_input($data); 
			?> 
		</p>

</td>
<td>  
	<p><small><b><big>
			<input  class  = "search" value="Search" type="submit">
	</big></b> </small></p>
</td>
</tr>
</table>

  <div class="line-separator"></div>

<a href="#" class="show_hide_options"> Advanced options</a>
		<div class="slidingDiv">
			<p> Select species</p>
			<?php  echo form_multiselect('multiselect_species[]', $plants,'','id = species_mult'); 	?>
		</div>


			
<script>
$('#species_mult').multiSelect();

function getCount(){
		return $("#species_mult :selected").length;
		$("input#input_test").val('blabla');
}
		
</script>

<script>
 
$(document).ready(function(){
	$(".slidingDiv").hide();
	$(".show_hide_options").show();
	$('.show_hide_options').click(function(){
		$(".slidingDiv").slideToggle();
	});
});
 
</script>

<!-- text help  -->
 <script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
  
</head>
<body>

