 
  <?php echo form_open_multipart("pare/search",'id = form_search');?>

<div id='content'>
<div id="home">
<h1><?php echo $title?></h1>

<table id = 'home_target' >

<tr>
	<td> 
	<p>microRNA</p>
      <?php echo form_dropdown('dropdown_microRNAs', $microRNAs);?>
	</td>
    
    <td> 


<td>  
	<p><small><b><big>
			<input  class  = "search" value="Search" type="submit">
	</big></b> </small></p>
</td>
</tr>
</table>



			

  
</head>
<body>

