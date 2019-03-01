function DOMLoaded() {
	
		document.addEventListener("deviceready", phonegapLoaded, false);
	
}

function phonegapLoaded() {
	
	navigator.geolocation.getCurrentPosition(OnSuccess);
	
	
}

function onSuccess(postion) {

			alert("Timestamp" + new Date(position.timestamp));
}