<div id='content'>
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
  <?php
	echo "<table id='targets' align = center border = 0>";
	echo "<tr align = center>
			<th>Tag</th>
			<th>Count</th>
			<th>Species</th>
			<th>Family</th>
		</tr>";
		foreach ($targets as $target){
			echo "<tr class ='to_shown' >";
			 //~ 
				echo "<td rowspan='	2'><a href=" . site_url('family/show_tags/' . $mirna_name . '/' . base64_encode(serialize($target->{FAMILY_field}))) . '/' . $mismatch  . '/' . $energy . '/' . base64_encode(serialize($species)) .">Show</a></td>";

				//~ echo "<td rowspan='	2'>" . $target->similars . "</td>";
				echo "<td rowspan='	2'>" . $target->contador . "</td>";
				echo "<td>" . "<a class='show' href=#>Show/Hide species</a>" . "</td>";
				echo "<td rowspan='	2'>" . $target->{FAMILY_field} . "</td>";

			echo "</tr>";
			echo "<tr class = 'starthidden'>"; #starthidden is defined in base.css
				echo "<td>" . $target->species . "</td>"; #Species
			echo "</tr>";
		}
	echo "</table>";
  ?>
  
<script type="text/javascript" language="javascript">// 
$(document).ready(function() {  
   $('#id_submit_form').click(function() {
        get_form_data_and_submit();
        return false;
    });
</script>

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


