<?php

require_once('models/DataBase.php');

class Home extends DataBase
{
    public function dataConference()
    {
        /* Getting all the data from the database */
        $db = $this->dbConnect(); 
        $requestConference = "SELECT * FROM conferences_all";
        $countConferences = $db->prepare($requestConference);
        $countConferences->execute();
        $conferences = $countConferences->fetchAll();

        return $conferences;
    }
}