  
<?php //include "inc/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="http://www.palembang.go.id/images/favicon.png">
<title>SISTEM INFORMASI GEOGRAFIS SPBU YOGYAKARTA</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.css">
<link rel="stylesheet" type="text/css" href="assets/css/custum.css">
<style type="text/css">
  body {
    padding-top: 5px;
  }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3naoO_66yu6vUnkMa8LPrt-RueSqy7SY  
"></script>
<script type="text/Javascript">

    var locations = 

      [
        <?php
          include "inc/conn.php";
          
          $kon  = mysql_connect($host, $user, $pass) or die ("EROOR");
          
          $dbsel  = mysql_select_db($db, $kon) or die ("TIDAK TERPILIH".mysql_error());

          if(isset($_POST['cari'])){
							$keyword = $_POST['cari'];
							$jenis = $_POST['jenis'];
							$keyto   = strtolower($keyword);
							$jml	=count($jenis);
							$query1="";
							
							for($x=0;$x<$jml;$x++){
								$query1.=$query1." Select spbu.id_spbu as id,nama_spbu as nama,alamat as lokasi,latitude as latitude1,longitude as longitude1, gambar_spbu as gambar from spbu, spbu_fasilitas where spbu.id_spbu=spbu_fasilitas.id_spbu and spbu_fasilitas.id_fasilitas=$jenis[$x]  union";
							}
							$query = substr($query1, 0, -5);
              $qu = mysql_query($query);
              while($row=mysql_fetch_object($qu)){
              $icone ='assets/icon/1.png';                    
                ?>
                  ['<div class="media"><div class="media-left"><a href="#"><img style="width:125px; height:90px;" class="media-object" src="assets/images/<?= $row->gambar;?>" alt="..."></a></div><div class="media-body"><h4 class="media-heading"><?= $row->nama ;?><br><p style="font-size:12px;color: #767676;"><div class="addr"><?= $row->lokasi;?></div><div id="telpon"><i class="fa fa-hand-o-right"></i> </div><div id="lat"><?= $row->latitude1;?></div><div id="lng"><?= $row->longitude1;?></div></p></h4><br><div id="more_detail"><h5><a href="javascript:click_route()">Rute</a> | <a target="_blank" href="detail_spbu.php?id_spbu=<?=$row->id;?>">Detail</a></h5></div></div></div>',<?php echo $row->latitude1;?>, <?php echo $row->longitude1;?>,'<?php echo $icone;?>'],
                <?php
                    }
                }
                ?>  
         
      ];

      
  // HTML5 GEOLOCATION from
    
    var my_lat, my_lng;
    var directionsDisplay;
    var directionsDisplay = new google.maps.DirectionsRenderer(); 
    var directionsService = new google.maps.DirectionsService(); 
    var GeoMarker;
    
    var geocoder;
    var map;
    
    //var directionsService = new google.maps.DirectionsService(); 


  /*
    fungsi yang digunakan untuk mendeteksi browser apakah mendukung HTML5 Geolocation.
  */

    function getLocation() {
        if (navigator.geolocation) {
            var options = {
                timeout: 60000 // 60000 milliseconds (60 seconds)
            };
            navigator.geolocation.getCurrentPosition(getCoordinate, errorHandler, options);
        } else {
            alert('Sorry, browser does not support geolocation!');
        }
    }

  /*
    fungsi untuk menangani error pada geolocation
  */
    function errorHandler(err) {
        if (err.code = 1) {
            alert('ERROR: Access is denied');
        } else if (err.code = 2) {
            alert('Error: Position is unavailable');
        }
    }


    /*
  fungsi untuk mengambil koordinat lat & long.
   */
  
    function getCoordinate(position) {
        my_lat = position.coords.latitude;
        my_lng = position.coords.longitude;

      // rubah lat & lng ke alamat yang mudah dibaca
      codeLatLng(my_lat, my_lng);

        // simpan koordinat lat & lng dalam cookie
        document.cookie = "lat="+ position.coords.latitude;
          document.cookie = "lng="+ position.coords.longitude;

    }

    function click_route() {
      // menampilkan halaman form petunjuk arah.
      $('#route').show();
      $('#list-view').hide();

      /*
      sembunyikan form pencarian, tombol cari wisata terdekat, daftar hasil pencarian dan teks atau.
       */
      $('#list-view').hide();
      $('#text-info, #text-info-1').hide();
      $('#search').hide();
      $('#or').hide();
      $('#cari_aku').hide();
      $('#label_jarak').hide();
      $('#jarak_rute').hide();

      // ambil data alamat di haisl query
      var address = $('.addr').html();

      // ambil data lat & lng
      var lat = $('#lat').html();
      var lng = $('#lng').html();

      // merubah value tujuan akhir
      $('#end_point').html(address);

      


      $('#petunjuk').click(function() {

        // tujuan awal.
        var from = new google.maps.LatLng(my_lat, my_lng);

        // tujuan akhir.
        var to = new google.maps.LatLng(lat,lng);

        console.log('tujuan awal');
        console.log(my_lat);
        console.log(my_lng);
        console.log('tujuan akhir');
        console.log(lat);
        console.log(lng);
        calcRoute(from, to);
        $('#label_jarak').show();
        $('#jarak_rute').show();
      });
    }


    function codeLatLng(lat, lng){
      var latLng  = new google.maps.LatLng(lat,lng);
      geocoder.geocode({'latLng' : latLng}, function(result, status){
        if(status == google.maps.GeocoderStatus.OK){
          if(result[1]){
            var addr = result[1].formatted_address;
            $('#tujuan_awal').html(addr);
          }
        }
      });
    }


    

    function calcRoute(from,to) {
        var request = {
        origin : from,
        destination : to,
        travelMode : google.maps.TravelMode.DRIVING
      };

      directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(response);
          computeTotalDistance(directionsDisplay.getDirections());
        }
      });
      }


    /*
      * Fungsi untuk menghitung jarak pada rute.
    */

    
      function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
      // console.log(total);
      total = total / 1000.0;

      $('#label_jarak').html('<label>Jarak Tempuh</label>');
      $('#jarak_rute').html('' + total.toPrecision(2) + ' km');
      }
    

  /************************************************************************************/


    function initialize() {

      getLocation();
      directionsDisplay = new google.maps.DirectionsRenderer();
      geocoder = new google.maps.Geocoder();
		
    // position center map
      var latmeLng = new google.maps.LatLng(-7.783920,110.367120);
    // tempat menaruh map

    //map options
      var mapOptions = {
        center: latmeLng,
        zoom: 13,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
		
		
		
          };
          
          var map = new google.maps.Map(document.getElementById('map'), mapOptions);

      // add direction display
          directionsDisplay.setMap(map);
          directionsDisplay.setPanel(document.getElementById('dalan'));

        
      /*
      *******************************************************************************
      */
        $(function() {
          <?php if(isset($_POST['cari_aku'])) {
              $jarak = $_POST['radius'];
                
                $latme = $_COOKIE['lat'];
                  
                $longme = $_COOKIE['lng'];
              // proses pencarian wisata terdeket.
              $sql = "SELECT id, nama, lokasi, latitude1, longitude1, gambar, jenis,
                            (6371 * acos(cos(radians({$latme})) 
                            * cos(radians(latitude1)) * cos(radians(longitude1) 
                            - radians({$longme})) + sin(radians({$latme})) 
                            * sin(radians(latitude1)))) 
                            AS jarak
                      FROM data
                      HAVING jarak <= {$jarak}
                      ORDER BY jarak

                    ";

                $query = mysql_query($sql);

              for ($i=0; $i < $list=mysql_num_rows($query); $i++) { 
            ?>
                $('.list-view-<?= $i ?>').click(function(){
                  var latlng = $('.list-view-<?= $i ?>').attr('latlng');
                  var latlngArray = latlng.split(',');
                  var lat = latlngArray[0].toString();
                  var lng = latlngArray[1].toString();
                  map.setCenter(new google.maps.LatLng(lat,lng));
                  map.setZoom(27);
                });
            <?php 
                } 
            ?>
            <?php 
            } 
            ?>
          
            $('#route').css('display', 'none');

            $('#back').click(function() {
              // hapus rute
              directionsDisplay.setMap(null);

              $('#list-view').show();
              $('#text-info, #text-info-1').show();
              $('#route').hide();
              $('#or').show();
          $('#cari_aku').show();
              $('#search').show();
            });
          });
          
          var infowindow = new google.maps.InfoWindow({
            maxWidth  :400,
            maxHeight :250
          });

          
          var marker, i;
         /* kode untuk menampilkan banyak marker locations[i][3]*/
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              map: map,
              icon:locations[i][3],
            animation: google.maps.Animation.DROP
            });
         

         /* menambahkan event clik untuk menampikan infowindows dengan isi sesuai dengan marker yang di klik */
         
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));


          }
        

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    </script>
     
</head> 
<body onload="initialize()"> 
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:#000;" href="<?php echo $link;?>"><i class="fa fa-plus-square" style="color:red;"></i>SISTEM INFORMASI GEOGRAFIS SPBU YOGYAKARTA</a>
    </div>
  </div>
   <hr>
  <div class="container">
   
    <div class="row">
      <div class="col-lg-9">
        <div id="map" style="width:100%; height:480px;"></div>
      </div>

      <div class="col-lg-3">
        <div class="form-group" id="search">
              
          <form name="form1" action="index.php" method="post" >
          <br>
          <h2>Cari Berdasarkan Fasilitas</h2>
          <div id="search" class="input-group">

            <input type="text" name="cari"  class="form-control" placeholder="Nama Wisata" style="display:none;">

          </div>
          <div name="checkbox">
            <input type="checkbox" style="display: none;" name="jenis[]" value="212" checked>
            <?php 
              $sql="Select id_fasilitas,nama_fasilitas from fasilitas";
              $query = mysql_query($sql);
              while ($rows=mysql_fetch_array($query)) { 
            ?>
              <input type="checkbox" name="jenis[]" value="<?php echo $rows['id_fasilitas'];?>" ><?php echo " ".$rows['nama_fasilitas'];?><br/>    
            <?php
              }
            ?>
          </div>
          <span class="input-group-btn">
          <button type="submit" name="search" class="btn btn-default">
          Search..
          </button>
          </span>
          </form>
          
        <div id="list-view">
              <?php
            if(isset($_POST['cari'])){
              $keyword = $_POST['cari'];
              $jenis = $_POST['jenis'];
              $keyto   = strtolower($keyword);
              $jml  =count($jenis);
              $query1="";
              
              for($x=0;$x<$jml;$x++){
                $query1.=$query1." Select spbu.id_spbu as id,nama_spbu as nama,alamat as lokasi,latitude as latitude1,longitude as longitude1, gambar_spbu as gambar from spbu, spbu_fasilitas where spbu.id_spbu=spbu_fasilitas.id_spbu and spbu_fasilitas.id_fasilitas=$jenis[$x]  union";
              }
              $query = substr($query1, 0, -5);
              $qu = mysql_query($query);
              $i = 0; $no = 1;
              $count = mysql_num_rows($qu);
              if ($count>=1){
                echo "Hasin Pencarian Terdapat ".$count." Buah Data<br>";
              } else {
                echo "Tidak Ada";
              }
              while($list=mysql_fetch_object($qu)){
              ?>
                <div class="list-view list-view-<?= $i++; ?>" latlng ="<?= $list->latitude1; ?>,<?= $list->longitude1; ?>">
                  <h3 class="pull-lelft titlepage" ><?php echo $no++; ?>. <?= $list->nama; ?></h3></a>
                  <p class="list-addr"><?= $list->lokasi;  ?></p>
                </div>

              <?php 
                  }
                }
              ?>
              
            </div>
        </div>
            <div id="route">
                
                <label for="from_point">Lokasi Awal</label>
                  <p id="tujuan_awal"></p>
                  <br>
                <label for="end_point">Lokasi Akhir</label>
                  <p id="end_point"></p>
                  <br>
                  <p id="label_jarak"></p>
                  <p id="jarak_rute"></p>
                  <br>
                <div class="form-group">
                  <input id="petunjuk" class="btn btn-primary" type="submit" value="Tampilkan Rute">
                  <a id="back" class="btn btn-danger">Kembali</a>
                </div>
                  <div id="dalan" style="overflow:scroll; max-height:200px;">
                  </div>
              </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <hr>
        <footer>
         <p>&copy; 2017 by <a href="">SISTEM INFORMASI GEOGRAFIS SPBU YOGYAKARTA</a></p>
        </footer>
      </div>
    </div>
  </div>
</body>
</html>