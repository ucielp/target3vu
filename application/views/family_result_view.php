<div id='content'>
  
  <?php
	echo "<table id='targets' align = center border = 0>";
	echo "<tr align = center>
			<th><P>Tag</th>
			<th><P>Count</th>
			<th><P>Species</th>
			<th><P>Description</th>
			<th><P>Family</th>
			<th><P>AVG (deltaG)</th>
		</tr>";
		foreach ($targets as $target){
			echo "<tr class ='to_shown' >";
			 //~ 
				echo "<td rowspan='	2'><a href=" . site_url('family/show_tags/' . $mirna_name . '/' . str_replace(unserialize(REPLACE_A),unserialize(REPLACE_B),$target->{FAMILY_field})) . '/' . $mismatch  . '/' . $energy . ">View</a></td>";

				//~ echo "<td rowspan='	2'>" . $target->similars . "</td>";
				echo "<td rowspan='	2'>" . $target->contador . "</td>";
				echo "<td>" . "<a class='show' href=#>Show/Hide species</a>" . "</td>";
				echo "<td rowspan='	2'>" . $target->short_description . "</td>";
				echo "<td rowspan='	2'>" . $target->{FAMILY_field} . "</td>";
				echo "<td rowspan='	2'>". "TO_DO". "</td>";

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


