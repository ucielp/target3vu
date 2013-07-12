
<div id='content'>
  <div class = 'header_result'>
	  	<a href="<?php echo site_url('whereis');?>" class="goback">Go Back</a>

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
				<a title="<?php echo $sp?>" getDbInfo="on" id="dbHelp" href="#"><span class="ui-ncbitoggler-master-text"><span>[?]</span></span></b></p>
				<?php
 			}
			else{
				echo "<p>Species:<b> " .  'All' . "</b></p>" ; 				 
			}
			?>
			<p></p>
			<p></p>
      <a class="" title="" id="" href="#">

  </div>

  <?php
	echo "<table id='targets'>";
	echo "<tr align = center>
			<th><P>miRNA</th>
			<th><P>Tag</th>
			<th><P>Count</th>
			<th><P>Species</th>
			<th><P>Description</th>
			<th><P>Family</th>
			<th><P>Alignment</th>
		</tr>";
		
	foreach ($targets as $mir_name => $target_sp){
		$energy =  $energy[$mir_name];
		foreach ($target_sp as $target){
			$similar = $target->{SIMILAR_field} ;
			echo "<tr class ='to_shown' >";
				echo "<td rowspan='2'>" . $mir_name . "</td>";

				echo "<td rowspan='2'>
					<a href=" 
					. BEG_LINK_TAIR #BEG_LINK_WMD3
					. $similar 
					. END_LINK_TAIR #END_LINK_WMD3
					. " target='_blank'>" 
					. $similar
					. "</a></td>";
				echo "<td rowspan='2'>" . $target->contador . "</td>";
				echo "<td>" . "<a class='show' href=#>Show/Hide species</a>" . "</td>";
				echo "<td rowspan='2'>" . $target->short_description . "</td>";
				echo "<td rowspan='2'>" . $target->{FAMILY_field} . "</td>";
				echo "<td rowspan='2'><a href=" . site_url('targets/view_alignment/' . $mir_name . '/' . $similar . '/' . $mismatch  . '/' . $energy . '/' . base64_encode(serialize($species))) . ">View</a></td>";

			echo "</tr>";
			echo "<tr class = 'starthidden'>"; #starthidden is defined in base.css
				echo "<td>" . $target->species . "</td>"; #Species
			echo "</tr>";
		}
	}
	echo "</table>";
  ?>


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
  $(function() {
    $( document ).tooltip();
  });
  </script>
