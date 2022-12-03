<?php $title = 'Home Conference'; 

require_once('models/DataBase.php');
require_once('models/Home.php');

?>

<?php ob_start(); ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <section>

    <h1 class="px-4 py-5 my-5 text-center">All conferences</h1>

    <!-- Connecting to the database and displaying it on the screen -->
        <?php 
            $gestion = new Home();
            $conferences = $gestion->dataConference();
            

            foreach($conferences as $conference) { 
                ?>  
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 text-center align-items-center rounded-3 border shadow-lg">
                        <h1 onclick="window.location.href='index.php?id=<?= $conference[0] ?>'" class="display-4 fw-bold "><?= $conference[1] ?></h1>
                        <p onclick="window.location.href='index.php?id=<?= $conference[0] ?>'" class="lead mb-4"> Date: <?= $conference[2] ?></p>
                        <button onclick="window.location.href='index.php?page=delete&ide=<?= $conference[0] ?>'" style="margin: 10px; width: 1250px;" class="btn btn-primary btn-lg">Delete Conference</button>
                    </div>
                </div>
                <?php
            }
        ?>
    <div class="container my-5">
        <div class="row align-items-center rounded-3 border shadow-lg">
            <button onclick="window.location.href='index.php?page=createCon'" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Create Conference</button>
        </div>
    </div>
    
    </section>

<?php $content = ob_get_clean(); ?>

<?php require_once('views/template.php');?>