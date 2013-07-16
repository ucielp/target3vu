<div id='content'>
 	<div class = 'header_result'>
		<a href="javascript:history.go(-1)" class="goback">Go Back</a>
		<?php 
			echo "<h1><b><b>$title</b></h1>" ;
			echo "<p>miRNA:<b> " .  $mirna_name . "</b></p>" ;
			echo "<p>MFE cutoff:<b> " .  $energy . " kcal/mol</b></p>" ;
			if ($mismatch){
				$show_mm = 'Yes';
			}
			else{
				$show_mm = 'No';
			} 
			echo "<p>MM Filter:<b> " .  $show_mm . "</b></p>" ; ?>
	</div>
  <?php
	echo "<table id = 'targets' align = center>";
	echo '<tr align = center>
			<th>
				Arabidopsis Tag' . '<a href="#" class = "tooltip">[?]<span>
				'. ATH_TAG_MSG .'</span>
			</th>
			<th>
				Sequence ID
			</th>
			<th>Specie
			</th>
			<th>
				5\'-target-3\'<br>
				    Alignment<br>
					3\'-miRNA-5\'' . '<a href="#" class = "tooltip">[?]<span>
				'. ALIGNMENT_MSG .'</span>
			</th>
			<th>
				MFE' . '<a href="#" class = "tooltip">[?]<span>
				'. MFE_MSG .'</span>
			</th>
		</tr>';
		
		foreach ($family_targets as $target){
			
			$class_alignment = 'default';
			$class_deltag = 'default';

			if($mismatch_filter ){
				# Si tiene el filtro cambio de color a los que no lo pasan
				if (!$target->filtro_mm){
					$class_alignment = 'altert_color';
					
				}
			}
			
			if($energy < $target->deltag){
					$class_deltag = 'altert_color';
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
		
		
		# BEGIN alignments NOT IN
		if ($family_targets_not_in) {
			foreach ($family_targets_not_in as $target){

				$class_alignment = 'not_in_color';
				$class_deltag = 'not_in_color';

				//~ if($mismatch_filter ){
					//~ # Si tiene el filtro cambio de color a los que no lo pasan
					//~ if (!$alignment->filtro_mm){
						//~ $class_alignment = 'altert_color';
						//~ 
					//~ }
				//~ }
				//~ 
				//~ if($energy < $alignment->deltag){
						//~ $class_deltag = 'altert_color';
				//~ }
				
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
		}
		# End of alignments NOT IN
		
	echo "</table>";
  ?>

</div >


