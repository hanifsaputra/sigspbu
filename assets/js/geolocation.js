// function getLocation() {
//     if (navigator.geolocation) {
//         var options = {
//             timeout: 60000 // 60000 milliseconds (60 seconds)
//         };
//         navigator.geolocation.getCurrentPosition(getCoordinate, errorHandler, options);
//     } else {
//         alert('Sorry, browser does not support geolocation!');
//     }
// }

// function errorHandler(err) {
//     if (err.code = 1) {
//         alert('ERROR: Access is denied');
//     } else if (err.code = 2) {
//         alert('Error: Position is unavailable');
//     }
// }

// function getCoordinate(position) {
//     var lat = position.coords.latitude;
//     var lng = position.coords.longitude;
//     var latlng = [lat.toString(), lng.toString()];
//     document.cookie = "lat=" + lat;
//     document.cookie = "lng=" + lng;
// }