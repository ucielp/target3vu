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

			$class_alignment = 'default';
			$class_deltag = 'default';

			if($mismatch_filter ){
				# Si tiene el filtro cambio de color a los que no lo pasan
				if (!$alignment->filtro_mm){
					$class_alignment = 'replace_color';
					
				}
			}
			
			if($energy < $alignment->deltag){
					$class_deltag = 'replace_color';
			}
			
			echo "<tr>";
				echo "<td>" . $alignment->gen . "</td>";
				echo "<td>" . $alignment->file . "</td>";
				echo "<td class= $class_alignment ><PRE>" . $alignment->target . "</br>" 
								 . $alignment->align  . "</br>"
								 . $alignment->mirna  . 
					"</PRE></td>";
				echo "<td class = $class_deltag>" . $alignment->deltag . "</td>";
			echo "</tr>";		
		}
	echo "</table>";
  ?>

</div >

