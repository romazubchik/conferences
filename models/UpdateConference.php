<?php

class UpdateConference extends DataBase
{
    /* Updating the term in the database */
    public function updateDB($id, $title, $date, $country, $latitude, $longitude){
        $db = $this->dbConnect();
        $requestConference = "UPDATE conferences_all 
                            SET title = :title, date = :date, country = :country, latitude = :latitude, longitude = :longitude 
                            WHERE conferences_all.id = :id";
        $updateConferences = $db->prepare($requestConference);
        $updateConferences->bindParam(':id', $id);
        $updateConferences->bindParam(':title', $title);
        $updateConferences->bindParam(':date', $date);
        $updateConferences->bindParam(':country', $country);
        $updateConferences->bindParam(':latitude', $latitude);
        $updateConferences->bindParam(':longitude', $longitude);
        $updateConferences->execute();

        header('Location: /');
    }

    /* Query to the database by ID */
    public function selectDateForUpdate($id){
        $db = $this->dbConnect();
        $requestConference = "SELECT * FROM conferences_all WHERE id = :id";
        $details = $db->prepare($requestConference);
        $details->bindParam(':id', $id);
        $details->execute();
        $dateForUpdate = $details->fetch();
        return $dateForUpdate;
    }

    /* Deleting a term from the database */
    public function deleteConference($id){
        $db = $this->dbConnect();
        $requestConference = "DELETE FROM conferences_all WHERE id = :id";
        $delete = $db->prepare($requestConference);
        $delete->bindParam(':id', $id);
        $delete->execute();

        header('Location: /');
    }
}