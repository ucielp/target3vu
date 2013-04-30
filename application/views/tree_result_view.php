
</head>
<body>
	<div id="svgCanvas"> </div>
</body>
</html>			

<script>
	window.onload = function(){
			var dataObject = { newick: 
							 '(Arabidopsis:0.1,(Populus:0.3,Vitis:0.4)Brassica:0.2,Theobrana_Cacao:0.5);' 
			};
			phylocanvas = new Smits.PhyloCanvas(
				dataObject,
				'svgCanvas', 
				500, 500
			);
	};
	
	Smits.PhyloCanvas.Render.Style.line.stroke = 'rgb(0,0,255)'
	Smits.PhyloCanvas.Render.Style.highlightedEdgeCircle.fill = 'green'

</script>
