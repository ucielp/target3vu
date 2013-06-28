<div id='content'>
	<div class = 'header_result'>
		<a href="javascript:history.go(-1)" class="goback">Go Back</a>
		<?php 
	   		echo "<h1><b>$title</b></h1>" ;
			echo "<p>miRNA:<b> " .  $mirna_name . "</b></p>" ;
			echo "<p>Tag:<b> " .  $similar . "</b></p>" ;
			echo "<p></p>" ;
			echo "<p></p>" ;

			?>
	</div>
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

