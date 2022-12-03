<?php $title = 'Create'; 

    require_once('models/DataBase.php');
    require_once('models/Create.php');

?>

<?php ob_start(); ?>

<?php

    $title = $_POST['titles'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    /* Database connection */
    $gestion = new Create();
    $conferences = $gestion->createDB($title, $date, $country, $latitude, $longitude);
  
?>
    
<?php $content = ob_get_clean(); ?>