<?php 

session_start();

require_once('controllers/mainController.php');

try
{
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'update')
        { 
            update();
        }
    }
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'createCon')
        { 
            createCon();
        }
    }
    if(isset($_GET['id']))
    {
        if($_GET['id'])
        { 
            conferenceDeteils();
        }
    }
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'create')
        { 
            create();
        }
    }
    if(isset($_GET['identificator']))
    {
        if($_GET['identificator'])
        { 
            updateConference();
        }
    }
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'delete')
        { 
            delete();
        }
    }
    
    home();
}
catch(Exception $e) 
{
    echo 'Error : ' . $e->getMessage();
}

