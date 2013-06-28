
<div id='content'>
  <div class = 'header_result'>
	  	<a href="<?php echo site_url('pare');?>" class="goback">Go Back</a>

	   <?php 
	   		echo "<h1><b>$title</b></h1>" ;
			echo "<p>miRNA:<b> " .  $mirna_name . "</b></p>" ;
			echo "<br><br><br><br>" ;
			
			
			?>
  </div>

  <?php
	echo "<table id='targets'>";
	echo "<tr align = center>
			<th><P>Tag</th>
			<th><P>Abundance</th>
			<th><P>Position</th>
			<th><P>PARE hit sequence</th>
			<th><P>Description</th>
			<th><P>Alignment</th>
		</tr>";
		foreach ($targets as $target){
			echo "<tr>";
				echo "<td>" . $target->gen . "</td>"; 
				echo "<td>" . $target->abundance . "</td>"; 
				echo "<td>" . $target->position . "</td>"; 
				echo "<td><PRE>" . $target->sequence . "</PRE></td>"; 
				echo "<td>" . $target->short_description . "</td>";
				$similar = substr($target->gen, 0,9);
				echo "<td><a href=" . site_url('pare/view_alignment/' . $mirna_name . '/' . $similar ) . ">
				View</a></td>";

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


 <script>
  $(function() {
    $( document ).tooltip();
  });
  </script>

