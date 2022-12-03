<?php $title = 'Update Conference'; 

    require_once('models/DataBase.php');
    require_once('models/UpdateConference.php');

    $update_id = $_GET['identificator'];

    $gestion = new UpdateConference();
    $conferenceDeteils = $gestion->selectDateForUpdate($update_id);
?>

<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
    <style type="text/css">
            /* Set a size for our map container, the Google Map will take up 100% of this container */
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
</head>
<body>

    <h1 class="px-4 text-center my-3"> Update Conference </h1>

    <form action="index.php?page=update" method="post" class="was-validated">
        <div class="container text-center p-5 my-5">
            <div class="col">
                <input hidden name="id" value="<?= $update_id?>">
                <b><label for="uname">Title Conference</label></b>
                <input type="text" name="titles" class="form-control" value="<?= $conferenceDeteils[1]?>" id="uname" placeholder="Name your conference" required>
                <div class="invalid-feedback">
                    Please enter a name conference (min: 2, max: 255 characters).
                </div>
            </div>
            <div class="container text-center">
            <div class="m-auto col-4 my-3">
                <b><label for="startDate">Date Conference</label></b>
                <input id="startDate" name="date" value="<?= $conferenceDeteils[2]?>" class="form-control" type="date" required>
                <div class="invalid-feedback">
                    Please enter a date conference.
                </div>
            </div>

            <!-- Checking whether there is an address for the Google map -->
            <?php 
                $map = $conferenceDeteils[4];
                if($map) {
            ?>
                <div class="m-auto col-4 my-3">
                    <b><b><label>Address:</label></b></b><br>
                    <b><label for="latitude">Latitude</label></b>
                    <input type="text" name="latitude" class="form-control" id="la" value="<?= $conferenceDeteils[4]?>" required>
                    <b><label for="longitude">Longitude</label></b>
                    <input type="text" name="longitude" class="form-control" id="lo" value="<?= $conferenceDeteils[5]?>" required>
                </div>
                <div id="map"></div>
            <?php
                } else {
                    ?>
                    <div class="m-auto col-4 my-3">
                        <b><b><label>Address:</label></b></b><br>
                        <b><label for="latitude">Latitude</label></b>
                        <input type="text" name="latitude" class="form-control" id="la" value="20.00" required>
                        <b><label for="longitude">Longitude</label></b>
                        <input type="text" name="longitude" class="form-control" id="lo" value="80.00" required>
                    </div>
                <div id="map"></div>

            <?php
                }
            ?>
            <div class="m-auto col-4 my-3">
                <b><label for="formControlSelect">The <b>country</b> in which the conference will take place</label></b>
                <input name="country" value="<?= $conferenceDeteils[3]?>" class="form-control" id="formControlSelect">
                </select>
            </div>  
            </div>  

            <div class="form-group row">
                <div class="col">
                    <button type="submit" name="update" class="btn btn-primary col-6 p-1 my-3">Save</button>
                </div>
            </div>
        </div>
    </form>
    <div class="form-group row text-center">
        <div class="col">
            <button onclick="window.location.href='index.php?page=delete&ide=<?= $update_id ?>'" class="btn btn-primary col-6 p-1 my-3">Delete Conference</button>
        </div>
        <div class="col">
            <button name="back" onclick="window.location.href='index.php?page=home'" class="btn btn-primary col-6 p-1 my-3">Back</button>
        </div>
    </div>

        <!--Google Map API Link-->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSDeFOTyZLrDtE4eUCraXE6WDHIIVs3zw&callback=initMap"></script>

         <!-- I am connecting the script here, because the map is not displayed when exported to a separate file -->
        <script type="text/javascript">

            let latitude = Number(document.querySelector("#la").value);
            let longitude = Number(document.querySelector("#lo").value);

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
                draggable: true,
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

<?php require_once('views/template.php');