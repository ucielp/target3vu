  <div class = 'header_result'>

<a href="<?php echo site_url('bygeneid/');?>" class="goback">Go Back</a>

	   <?php 
	   		echo "<h1><b>$title</b></h1>" ;
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
</div> <!--End of header_container-->
  
	<div class="loading">
		<img src="<?php echo base_url(); ?>css/loading.gif" border="0">
		<p> Loading, please wait. </p>
	</div>
	
	<div class='query_result'>

  <?php
	echo "<table id='targets'>";
	echo '<tr align = center>
			<th>miRNA</th>
			<th>
				Arabidopsis Tag' . '<a href="#" class = "tooltip">[?]<span>
				'. ATH_TAG_MSG .'</span>
			</th>
			<th>Specie</th>
			<th>
				Description' . '<a href="#" class = "tooltip">[?]<span>
				'. DESCRIPTION_MSG .'</span>
			</th>
			<th>
				Family' . '<a href="#" class = "tooltip">[?]<span>
				'. FAMILY_MSG .'</span>
			</th>
			<th>DeltaG</th>
			<th>Alignment</th>

		</tr>';
		
	foreach ($targets as $mir_name => $target_sp){
		
			
		$deltag =  $energy[$mir_name];
		$mirna_short_name = $short_name[$mir_name];
		foreach ($target_sp as $target){
			
			$similar = $target->{SIMILAR_field} ;
			echo "<tr class ='to_shown' >";
				echo "<td>" . $mirna_short_name . "</td>";

				echo "<td>
					<a href=" 
					. BEG_LINK_TAIR #BEG_LINK_WMD3
					. $similar 
					. END_LINK_TAIR #END_LINK_WMD3
					. " target='_blank'>" 
					. $similar
					. "</a></td>";
				echo "<td>" . $target->species . "</td>";
				echo "<td>" . $target->short_description . "</td>";
				echo "<td>" . $target->{FAMILY_field} . "</td>";
				echo "<td>" . $target->deltag . "</td>";
				echo "<td><PRE>" . $target->target . "</br>" 
									 . $target->align  . "</br>"
									 . $target->mirna  . 
						"</PRE></td>";
				echo "</tr>";
		}
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
