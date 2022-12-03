<?php $title = 'Create'; 

require_once('models/DataBase.php');
require_once('models/Delete.php');

?>

<?php ob_start(); ?>

<?php

    $id = $_GET['ide'];

    /* Database connection */
    $gestion = new Delete();
    $conferencesDelete = $gestion->deleteConference($id);
  
?>
    
<?php $content = ob_get_clean(); ?>