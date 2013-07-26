  <div class = 'header_result'>
		<a href="javascript:history.go(-1)" class="goback">Go Back</a>
		<?php 
			echo "<h1><b><b>$title</b></h1>" ;	
		echo "<br><br><br><br><br><br>";
	  ?>
  </div>
</div> <!--End of header_container-->

  <?php
	echo "<table id='targets'>";
	echo "<tr align = center>
			<th>MicroRNA name</th>
			<th>Conservation</th>
			<th>Consensus sequence</th>
			<th>Perfect match dG</th>
		</tr>";
	foreach ($mirnas_list as $mirna){
		echo "<tr>";
			echo "<td>" . $mirna->name . "</td>";
			echo "<td>" . $mirna->conservation . "</td>";
			echo "<td><PRE>" . $mirna->sequence . "</PRE></td>";
			echo "<td>" . $mirna->hyb_perf . "</td>";
			echo "</tr>";
		}
	echo "</table>";
  ?>


