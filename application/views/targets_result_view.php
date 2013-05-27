<div id='content'>
  <div id = 'header_result'>
	   <?php 
			echo "<p>miRNA: " .  $mirna_name . "</p>" ;
			echo "<p>Min Species: " .  $min_species . "</p>" ;
			echo "<p>MFE cutoff " .  $energy . "</p>" ;
			echo "<p> MM Filter:" .  $mismatch . "</p>" ;
			?>
	  
  </div>
  <?php
	echo "<table id='targets' align = center border = 0>";
	echo "<tr align = center>
			<th><P>Tag</th>
			<th><P>Count</th>
			<th><P>Species</th>
			<th><P>Description</th>
			<th><P>Family</th>
			<th><P>Alignment</th>
		</tr>";
		foreach ($targets as $target){
			$similar = $target->{SIMILAR_field} ;
			echo "<tr class ='to_shown' >";
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
				echo "<td rowspan='2'><a href=" . site_url('targets/view_alignment/' . $mirna_name . '/' . $similar . '/' . $mismatch  . '/' . $energy . '/' . base64_encode(serialize($species))) . ">View</a></td>";

			echo "</tr>";
			echo "<tr class = 'starthidden'>"; #starthidden is defined in base.css
				echo "<td>" . $target->species . "</td>"; #Species
			echo "</tr>";
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


