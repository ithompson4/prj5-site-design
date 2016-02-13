var EventEmitter = require('events');
var d3 = require('d3');
var topojson = require('topojson');
var gsap = require('gsap');

var dataLoader = require('./dataLoader');

require('domready')(function () {
    generateMapBase(); 
});

var events = new EventEmitter();

    
events.on('popInfo', function() {
 dataLoader.load();
})

function generateMapBase() {  
    var width = 1024//$(".mapBox").width();
        height = 768//$(window).height();

    var zoom = d3.behavior.zoom()
        .translate([-790, -225])
        .scale(1.1)
        .scaleExtent([1, 20])
        .on("zoom", zoomed);
    
    //Start to append the DOM
    var svg = d3.select(".mapBox").append("svg")
        .attr("width", width)
        .attr("height", height)
        .attr("class", "map");
    
    var g = svg.append("g");
    
    svg.append("rect")
        .attr("class", "overlay")
        .attr("width", width)
        .attr("height", height);
    
    svg.call(zoom);
    svg.call(zoom.event);
    
    d3.json("./mapShell.json", function(error, ms) {
    if (error) return console.error("ERROR BEING LOGGED " + error);
    
        var projection = 
        d3.geo.mercator().scale(400)
        .translate([width / 0.60, height * 1.3 ]);
    
        var path = d3.geo.path().projection(projection);
    
        var provinces = topojson.feature(ms, ms.objects.provinces);
        
        var land = topojson.feature(ms, ms.objects.land);
        var prov = topojson.feature(ms, ms.objects.provinces);    
        var provBoundary = topojson.mesh(ms, ms.objects.provinces, 
        function(a, b) {
            return a !==b;
        });
        var eiRegion = topojson.feature(ms, ms.objects.EIRegion);
        var eiRegionBoundary = topojson.mesh(ms, ms.objects.EIRegion, 
        function(a, b) {
            return a !== b;
        });
        var cities = topojson.feature(ms, ms.objects.places);
        var citiesUS = topojson.feature(ms, ms.objects.citiesUS);
        var  urbanAreas = topojson.feature(ms, ms.objects.urban);
        var lakes = topojson.mesh(ms, ms.objects.lakes);
        var rivers = topojson.mesh(ms, ms.objects.riversNA, 
        function(a, b) {
            return b === a;
        });
        var rails = topojson.mesh(ms, ms.objects.railways, 
        function(a, b) {
            return b === a;
        });
        var roadsCA = topojson.mesh(ms, ms.objects.roadsCA, 
        function(a, b) {
            return b === a;
        });
        var roadsUS = topojson.mesh(ms, ms.objects.roadsUS, 
        function(a, b) {
            return b === a;
        });
        
        g.selectAll(".land")
        .data(land.features)
        .enter().append("path")
        .attr("class", function(d) { 
            return "land " + d.properties.adm0_a3 + " otherCountry"; 
        })
        .attr("d", path);

        g.selectAll(".province")
        .data(prov.features)
        .enter().append("path")
        .attr("class", function(d) { return "land " +  d.properties.sr_adm0_a3  })
        .attr("id", function(d) { return d.properties.postal })
        .attr("d", path);
    
        g.append("path")
        .datum(provBoundary)
        .attr("d", path)
        .attr("class", "land " + "province-boundary")
        .style("stroke-width", 0.5 + "px");     
            
        g.selectAll(".EIRegion")
        .data(eiRegion.features)
        .enter().append("path")
        .attr("id", 
            function(d) { console.log("EI PROPS " + JSON.stringify(d.properties));
            return "ei" + d.properties.ERUID;
        })
        .attr("d", path);
     
        g.append("path")
        .datum(cities)
        .attr("d", path)
        .attr("class", "land " + "place");
    
        g.append("path")
        .datum(urbanAreas)
        .attr("d", path)
        .attr("class", "land " + "urban-area");
    
        g.append("path")
        .datum(roadsCA)
        .attr("d", path)
        .attr("class", "land " + "roads")
        .style("stroke-width", .02 + "px");
    
        g.append("path")
        .datum(lakes)
        .attr("d", path)
        .attr("class", "land " + "lakes");
    
        /*  UNUSED datums in theis map
        .datum(roadsUS)
        .datum(citiesUS)
        .datum(rails) 
        .datum(rivers)
        */

        g.selectAll(".place-label")
        .data(cities.features)
        .enter().append("text")
        .attr("class", "place-label")
        .attr("transform", function(d) { return "translate(" + projection(d.geometry.coordinates) + ")"; })
        .attr("dy", "-0.7em")
        .attr("dx", "3em")
        .text(function(d) { 
            if(d.properties.SCALERANK < 20)          
                return d.properties.NAMEASCII;
            return null; 
        })
        .style("font-size", function(d) { 
            if (d.properties.SCALERANK === 1) return "10" + "%";
                else if(d.properties.SCALERANK === 2) return "10" + "%";               
                else if(d.properties.SCALERANK === 3) return "9" + "%";
                else if(d.properties.SCALERANK === 4) return "8" + "%";
                else if(d.properties.SCALERANK === 5) return "7" + "%";
                else if(d.properties.SCALERANK === 6) return "6" + "%";
                else if(d.properties.SCALERANK === 7) return "5" + "%";
                else if(d.properties.SCALERANK === 8) return "4" + "%";
                else if(d.properties.SCALERANK === 9) return "3" + "%";
                else if(d.properties.SCALERANK === 10) return "3" + "%";
                else return 4 + "%";     
        });
   
        g.selectAll(".place-label")
        .attr("x", function(d) { return d.geometry.coordinates[0] > -1 ? 6 : -6; })
        .style("opacity", 0)
        .style("text-anchor", function(d) {
            if(d.properties.SCALERANK < 5 )     
                    return d.geometry.coordinates[0] > -1 ? "start" : "end"; 
        });
    
        d3.select(self.frameElement).style("height", height + "px");  
      
        //the event populates the map with the statistic info depending on the content of
        //the dataLoader
        events.emit('popInfo');
    });
    
    function zoomed() {
        g.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
        if( d3.event.scale > 1 ) {
            g.select(".province-boundary").style("stroke-width", 1 / d3.event.scale + "px");
            g.select(".roads").style("stroke-width", 0.01 * d3.event.scale + "px");

            if(d3.event.scale > 6) {
                var placeLabel = g.selectAll(".place-label");
                var roads = g.select('.roads');
                var urban = g.select('.urban-area');
            
                gsap.to(urban, 5.5, { ease: Back.easeOut.config(1.7), opacity: 1 });  
                gsap.to(roads, 5.5, { ease: Back.easeOut.config(1.7), opacity: 1 });      
                gsap.to(placeLabel, 5.5, { ease: Back.easeOut.config(1.7), opacity: 1 });
            }
            else if(d3.event.scale < 6) {
                var placeLabel = g.selectAll(".place-label");
                var roads = g.select('.roads');
                var urban = g.select('.urban-area');
            
                gsap.to(urban, 5.5, { ease: Back.easeOut.config(1.7), opacity: 0 });
                gsap.to(roads, 5.5, { ease: Back.easeOut.config(1.7), opacity: 0 }); 
                gsap.to(placeLabel, 2.5, { ease: Back.easeOut.config(1.7), opacity: 0 });
            }
        }
    }
    
    
   
    
   
}
 