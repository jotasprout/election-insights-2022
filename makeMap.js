// Width and Height
const w = 1000;
const h = 750;

// Map projection
const projection = d3.geoAlbersUsa()
                        .translate([w/2, h/2])
                        .scale([1000]);

// Path Generator
const path = d3.geoPath()
                .projection(projection);

// Create SVG
const svg = d3.select("body")
                .append("svg")
                .attr("width", w)
                .attr("height", h);

// get election results
d3.json("getSocialistWinners.php", function(data) {

    // so I can see what it looks like
    console.log(data);

    // Get geoJSON
    d3.json("myPrezData/us-states.json", function(json) {

        //Merge the ag. data and GeoJSON
        //Loop through once for each ag. data value
        for (var i = 0; i < data.length; i++) {

            // Get the state name
            let dataState = data[i].stateName;
            // console.log(dataState);

            // Get winning candidate
            let dataWinner = data[i].candidateID;
            // console.log(dataWinner + " won " + dataState);

            //Find the corresponding state inside the GeoJSON
            for (var j = 0; j < json.features.length; j++) {

                let jsonState = json.features[j].properties.name;

                if (dataState == jsonState) {
                    // console.log("Yay!" + [j]);
                    json.features[j].properties.winner = dataWinner
                }
            }

            /*
            */
        }
        
        //Bind data and create one path per GeoJSON feature
        svg.selectAll("path")
            .data(json.features)
            .enter()
            .append("path")
            .attr("d", path)
            .style("fill", function(d) {

                let value = d.properties.winner;

                switch (value) {
                    case '28':
                        return "#f00";
                        break;
                    case '17':
                        return "#00f";
                        break;   
                    case '12':
                        return "#ff0";
                        break;
                    case '14':
                        return "#0f0";
                        break;   
                    case '18':
                        return "#f60";
                        break;
                    case '20':
                        return "#f09";
                        break;   
                    case '22':
                        return "#606";
                        break;
                    case '27':
                        return "#09f";
                        break;    
                    case '30':
                        return "#7d7d7d";
                        break;  
                    case '31':
                        return "#000";
                        break;
                    default:
                        return "#ccc";
                        break;
                }

            });
    });    

});