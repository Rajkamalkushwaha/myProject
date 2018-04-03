var tempUnit='C';            //set default unit
var currentTempInCelsius;    
var getIP='http://ip-api.com/json/';         //Api use for get Ip
var openWeatherMap='https://fcc-weather-api.glitch.me/api/current?'; //use for weather information in json formate

$('#tempunit').click(function(){                //use for check temp unit
	var currTempunit=$('#tempunit').text();
	var newTempunit=currTempunit== "C"?"F":"C";
	$('#tempunit').text(newTempunit);
	if(newTempunit=='F'){
		var fehTemp=Math.round(parseInt($('#temp').text())*9/5+32);
		$("#temp").text(fehTemp+" "+String.fromCharCode(176));
	}
		 else {
      $("#temp").text(currentTempInCelsius + " " + String.fromCharCode(176));
    }
	
});

$.getJSON(getIP).done(function(location){
   $.getJSON(openWeatherMap,{
   lat:location.lat,
   lon:location.lon,
          units: 'metric',
        APPID: 'APIKEY'
    }).done(function(weathers) {
		 $("#city").html(weathers.name+",");            
         $("#country").html(weathers.sys.country);
		var currentTempInCelsius=Math.round(weathers.main.temp*10)/10;
         $("#temp").html(currentTempInCelsius + " " + String.fromCharCode(176));
		 $("#tempunit").html(tempUnit);
		  $("#desc").html(weathers.weather[0].main);
          
		
    })
})
   

