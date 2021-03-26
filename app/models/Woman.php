<?php
class Woman
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all Blouses
    public function getBlouses()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'blouses' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    // Get all chemises
    public function getchemise()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'chemise' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    // Get all t-shirts
    public function getTShirt()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 't-shirt' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    // Get all t-shirts
    public function getpantalon()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'pantalon' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    // Get all pulls
    public function getpull()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'pull' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    // Get all escarpins
    public function getescarpins()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'escarpins' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getbalerinnes()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'balerinnes' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getbottes()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'bottes' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getbaskets()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'baskets' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getsacs()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'sacs' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getecharpes()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'echarpes' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getceintures()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'ceintures' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getmontres()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'montres' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getbijoux()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'bijoux' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getnewVetements()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'nouveautesv' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getnewChaussures()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'nouveautesc' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getnewAccessoires()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'nouveautesa' AND categorie = 'femmes'");

        $results = $this->db->resultset();

        return $results;
    }
}
