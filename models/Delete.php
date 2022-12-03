<?php

class Delete extends DataBase
{
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