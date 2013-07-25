
<div id='content'>
  <div class = 'header_result'>
	  	<a href="<?php echo site_url('targets');?>" class="goback">Go Back</a>


	   <?php 
	   		echo "<h1><b>$title</b></h1>" ;
			echo "<p>miRNA:<b> " .  $mirna_name . "</b></p>" ;
			echo "<p>MFE cutoff:<b> " .  $energy . " kcal/mol</b></p>" ;
			if ($mismatch){
				$show_mm = 'Yes';
			}
			else{
				$show_mm = 'No';
			} 
			echo "<p>MM Filter:<b> " .  $show_mm . "</b></p>" ;
			if ($species){
				$sp = '|| ';
				foreach ($species as $specie){
					$sp .= $specie . ' || ';
				}
				echo "<p>Species:<b> "?> 			
				<a title="<?php echo $sp?>" id="HelpMsg" href="#"><span>[?]</span></b></p></a>
				<?php
 			}
			else{
				echo "<p>Species:<b> " .  'All' . "</b></p>" ; 				 
			}
			?>

  </div>
  
  
 <div class="loading">
	 <img src="<?php echo base_url(); ?>css/loading.gif" border="0">
	<p> Loading, please wait. </p>
</div>

<div class='query_result'>
  <?php
	echo "<table id='targets'>";
	echo '<tr align = center>
			<th>
				Arabidopsis Tag' . '<a href="#" class = "tooltip">[?]<span>
				'. ATH_TAG_MSG .'</a></span>
			</th>
			<th>
				Count' . '<a href="#" class = "tooltip">[?]<span>
				'. COUNT_MSG .'</a></span>
			</th>
			<th>
				Species' . '<a href="#" class = "tooltip">[?]<span>
				'. SPECIES_MSG .'</a></span>
			</th>
			<th>
				Description' . '<a href="#" class = "tooltip">[?]<span>
				'. DESCRIPTION_MSG .'</a></span>
			</th>
			<th>
				Family' . '<a href="#" class = "tooltip">[?]<span>
				'. FAMILY_MSG .'</a></span>
			</th>
						
			<th>
				Alignment' . '<a href="#" class = "tooltip">[?]<span>
				'. ALIGMENTS_MSG .'</a></span>
			</th>
		</tr>';
		foreach ($targets as $target){
			$similar = $target->{SIMILAR_field} ;
			echo "<tr class ='to_shown' >";
				echo "<td>
					<a href=" 
					. BEG_LINK_TAIR #BEG_LINK_WMD3
					. $similar 
					. END_LINK_TAIR #END_LINK_WMD3
					. " target='_blank'>" 
					. $similar
					. "</a></td>";
				echo "<td>" . $target->contador . "</td>";
				echo "<td>" . "<a class='show' href=#>Show/Hide species</a>" . "</td>";
				echo "<td>" . $target->short_description . "</td>";
				echo "<td>" . $target->{FAMILY_field} . "</td>";
				echo "<td><a href=" . site_url('targets/view_alignment/' . $mirna_name . '/' . $similar . '/' . $mismatch  . '/' . $energy . '/' . base64_encode(serialize($species)). '/' . $title) . ">View</a></td>";

			echo "</tr>";
			echo "<tr class = 'starthidden'>"; 
				echo "<td></td> <td></td> <td>" . $target->species . "</td> <td></td> <td></td> <td></td>"; #Species
			echo "</tr>";
		}
	echo "</table>";
  ?>
</div>

</div>

<script>
$('.starthidden').hide();

$(function(){
  $("#targets").on({'click':function(event){
    event.preventDefault();
    $(this).closest(".to_shown").nextUntil(".to_shown").toggle("fast");
   }},
   "a.show",null);
});
</script>

<script>
jQuery(window).load(function () {
    $(".loading").hide();
    $(".query_result").show();

});
</script>
