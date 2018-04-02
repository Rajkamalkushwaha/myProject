navigator.geolocation.getCurrentPosition(success,error);

function success(position){
	console.log(position.coords.latitude)
	console.log(position.coords.longitude)
	
	var GEOCODING='http://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+ '%2C' + position.coords.longitude +'&language=en';

	$.getJSON(GEOCODING).done(function(location){
		$('#city').html(location.results[0].address_components[3].long_name);	
		$('#country').html(location.results[0].address_components[6].long_name);

	})
}

function error(err){
	console.log(err)
}

