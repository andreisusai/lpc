<?php
class Order
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserOrders($user_id)
    {
        $this->db->query("SELECT *,c.id_commande as order_number, p.id_produit  as product_id, d.prix as prix 
        FROM commande c, details_commande d, produit p
        WHERE d.id_commande = c.id_commande
        AND d.id_produit = p.id_produit
        AND c.id_membre = :id_membre
        ORDER BY c.date_enregistrement DESC");

        $this->db->bind(':id_membre', $user_id);

        $row = $this->db->resultset();

        return $row;
    }
}
