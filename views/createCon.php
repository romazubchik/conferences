<?php $title = 'Create Con'; ?>

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

    <h1 class="px-4 text-center my-3"> Create Conference </h1>

    <form action="index.php?page=create" method="post" class="was-validated">
        <div class="container text-center p-5 my-5">
            <div class="col">
                <b><label for="uname">Title Conference</label></b>
                <input type="text" name="titles" class="form-control" min="2" max="255" id="uname" placeholder="Name your conference" required>
                <div class="invalid-feedback">
                    Please enter a name conference (min: 2, max: 255 characters).
                </div>
            </div>
            <div class="container text-center">
            <div class="m-auto col-4 my-3">
                <b><label for="startDate">Date Conference</label></b>
                <input id="startDate" name="date" class="form-control" type="date" required>
                <div class="invalid-feedback">
                    Please enter a date conference.
                </div>
            </div>
            <div class="m-auto col-4 my-3">
                <b><b><label>Address:</label></b></b><br>
                <b><label for="latitude">Latitude</label></b>
                <input type="text" name="latitude" class="form-control" id="la" value="20.00" required>
                <b><label for="longitude">Longitude</label></b>
                <input type="text" name="longitude" class="form-control" id="lo" value="84.00" required>
            </div>
            <div id="map"></div>
            <div class="m-auto col-4 my-3">
                <b><label for="formControlSelect">The <b>country</b> in which the conference will take place</label></b>
                <select name="country" class="form-control" id="formControlSelect">
                    <option>Ukraine</option>
                    <option>USA</option>
                    <option>Germany</option>
                    <option>Italy</option>
                    <option>Spain</option>
                </select>
            </div>  
            </div>  

            <div class="form-group row">
                <div class="col">
                    <button type="submit" name="add" class="btn btn-primary col-4 p-1 my-3">Save</button>
                </div>
                <div class="col">
                    <button name="back" onclick="window.location.href='index.php?page=home'" class="btn btn-primary col-4 p-1 my-3">Back</button>
                </div>
            </div>
        </div>
    </form>
 
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