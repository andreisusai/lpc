<?php
class Man
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTShirts()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 't-shirts' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getpantalon()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'pantalon' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getpull()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'pull' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getmanteau()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'manteau' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getsneakers()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'sneakers' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getboots()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'boots' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getdeville()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'deville' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getecharpes()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'echarpes' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getmontres()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'montres' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getnewVetements()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'nouveautesv' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getnewChaussures()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'nouveautesc' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }

    public function getnewAccessoires()
    {
        $this->db->query("SELECT * FROM produit WHERE titre = 'nouveautesa' AND categorie = 'hommes'");

        $results = $this->db->resultset();

        return $results;
    }
}
