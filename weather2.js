/*  navigator.geolocation.getCurrentPosition(success,error);

function success(position){
	var lat=position.coords.latitude;
	var log=position.coords.longitude;
	
	//var GEOCODING='http://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+ '%2C' + position.coords.longitude +'&language=en';

	$.getJSON(GEOCODING).done(function(location){
		$('#city').html(location.results[0].address_components[3].long_name);	
		$('#country').html(location.results[0].address_components[6].long_name);
      
	   
	})
}

function error(err){
	console.log(err)
}  */

$(document).ready(function(){
    $.getJSON( "http://api.openweathermap.org/data/2.5/weather?q=Eindhoven&appid=9334f947893792dcb9b2e2c05ae23eb0", function( data ) {
         
         $("#city").text(data.name);
         $("#country").text(data.sys.country);
	     $('#temp').text(Math.round(data.main.temp-273)+ ' degrees Celcius');
	    
    })

})
