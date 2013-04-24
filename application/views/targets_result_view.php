<div id='content'>
  
  <?php
	echo "<table id='targets' align = center >";
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
				echo "<td rowspan='	2'>" . $target->similar1 . "</td>";
				echo "<td rowspan='	2'>" . $target->contador . "</td>";
				echo "<td>" . "<a class='show'>Show/Hide species</a>" . "</td>";
				echo "<td rowspan='	2'>" . $target->short_description . "</td>";
				echo "<td rowspan='	2'>" . $target->family . "</td>";
				echo "<td rowspan='	2'><a href=" . site_url('targets/view_alignment/' . $mirna_name . '/' . $target->similar1) . "><u>View</u></a></td>";

			echo "</tr>";
			echo "<tr class = 'starthidden'>"; #starthidden is defined in base.css
				echo "<td>" . $target->species . "</td>"; #Species
			echo "</tr>";
		}
	echo "</table>";
  ?>
</div >

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script>

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





