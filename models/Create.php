<?php

class Create extends DataBase
{
    /* Updating the term in the database */
    public function createDB($title, $date, $country, $latitude, $longitude){
        $db = $this->dbConnect(); 
        $requestConference = "INSERT INTO conferences_all( title, date, country, latitude, longitude) VALUES ( :title, :date, :country, :latitude, :longitude)";
        $addConferences = $db->prepare($requestConference);
        $addConferences->bindParam(':title', $title);
        $addConferences->bindParam(':date', $date);
        $addConferences->bindParam(':country', $country);
        $addConferences->bindParam(':latitude', $latitude);
        $addConferences->bindParam(':longitude', $longitude);
        $addConferences->execute();

        header('Location: /');
    }
}