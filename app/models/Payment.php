<?php

class Payment
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function registerOrder($data)
    {
        // Prepare
        $this->db->query("INSERT INTO tbl_payment VALUES (NULL,:email, :item_number, :amount, :currency_code, :txn_id, :payment_status, :payment_response, CURRENT_TIMESTAMP)");

        // Bind
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':item_number', $data['item_number']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency_code', $data['currency_code']);
        $this->db->bind(':txn_id', $data['txn_id']);
        $this->db->bind(':payment_status', $data['payment_status']);
        $this->db->bind(':payment_response', $data['payment_response']);

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductById($id)
    {

        $this->db->query("SELECT * FROM produit WHERE id_produit = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function insertOrder($id, $total)
    {

        $this->db->query("INSERT INTO commande VALUES (NULL,:id_membre,:montant,NOW(),'en cours de traitement')");

        $this->db->bind(':id_membre', $id);
        $this->db->bind(':montant', $total);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function setOrderDetails($order_id, $product_id, $quantity, $prix)
    {

        $this->db->query("INSERT INTO details_commande VALUES (NULL,:id_commande,:id_produit,:quantite,:prix)");

        $this->db->bind(':id_commande', $order_id);
        $this->db->bind(':id_produit', $product_id);
        $this->db->bind(':quantite', $quantity);
        $this->db->bind(':prix', $prix);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function setStock($product_id, $quantity)
    {

        $this->db->query("UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit");

        $this->db->bind(':quantite', $quantity);
        $this->db->bind(':id_produit', $product_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function setBestSeller($product_id, $quantity)
    {
        $this->db->query("SELECT * FROM bestseller WHERE id_produit_bestseller = :id");

        $this->db->bind(':id', $product_id);

        $row = $this->db->single();

        if (!empty($row)) {

            $this->db->query("UPDATE bestseller SET quantite = quantite + :quantite WHERE id_produit_bestseller = :id");

            $this->db->bind(':id', $product_id);
            $this->db->bind(':quantite', $quantity);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {

            $this->db->query("INSERT INTO bestseller VALUES(NULL, :id_produit, :quantite)");

            $this->db->bind(':id_produit', $product_id);
            $this->db->bind(':quantite', $quantity);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
}
