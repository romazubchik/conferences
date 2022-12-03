
<?php $title = 'Update'; 

require_once('models/DataBase.php');
require_once('models/UpdateConference.php');

?>

<?php ob_start(); ?>

<?php
    $id = $_POST['id'];
    $title = $_POST['titles'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    /* Database connection */
    $gestion = new UpdateConference();
    $conferences = $gestion->updateDB($id, $title, $date, $country, $latitude, $longitude);
?> 

<?php $content = ob_get_clean(); ?>

<?php require_once('views/template.php');