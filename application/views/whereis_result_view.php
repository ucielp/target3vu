  <div class = 'header_result'>

<a href="<?php echo site_url('whereis/by_ath_id/0');?>" class="goback">Go Back</a>

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
			<th>
				Count' . '<a href="#" class = "tooltip">[?]<span>
				'. COUNT_MSG .'</span>
			</th>
			<th>Species' . '<a href="#" class = "tooltip">[?]<span>
				'. SPECIES_MSG .'</span>
			</th>
			<th>
				Target description' . '<a href="#" class = "tooltip">[?]<span>
				'. DESCRIPTION_MSG .'</span>
			</th>
			<th>
				Gene family' . '<a href="#" class = "tooltip">[?]<span>
				'. FAMILY_MSG .'</span>
			</th>
						
			<th>
				Alignments' . '<a href="#" class = "tooltip">[?]<span>
				'. ALIGMENTS_MSG .'</span>
			</th>
		</tr>';
	$k =1 ;		
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
				echo "<td>" . $target->contador . "</td>";
				echo "<td>";
					echo '<div>
							<a  class="button_show" aShow="'.$k.'">Show/Hide</a>
						  </div>';
					echo '<div id="div'.$k.'" class="species_hidden">' .
							$target->species .  '</div>';
				echo "</td>";				echo "<td>" . $target->short_description . "</td>";
				echo "<td>" . $target->{FAMILY_field} . "</td>";
				echo "<td><a href=" . site_url('targets/view_alignment/' . $mir_name . '/' . $similar . '/' . $mismatch  . '/' . $deltag . '/' . base64_encode(serialize($species)) . '/' . $title) . ">View</a></td>";

			echo "</tr>";
			$k++;
		}
	}
	echo "</table>";
  ?>
</div>

</div>

<script>
$('.species_hidden').hide();

jQuery(function(){
	jQuery('.button_show').click(function(){
		jQuery('#div'+$(this).attr('aShow')).toggle();
	});
});
</script>



<script>
jQuery(window).load(function () {
    $(".loading").hide();
    $(".query_result").show();
});
</script>
