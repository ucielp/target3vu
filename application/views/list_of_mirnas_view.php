<div id='content'>
  <div class = 'header_result'>
		<a href="javascript:history.go(-1)" class="goback">Go Back</a>
  </div>

  <?php
	echo "<table id='mirna_list'>";
	echo "<tr align = center>
			<th><P>microRNA</th>
			<th><P>Conservation</th>
			<th><P>Consensus</th>
			<th><P>Perfect match dG</th>
		</tr>";
	foreach ($mirnas_list as $mirna){
		echo "<tr>";
			echo "<td>" . $mirna->name . "</td>";
			echo "<td>????</td>";
			echo "<td>" . $mirna->sequence . "</td>";
			echo "<td>" . $mirna->hyb_perf . "</td>";
			echo "</tr>";
		}
	echo "</table>";
  ?>


