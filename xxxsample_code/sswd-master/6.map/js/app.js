var map = null,
	marker = null,
	geocoder = null,
	directions = null,
	router = null;

var griffith = {lat:51.904157, lng:-8.460932};

$(function(){

	// setup the Google objects
	map = new google.maps.Map(document.getElementById("map"), {zoom: 10, center: new google.maps.LatLng(griffith.lat, griffith.lng), mapTypeId: google.maps.MapTypeId.ROADMAP});
	geocoder = new google.maps.Geocoder();	
	router = new google.maps.DirectionsService();
	display = new google.maps.DirectionsRenderer();
  	display.setMap(map);


	google.maps.event.addListener(map, 'click', function(e) {

		var latlng = new google.maps.LatLng(e.latLng.lat().toFixed(5), e.latLng.lng().toFixed(5));

		getSuggestedAddress(latlng);
		$(".distance").html(
				calcDistance(griffith.lat, griffith.lng, e.latLng.lat().toFixed(5), e.latLng.lng().toFixed(5))+" meters<br/>"+
				calcBearing(griffith.lat, griffith.lng, e.latLng.lat().toFixed(5), e.latLng.lng().toFixed(5))
			);
		getRoute(latlng);
	});
});


function getSuggestedAddress(latlng) {
	geocoder.geocode({'latLng': latlng}, function(results, status) {
    	if (status == google.maps.GeocoderStatus.OK) {
    		if (results[1]) {        			
    			$(".address").text(results[1].formatted_address);

				if (marker) 
					marker.setPosition(latlng);
				
				else 
					marker = new google.maps.Marker({
						position: latlng,
						map: map
					});					
    		}
    	} else {
    		alert("Geocoder failed due to: " + status);
    	}
    });
}

function getRoute(latlng) {
	var request = {
      	origin: new google.maps.LatLng(griffith.lat, griffith.lng),
      	destination: latlng,
      	travelMode: google.maps.TravelMode.DRIVING
  	};
  	router.route(request, function(response, status) {
  		if (status == google.maps.DirectionsStatus.OK) {    		
      		display.setDirections(response);
      		$(".time").text(response.routes[0].legs[0].duration.text);
    	}
  	});
}



/**
 * Calculate the 'as the crow flies' distance between to points on the map
 * Taken from: http://www.movable-type.co.uk/scripts/latlong.html
 * @param lat1
 * @param lng1
 * @param lat2
 * @param lng2
 */
function calcDistance(lat1, lng1, lat2, lng2) { 
    var p1 = new LatLon(parseFloat(lat1), parseFloat(lng1));                                                      
    var p2 = new LatLon(parseFloat(lat2), parseFloat(lng2));                                                      
    var dist = p1.distanceTo(p2);
    return dist*1000;
}


/**
 * Calculate the bearing from 0 degrees North
 * Taken from: http://www.movable-type.co.uk/scripts/latlong.html
 * @param lat1
 * @param lng1
 * @param lat2
 * @param lng2
 */
function calcBearing(lat1, lng1, lat2, lng2) {  
    var p1 = new LatLon(parseFloat(lat1), parseFloat(lng1));                                                      
    var p2 = new LatLon(parseFloat(lat2), parseFloat(lng2));                                                      
    var bearing = p1.bearingTo(p2); 
    if (bearing>=22.5 && bearing<67.5)
        return "North East";
    else if (bearing>=67.5 && bearing<12.5)
        return "East";
    else if (bearing>=112.5 && bearing<157.5)
        return "South East";
    else if (bearing>=157.5 && bearing<202.5)
        return "South";
    else if (bearing>=202.5 && bearing<247.5)
        return "South West";
    else if (bearing>=247.5 && bearing<292.5)
        return "West";
    else if (bearing>=292.5 && bearing<337.5)
        return "North West";
    else
        return "North"; 
}
