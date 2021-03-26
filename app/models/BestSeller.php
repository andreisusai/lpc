<?php

class BestSeller
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getbestseller()
    {
        $this->db->query("SELECT * FROM produit JOIN bestseller ON produit.id_produit = bestseller.id_produit_bestseller ORDER BY titre, quantite DESC
        ");

        $results = $this->db->resultset();

        return $results;
    }
}
