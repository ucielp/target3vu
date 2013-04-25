<div id='content'>
  
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
			echo "<tr class ='to_shown' >";
				echo "<td rowspan='	2'>
					<a href=" 
					. BEG_LINK_TAIR #BEG_LINK_WMD3
					. $target->similar1 
					. END_LINK_TAIR #END_LINK_WMD3
					. " target='_blank'>" 
					. $target->similar1 
					. "</a></td>";
				http://wmd3.weigelworld.org/cgi-bin/webapp.cgi?page=TargetSearch&rm=showsequence&seq_id=AT3G14120&transcript_library=TAIR8_cdna_20080412
				echo "<td rowspan='	2'>" . $target->contador . "</td>";
				echo "<td>" . "<a class='show' href=#>Show/Hide species</a>" . "</td>";
				echo "<td rowspan='	2'>" . $target->short_description . "</td>";
				echo "<td rowspan='	2'>" . $target->family . "</td>";
				echo "<td rowspan='	2'><a href=" . site_url('targets/view_alignment/' . $mirna_name . '/' . $target->similar1) . ">View</a></td>";

			echo "</tr>";
			echo "<tr class = 'starthidden'>"; #starthidden is defined in base.css
				echo "<td>" . $target->species . "</td>"; #Species
			echo "</tr>";
		}
	echo "</table>";
  ?>
</div >


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


