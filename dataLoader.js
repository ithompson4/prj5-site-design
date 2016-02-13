var Rainbow = require('rainbowvis.js');
var css = require('dom-css');
var gsap = require('gsap');
var rangeslider = require('rangeslider-js');
var regions = [];
var counter = 3;

//change this for number of data points
var dataPoints = 223;
var colours = [];
var numberOfColours = 20;

var rain = new Rainbow();
rain.setNumberRange(1, numberOfColours);
rain.setSpectrum('#0000ff', '#dddddd'); 

module.exports.load = function() {   
    console.log('mapgeneration');
    var fs = require('fs');

    var rangeBox = document.getElementById('rangeBox');
    rangeBox.innerHTML = '<input type="range" />';

    rangeslider.create(document.querySelector('input'), {

        min: 0,
        max: dataPoints - counter,
        value: 0, //defaults to min + (max-min)/2
        step: 1,
        // callbacks
        onInit: function () {
            console.log('init');
        },
        onSlideStart: function (value, percent, position) {
            console.log('ONSLIDESTART: value: ' + value, ' percent: ' + percent, ' position: ' +position);
        },
        onSlide: function (value, percent, position) {
            console.log('ONSLIDE: value: ' + value, ' percent: ' + percent, ' position: ' +position);
            counter = value;
            updateColour();
        },
        onSlideEnd: function (value, percent, position) {
            console.log('ONSLIDEEND: value: ' + value, ' percent: ' + percent, ' position: ' +position);
        }
    });


    //Change this to parse a different file - path is relative to process.cwd()
    var txt = fs.readFileSync('./SeasonallyAdjustedUnemploymentEIRegion.csv', 'utf8');
    var lines = txt.split('\n');
    
    for(var i = 0; i < numberOfColours; i++) {
        var hexColour = rain.colourAt(i);
        colours.push('#' + hexColour);
    }
    //log the colours for testing
    console.log(colours);
    
    //TEST THE COLOUR SPECTRUM
    var testobjs = {};
    for(var i = 0; i < numberOfColours; i ++) {
        
        testobjs[i]= document.createElement('div');
    
        gsap.set(testobjs[i], {
            backgroundColor: colours[i],
            padding: "7px",
            width: "50px",
            height: "50px",
            float: 'left'
        });
    //    document.body.appendChild(testobjs[i]);
    }

    for(var i = 0; i < lines.length; i++) {
        //Improve the parser
        if(lines[i][0] !== '#' && lines[i][0] !== ' ' && lines[i][0] !== ',' && lines[i].length > 0) {
            regions.push(lines[i]);
        }
    }
    updateColour();   
}

function updateColour() {
    for(var i = 0; regions[i] && counter < dataPoints; i++) {
        var items = regions[i].split(',');      
        var colourIndex = parseInt(items[counter]) % numberOfColours;
        var elementColoured = document.getElementById("ei" + items[0]);

        css(elementColoured, {
            'opacity': 0.5,
            'fill': colours[colourIndex]
        });
    }
}