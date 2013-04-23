<div id='content'>
 
  <?php
	echo "<table id = 'targets' align = center>";
	echo "<tr align = center>
			<th><P>EST Tag</th>
			<th><P>Specie</th>
			<th><P>5'-target-3'<br>
					Alignment<br>
					3'-miRNA-5'</th>			
			<th><P>MFE</th>
		</tr>";
		foreach ($alignments as $alignment){
			echo "<tr>";
				echo "<td>" . $alignment->gen . "</td>";
				echo "<td>" . $alignment->file . "</td>";
				echo "<td><PRE>" . $alignment->target . "</br>" 
								 . $alignment->align  . "</br>"
								 . $alignment->mirna  . 
					"</PRE></td>";
				echo "<td>" . $alignment->deltag . "</td>";
			echo "</tr>";		
		}
	echo "</table>";
  ?>

</div >

