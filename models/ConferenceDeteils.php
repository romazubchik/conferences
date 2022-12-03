<?php

class ConferenceDeteils extends DataBase
{
        /* Query to the database by ID */
        public function dataConference($conference_id)
        {
            $db = $this->dbConnect();
            $requestConference = "SELECT * FROM conferences_all WHERE id = '$conference_id'";
            $countConferences = $db->prepare($requestConference);
            $countConferences->execute();
            $conferences = $countConferences->fetchAll();

            return $conferences;
        }
}