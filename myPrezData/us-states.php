<?php

require_once 'stylesAndScripts.php';
require_once 'navbar_ppp.php';

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>2016 US Presidential Election Results</title>
		<?php echo $stylesAndSuch; ?>
	</head>
	<body>
		<script type="text/javascript">

			//Width and height
			var w = 500;
			var h = 300;

			//Define map projection
			var projection = d3.geoAlbersUsa()
								   .translate([w/2, h/2])
								   .scale([500]);

			//Define path generator
			var path = d3.geoPath()
							 .projection(projection);

			//Create SVG element
			var svg = d3.select("body")
						.append("svg")
						.attr("width", w)
						.attr("height", h);

			//Load in GeoJSON data
			d3.json("us-states.json", function(json) {
				
				//Bind data and create one path per GeoJSON feature
				svg.selectAll("path")
				   .data(json.features)
				   .enter()
				   .append("path")
				   .attr("d", path)
				   .style("fill", "steelblue");
		
			});
			
		</script>

		<?php echo $scriptsAndSuch; ?>

	</body>
</html>

