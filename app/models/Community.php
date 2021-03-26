<?php

class Community
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEvents()
    {

        $this->db->query("SELECT * FROM events ORDER BY start_at DESC");

        $row = $this->db->resultset();

        return $row;
    }
}
