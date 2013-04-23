<div id='content'>
  
  <?php
	echo "<table id='targets' align = center>";
	echo "<tr align = center>
			<th><P>Tag</th>
			<th><P>Count</th>
			<th><P>Species</th>
			<th><P>Description</th>
			<th><P>Family</th>
			<th><P>Alignment</th>
		</tr>";
		foreach ($targets as $target){
			echo "<tr>";
				echo "<td>" . $target->similar1 . "</td>";
				echo "<td>" . $target->contador . "</td>";
				//~ echo "<td>" . $target->species . "</td>";
				echo "<td>" . 'species' . "</td>";
				echo "<td>" . $target->short_description . "</td>";
				echo "<td>" . $target->family . "</td>";
				echo "<td><a href=" . site_url('targets/view_alignment/' . $mirna_name . '/' . $target->similar1) . "><u>View</u></a></td>";
									 

			echo "</tr>";		
		}
	echo "</table>";
  ?>
</div >

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>

