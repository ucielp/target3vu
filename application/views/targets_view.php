
  <?php echo form_open_multipart("targets/search",'id = form_search');?>

<div id="home">
<h1><?php echo $title?></h1>
<h2><?php echo $subtitle?></h2>
 </div>
</div> <!--End of header_container-->

<table id = 'home_target' >
<tr>
	<td> 
	<p>microRNA
		<a href=<?php echo site_url('targets/mirna_list');?> class="tooltip">[?]<span>
		<img class="callout" src= "<?php echo site_url();?>/css/callout.gif" /><strong><?php echo MIRNA_LIST_TITLE ?><br/></strong><?php echo MIRNA_LIST_MSG?></span></a>

	</p>
	
      <?php echo form_dropdown('dropdown_microRNAs', $microRNAs);?>
	</td>
    
    <td> 
	<p>Species (min)
		<a href='#' class="tooltip">[?]<span>
			<img class="callout" src= "<?php echo site_url();?>/css/callout.gif" />
			<strong><?php echo SPECIES_FILTER_TITLE ?><br/></strong><?php echo SPECIES_FILTER_MSG?></span>
		</a>
	</p>
      <?php echo form_dropdown('dropdown_num_species', $nroSpecies, 3);?>
      
	</td>
</tr>

<tr>
<td>
	 <p> 
		Mismatch filter<?php echo form_checkbox('mismatch_targets', 'accept', TRUE);?>
		<a href='#' class="tooltip">[?]<span>
			<img class="callout" src= "<?php echo site_url();?>/css/callout.gif" />
			<strong><?php echo MM_FILTER_TITLE ?><br/></strong><?php echo MM_FILTER_MSG?></span>
		</a>
	 </p>
     <p> Minimum free energy cutoff 
     
          <?php $data = array(
              'name'          => 'input_mfe',
              'value'       => DEFAULT_PE,
              'maxlength'   => '10',
              'size'        => '5',
            );
			echo form_input($data); 
			?> 
			
		<a href='#' class="tooltip">[?]<span>
			<img class="callout" src= "<?php echo site_url();?>/css/callout.gif" />
			<strong><?php echo MFE_FILTER_TITLE ?><br/></strong><?php echo MFE_FILTER_MSG?></span>
		</a>

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
<div class ="advance-options">
	<a href="#" class="show_hide_options"> Advanced options</a>
	<div class="slidingDiv">
		<p> Select species</p>
		<?php  echo form_multiselect('multiselect_species[]', $plants,'','id = species_mult'); 	?>
	</div>
</div>

			
<script>
/* $('#species_mult').multiSelect();*/
$('#species_mult').multiSelect({ selectableOptgroup: true });

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
 
</head>
<body>

