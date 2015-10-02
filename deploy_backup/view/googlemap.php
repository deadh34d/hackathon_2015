<div id="map"></div>
<?php require_once('model/geocoder.class.php'); ?>
<?php require_once('model/home.class.php'); ?>
<script>
    <?php
        $lat = 0;
        $lng = 0;
        if(isset($home)){
            if($home['x_coord'] != null && $home['y_coord'] != null){
                $lat = $home['x_coord'];
                $lng = $home['y_coord'];
            }else{ //this should not have to happen often at all,
                 $geocoder = new Geocoder($home['street_number'] . ' ' . $home['street_name']
                                . ' - ' . $home['city'] . ', ' . $home['state']
                                . ' ' . $home['zip_code']);
                $geoArray = $geocoder->returnArray();
                $lat = $geoArray->results[0]->geometry->location->lat;
                $lng = $geoArray->results[0]->geometry->location->lng;

            }
        }






    ?>


    function initMap() {

        var myLatLng = {lat:<?php echo $lat; ?>, lng: <?php echo $lng; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: "<?php echo $home['street_number'] . ' ' . $home['street_name'].
                " " . $home['city'] . ', ' . $home['state']
                . ' ' . $home['zip_code'];?>"
        });
    }
</script>
