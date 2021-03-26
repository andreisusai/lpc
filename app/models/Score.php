<?php

class Score
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setScores($data)
    {

        $this->db->query("INSERT INTO avis VALUES (NULL, :id_produit, :id_membre, :avis, :rating)");

        $this->db->bind(':id_produit', $data["product_id"]);
        $this->db->bind(':id_membre', $data["user_id"]);
        $this->db->bind(':avis', $data["avis"]);
        $this->db->bind(':rating', $data["rate"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getScores($id)
    {

        $this->db->query("SELECT avis.id, avis.id_produit, avis.id_membre, avis.avis, avis.rating, membre.pseudo FROM avis JOIN membre WHERE avis.id_produit = :id_produit AND avis.id_membre = membre.id_membre");

        $this->db->bind(':id_produit', $id);

        $row = $this->db->resultset();

        return $row;
    }
}
