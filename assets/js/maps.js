// function initialize() {
	
// 		// position center map
// 		var myLatLng = new google.maps.LatLng(-7.784218, 110.36663);

// 		//map options
//         var mapOptions = {
//           center: myLatLng,
//           zoom: 11,
//           streetViewControl: false,
//       	  mapTypeId: google.maps.MapTypeId.ROADMAP,
//           styles: [{"featureType":"water","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#f2f2f2"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"transit","stylers":[{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"on"}]}]
//         };

//          // tempat menaruh map
//         var map = new google.maps.Map(document.getElementById('map'), mapOptions);

//         $(function() {
//         	<?php for ($i=1; $i < count($data->result()); $i++) : ?>
//         	$('.list-view-<?= $i ?>').click(function(){
// 	        	var latlng = $('.list-view-<?= $i ?>').attr('latlng');
// 	        	var latlngArray = latlng.split(',');
// 	        	var lat = latlngArray[0];
// 	        	var lng = latlngArray[1];
// 	        	map.setCenter(new google.maps.LatLng(lat,lng));
// 	        	map.setZoom(17);
// 	        });
// 	        <?php endfor; ?>
// 	        $('#route').css('display', 'none');

// 	        $('#back').click(function() {
// 	        	$('#list-view').show();
// 	        	$('#route').hide();
// 	        	$('#search').show();
// 	        });
//         });
        
//         // setting maxWidth & maxHeight infowindow
//         var infowindow = new google.maps.InfoWindow({
// 	      maxWidth: 400,
// 		  maxHeight: 250
// 	    });

//         // marker 
//         for (var i = 0; i < locations.length; i++) {
//         	var marker = new google.maps.Marker({
//         		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//         		map: map,
//         		icon: 'http://localhost/apotek/assets/icon/hospital.png'
//        		});

// 	        // mouseover muncul InfoWindow
// 	        google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
// 		    return function() {
// 		    	infowindow.setContent(locations[i][0]);
// 		        infowindow.open(map, marker);
// 		    }
// 		    })(marker, i));
	       
// 	       // marker click buka tab baru
// 	        google.maps.event.addListener(marker, 'click', (function(marker, i) {
// 		        return function() {
// 		          window.open(locations[i][1], '_blank');
// 		        }
// 	      	})(marker, i));
//         }
// }
