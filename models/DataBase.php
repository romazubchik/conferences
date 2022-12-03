<?php 

/*  Function to connect to the database */
class DataBase
{
    /*  Variables to be modified in case of change of host  */
    private $host = 'localhost';
    private $database = 'Conferences';
    private $charset = 'utf8';
    private $user = 'root';
    private $password = '';

    /*  The protected keyword that all declared/defined properties/methods are 
        not accessible from the outside but can be inherited by child classes */
    protected function dbConnect()
    {
        try{
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset='.$this->charset, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
        catch(PDOException $e)
        {
            echo "Error conection", $e->getMessage();
            $db = null;
            exit();
        }
    }
}

