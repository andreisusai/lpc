<?php

class Scores extends Controller
{

    public function __construct()
    {
        $this->scoreModel = $this->model('Score');
        $this->productModel = $this->model('Product');
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "product_id" => trim($_POST['product_id']),
                "user_id" => trim($_POST['user_id']),
                "avis" => trim($_POST['avis']),
                "rate" => (!empty($_POST['rate'])) ? trim($_POST['rate']) : '',
                "product_id_err" => '',
                "user_id_err" => '',
                "avis_err" => '',
                "rate_err" => '',
                "rate_success" => false

            ];

            if (empty($data["user_id"])) {
                $data["user_id_err"] = 'Vous devez être connecté pour laisser un avis';
            }

            if (empty($data["avis"])) {
                $data["avis_err"] = 'Veuillez écrire un avis !';
            }

            if (empty($data["rate"])) {
                $data["rate_err"] = 'Veuillez cocher les étoiles pour déposez votre avis !';
            }

            if (empty($data["product_id_err"]) && empty($data["user_id_err"]) && empty($data["avis_err"]) && empty($data["rate_err"])) {

                if ($this->scoreModel->setScores($data)) {

                    $product = $this->productModel->getProductById($data['product_id']);

                    $suggestions = $this->productModel->getProductsSuggestions($data['product_id'], $product->titre);

                    $avis = $this->scoreModel->getScores($data['product_id']);

                    $data = [
                        "product" => $product,
                        "suggestions" => $suggestions,
                        "avis" => $avis,
                        "rate_success" => true
                    ];

                    $this->view('products/index', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur...');
                }
            } else {

                $product = $this->productModel->getProductById($data['product_id']);

                $suggestions = $this->productModel->getProductsSuggestions($data['product_id'], $product->titre);

                $avis = $this->scoreModel->getScores($data['product_id']);

                $data = [
                    "product" => $product,
                    "suggestions" => $suggestions,
                    "avis" => $avis,
                    "user_id_err" => $data["user_id_err"],
                    "avis_err" => $data["avis_err"],
                    "rate_err" => $data["rate_err"],
                    "rate_success" => false
                ];

                $this->view('products/index', $data);
            }
        }
    }
}
