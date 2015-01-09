var geocoder;
var map;
var markers = [];
var strLatLng;
var southWest;
var northEast;
var bounds;
function initialize() {

	this.lat = 32.75;
	this.lng = -97.13;
	geocoder = new google.maps.Geocoder();
	this.myCenter = new google.maps.LatLng(this.lat, this.lng);
	this.mapProp = {
		center : myCenter,
		zoom : 16,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// Add a marker to the map and push to the array.
function addMarker(location, icons) {
	var url = "https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld="
			+ icons + "|FF776B|000000";
	var marker = new google.maps.Marker({
		position : location,
		map : map,
		icon : url
	});
	markers.push(marker);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
	setAllMap(null);
}
// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
	clearMarkers();
	markers = [];
}

function sendRequest() {

	bounds = map.getBounds();
	southWest = bounds.getSouthWest();
	northEast = bounds.getNorthEast();
	strLatLng = southWest + '|' + northEast;
	strLatLng = ((strLatLng.split(' ').join('')).split('(').join(''))
			.split(')').join('');

	var xhr = new XMLHttpRequest();
	var searchTerm = (document.getElementById('search').value).trim();
	var replacedSearchStr = searchTerm.split(' ').join('+');
	// xhr.open("GET",
	// "proxy.php?term="+replacedSearchStr+"&location=Arlington+Texas&limit=10");
	// api.yelp.com/v2/search?term=food&bounds=37.900000,-122.500000|37.788022,-122.399797&limit=10
	xhr.open("GET", "proxy.php?term=" + replacedSearchStr + "&bounds="
			+ strLatLng + "&limit=10");

	xhr.setRequestHeader("Accept", "application/json");
	xhr.onreadystatechange = function() {
		if (this.readyState == 4) {
			var json = JSON.parse(this.responseText);
			var str = JSON.stringify(json, undefined, 2);

			var obj = eval("(" + str + ")");
			displayResults(obj);
		}
	};
	xhr.send(null);
}

function displayResults(obj) {
	deleteMarkers();
	document.getElementById("output").innerHTML = '';
	document.getElementById("output").style.display = "none";
	if (obj.total > 0) {
		if (this.marker != null)
			this.marker.setMap(null);

		var count = 1;
		this.str = '';
		if (obj.total > 10) {
			obj.total = 10;
		}
		for (var i = 0; i < obj.total; i++) {
			var image = '<img alt="No Image" style="width:30%; height:40%;" src="'
					+ obj.businesses[i].image_url + '">';
			// var name= '<a href="'+obj.businesses[i].url+'"
			// style="text-decoration:none;">'+count+')
			// &nbsp;'+obj.businesses[i].name+'</a>';
			var name = '<a href="' + obj.businesses[i].url
					+ '" style="text-decoration:none;">'
					+ obj.businesses[i].name + '</a>';
			var rating_url = '<img alt="resultStar' + count
					+ '" style="width:10%; " src="'
					+ obj.businesses[i].rating_img_url + '">';
			var snippet = '<div >' + obj.businesses[i].snippet_text + '</div>';
			this.str = this.str + '<li>' + name + rating_url + '<br>' + image
					+ snippet + '</li>';

			var icons = count;
			var address = obj.businesses[i].location.address + ' '
					+ obj.businesses[i].location.city + ' '
					+ obj.businesses[i].location.state_code + ' '
					+ obj.businesses[i].location.postal_code;

			var num = obj.total;
			geocoder
					.geocode(
							{
								'address' : address
							},
							function(results, status) {

								if (status == google.maps.GeocoderStatus.OK) {
									var marker = new google.maps.Marker(
											{
												map : map,
												position : results[0].geometry.location,
												// title: name,
												icon : "https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld="
														+ num
														+ "|FF776B|000000"

											});
									markers.push(marker);
								} else {
									alert("Geocode was not successful for the following reason: "
											+ status);
								}

								num--;
							});

			count++;
		}

		document.getElementById("output").innerHTML = '<ol style=" width:700px; border: 1px inset; border-radius: 5px; position: relative; background-color: rgb(255, 255, 255); font-family: Palatino Linotype;">'
				+ str + '</ol>';
		document.getElementById("output").style.display = "block";
	} else {

		document.getElementById("output").innerHTML = '<h1>No result found</h1>';
		document.getElementById("output").style.display = "block";
	}
}