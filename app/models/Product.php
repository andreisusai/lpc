<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProductById($id)
    {
        $this->db->query("SELECT * FROM produit WHERE id_produit = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getSearchingProduct($standard)
    {
        $this->db->query("SELECT * FROM produit 
        WHERE titre LIKE CONCAT('%',:standard,'%') 
        OR couleur LIKE CONCAT('%',:standard,'%') 
        OR categorie LIKE CONCAT('%',:standard,'%')
        OR reference LIKE CONCAT('%',:standard,'%')");

        $this->db->bind(':standard', $standard);

        $results = $this->db->resultset();
        if ($this->db->rowCount() > 0) {
            return $results;
        } else {
            return false;
        }
    }

    public function getProductCartById($id)
    {
        $this->db->query("SELECT categorie, titre, photo, prix FROM produit WHERE id_produit = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getProductsSuggestions($id, $categorie)
    {
        $this->db->query("SELECT *  FROM produit
        WHERE titre = :titre AND id_produit != :id");

        $this->db->bind(':id', $id);
        $this->db->bind('titre', $categorie);

        $row = $this->db->resultset();

        return $row;
    }
}
