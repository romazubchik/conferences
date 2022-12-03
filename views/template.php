<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Conferences, Conferenc, Conferences Kyiv, Stand Up ">
        <link rel="stylesheet" href="public/styles/css/cleaned/main.css">
        <title><?= 'Conferences'.$title ?></title>
    </head>
    <body class="bodySize w-100 h-100 bg-whiteness">
        
        <div class="container-fluid bodySize m-0 p-0 bg-white">
            <?php require('views/widgets/navbar.php'); ?> 
            <?= $content; ?>
            <?php require('views/widgets/footer.php'); ?>

        </div>

        <!-- Importating the script for bootstrap 5  -->
        <script src="public/scripts/bootstrap/bootstrap.bundle.js" type="text/javascript"></script>    
    </body>
</html>
