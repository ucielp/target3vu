  <div class = 'header_result'>
	  	<a href="<?php echo site_url('family');?>" class="goback">Go Back</a>
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
 </div> <!--End of header_container-->
  	<div class="loading">
		<img src="<?php echo base_url(); ?>css/loading.gif" border="0">
		<p> Loading, please wait. </p>
	</div>
	
	<div class='query_result'>
		
  <?php
	echo "<table id='targets' align = center border = 0>";
	echo "<tr align = center>
			<th>Tag</th>
			<th>Count</th>
			<th>Species</th>
			<th>Family</th>
		</tr>";
		$k =1 ;
		foreach ($targets as $target){
			echo "<tr class ='to_shown' >";
				echo "<td><a href=" . site_url('family/show_tags/' . $mirna_name . '/' . base64_encode(serialize($target->{FAMILY_field}))) . '/' . $mismatch  . '/' . $energy . '/' . base64_encode(serialize($species)) .">View</a></td>";
				echo "<td>" . $target->contador . "</td>";
				echo "<td>";
					echo '<div>
							<a  class="button_show" aShow="'.$k.'">Show/Hide</a>
						  </div>';
					echo '<div id="div'.$k.'" class="species_hidden">' .
							$target->species .  '</div>';
				echo "</td>";				echo "<td>" . $target->{FAMILY_field} . "</td>";
			echo "</tr>";
			$k++;
		}
	echo "</table>";
  ?>
  </div>

</div>
  
<script type="text/javascript" language="javascript">// 
$(document).ready(function() {  
   $('#id_submit_form').click(function() {
        get_form_data_and_submit();
        return false;
    });
</script>



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

