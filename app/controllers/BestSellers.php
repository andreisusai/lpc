<?php

class BestSellers extends Controller
{

    public function __construct()
    {
        $this->modelBestSeller = $this->model('BestSeller');
    }

    public function index()
    {

        $products = $this->modelBestSeller->getbestseller();

        $results = array();
        $previous_title = '';

        for ($i = 0; $i < count($products); $i++) {

            if ($products[$i]->titre != $previous_title) {
                $results[$i] = $products[$i];
            }

            $previous_title = $products[$i]->titre;
        }

        $data = [
            'products' => $results
        ];

        $this->view('bestSellers/index', $data);
    }
}
