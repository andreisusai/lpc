<?php

class Profile
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function updateUserProfile($data)
    {

        $this->db->query("UPDATE membre 
                            SET pseudo = :pseudo,
                                civilite = :civilite,
                                nom = :nom,
                                prenom = :prenom,
                                adresse = :adresse,
                                code_postal = :code_postal,
                                ville = :ville
                            WHERE id_membre = :id_membre");

        $this->db->bind(':pseudo', $data['pseudo']);
        $this->db->bind(':civilite', $data['civilite']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':code_postal', $data['code_postal']);
        $this->db->bind(':ville', $data['ville']);
        $this->db->bind(':id_membre', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByPassword($id, $old_password)
    {

        $this->db->query("SELECT * FROM membre WHERE id_membre = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        $hashed_password = $row->mdp;

        if (password_verify($old_password . SALT, $hashed_password)) {
            return true;
        } else {
            return false;
        }
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

    public function updateUserImage($data)
    {

        $this->db->query("UPDATE membre SET photo = :image WHERE id_membre = :id");

        $this->db->bind(':image', $data["user_image"]);
        $this->db->bind(':id', $data["user_id"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function removeImage($data)
    {

        $this->db->query("UPDATE membre SET photo = NULL WHERE id_membre = :id");

        $this->db->bind(':id', $data["user_id"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
