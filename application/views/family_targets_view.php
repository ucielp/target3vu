<div id='content'>
 
  <?php
	echo "<table id = 'targets' align = center>";
	echo "<tr align = center>
			<th><P>Arabidopsis Tag</th>
			<th><P>EST Tag</th>
			<th><P>Specie</th>
			<th><P>5'-target-3'<br>
					Alignment<br>
					3'-miRNA-5'</th>			
			<th><P>MFE</th>
		</tr>";
		foreach ($family_targets as $target){
			
			$class_alignment = 'default';
			$class_deltag = 'default';

			if($mismatch_filter ){
				# Si tiene el filtro cambio de color a los que no lo pasan
				if (!$target->filtro_mm){
					$class_alignment = 'replace_color';
					
				}
			}
			
			if($energy < $target->deltag){
					$class_deltag = 'replace_color';
			}
			
			
			echo "<tr>";
				echo "<td>" . $target->{SIMILAR_field} . "</td>";
				echo "<td>" . $target->gen . "</td>";
				echo "<td>" . $target->file . "</td>";
				echo "<td class= $class_alignment ><PRE>" . $target->target . "</br>" 
								 . $target->align  . "</br>"
								 . $target->mirna  . 
					"</PRE></td>";
				echo "<td class = $class_deltag>" . $target->deltag . "</td>";
			echo "</tr>";		
		}
	echo "</table>";
  ?>

</div >


