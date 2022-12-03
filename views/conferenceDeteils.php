<?php $title = 'Home Conferences'; 

    require_once('models/DataBase.php');
    require_once('models/ConferenceDeteils.php');

?>

<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
    <style type="text/css">
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

    <section>

        <!-- Connecting to the database and displaying it on the screen -->
        <?php 
            $conference_id = $_GET['id'];
            $gestion = new ConferenceDeteils();
            $conferences = $gestion->dataConference($conference_id);
        ?>

        <div class="container my-5">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5  align-items-center rounded-3 border shadow-lg">
                <div class="px-2 py-3 my-3 text-center">
                    <h1 class="display-5 fw-bold"> <?= $conferences[0][1]?></h1>
                    <h3 class="lead mb-4"> Date: <?= $conferences[0][2]?></h3>
                    <h3 class="lead mb-4"> Country: <?= $conferences[0][3]?></h3> 
                </div>
            </div>
        </div>

        <!-- Checking whether there is an address for the Google map -->
        <?php 
            $map = $conferences[0][4];
         if($map) {
        ?>
            <h3 class="text-center lead mb-4"> Address in Google Map:</h3>
            <div id="map"></div>
        <?php
         }
        ?>
        
        <!-- I hide inputs, and take from them latitude and longitude -->
        <div hidden>
            <input type="text" name="latitude" class="form-control" id="la" value="<?= $conferences[0][4]?>" required>
            <b><label for="longitude">Longitude</label></b>
            <input type="text" name="longitude" class="form-control" id="lo" value="<?= $conferences[0][5]?>" required>
        </div>

        <div class="form-group row text-center">
            <div class="col">
                <button name="back" onclick="window.location.href='index.php?identificator=<?= $conferences[0][0]?>'" class="btn btn-primary col-4 p-1 my-3">Update</button>
            </div>
            <div class="col">
                <button onclick="window.location.href='index.php?page=delete&ide=<?= $conference_id ?>'" class="btn btn-primary col-4 p-1 my-3">Delete Conference</button>
            </div>
        </div>
    
    </section>

    <!--Google Map API Link-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSDeFOTyZLrDtE4eUCraXE6WDHIIVs3zw&callback=initMap"></script>

    <!-- I am connecting the script here, because the map is not displayed when exported to a separate file -->
    <script type="text/javascript">

        let latitude = Number(document.querySelector("#la").value);
        let longitude = Number(document.querySelector("#lo").value);

        /* Creating a control marker */
        function initMap() {

        let uluru = {
            lat: latitude,
            lng: longitude
        };
        let map = new google.maps.Map(document.querySelector('#map'), {
            zoom: 7,
            center: uluru
        });
        marker = new google.maps.Marker({
            map: map,
            draggable: false, //does not allow you to change the marker
            animation: google.maps.Animation.DROP,
            position: uluru
        });
        google.maps.event.addListener(marker, 'dragend',
            function(marker) {
                let latLng = marker.latLng;
                currentLatitude = latLng.lat();
                currentLongitude = latLng.lng();
                $("#la").val(currentLatitude);
                $("#lo").val(currentLongitude);
            }
        );
        } 
    </script>
</body>
</html>   

<?php $content = ob_get_clean(); ?>

<?php require_once('views/template.php');?>