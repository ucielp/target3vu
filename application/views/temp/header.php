<html >
<head> 
 <meta http-equiv="content-script-type" charset=utf-8 content="text/javascript">
 <meta http-equiv="content-style-type" content="text/css">

<script type="text/javascript" src="<?php echo base_url();?>js/jscripts/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jscripts/jsphylosvg-1.55/jsphylosvg-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jscripts/jsphylosvg-1.55/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jscripts/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jscripts/jquery-ui.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/base.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/multi-select.css" type="text/css" >

  <title>Target3vu</title>

  </style>
 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43175694-1', 'comtar.com.ar');
  ga('send', 'pageview');

</script>
  </head>
  
<body>

<div id ="container">
	<div id="header">

		 <a href="<?php echo site_url('targets');?>"><img src="<?php echo base_url(); ?>css/logo7.png" border="0"> </a>
	</div>
	
	<div id = "header_container" >
		<ul class="nav">
			<li><a href="<?php echo base_url(); ?>targets"><span>Find miRNA targets</span></a></li>
            <li><a href="<?php echo base_url(); ?>family"><span>Find miRNA target families</span></a></li>
            <li><a href="<?php echo base_url(); ?>whereis/index/0"><span>Is this gene a potential miRNA target?</span></a></li>
		</ul>



