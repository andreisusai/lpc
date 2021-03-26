<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add user / Register
    public function register($data)
    {

        // Prepare query
        $this->db->query("INSERT INTO membre VALUES (NULL,:pseudo,:mdp,:nom,:prenom,:email,:civilite, NULL, :ville,:code_postal,:adresse,0)");

        // Bind values
        $this->db->bind(':pseudo', $data['pseudo']);
        $this->db->bind(':mdp', $data['mdp']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':civilite', $data['civilite']);
        $this->db->bind(':ville', $data['ville']);
        $this->db->bind(':code_postal', $data['code_postal']);
        $this->db->bind(':adresse', $data['adresse']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM membre WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmailForgotPassword($email)
    {
        $this->db->query("SELECT * FROM membre WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    // Login / Authenticate User
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM membre WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->mdp;
        if (password_verify($password . SALT, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find User By ID
    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM membre WHERE id_membre = :id");
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Set Token Password Forgot
    public function setTokenPasswordForgot($token, $user_id_token, $timestamp_token)
    {

        // Prepare query
        $this->db->query("INSERT INTO reset_mdp_token VALUES (NULL, :token, :user_id_token, :timestamp_token)");

        // Bind values
        $this->db->bind(':token', $token);
        $this->db->bind(':user_id_token', $user_id_token);
        $this->db->bind(':timestamp_token', $timestamp_token);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getToken($token, $id)
    {

        $this->db->query("SELECT * FROM reset_mdp_token WHERE token = :tkn AND user_id_token = :id");

        $this->db->bind(':tkn', $token);
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function changeUserPassword($id, $newPassword)
    {

        $this->db->query("UPDATE membre SET mdp = :mdp WHERE id_membre = :id");

        $this->db->bind(':mdp', $newPassword);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function removeToken($id)
    {

        $this->db->query("DELETE FROM reset_mdp_token WHERE user_id_token = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
