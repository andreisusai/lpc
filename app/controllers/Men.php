<?php
class Men extends Controller
{

    public function __construct()
    {
        $this->manModel = $this->model('Man');
    }

    public function tShirts()
    {

        $products = $this->manModel->getTShirts();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 't-shirts'
        ];

        $this->view('men/index', $data);
    }

    public function pantalon()
    {

        $products = $this->manModel->getpantalon();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'pantalon'
        ];

        $this->view('men/index', $data);
    }

    public function pull()
    {

        $products = $this->manModel->getpull();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'pull'
        ];

        $this->view('men/index', $data);
    }

    public function manteau()
    {

        $products = $this->manModel->getmanteau();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'manteau'
        ];

        $this->view('men/index', $data);
    }

    public function sneakers()
    {

        $products = $this->manModel->getsneakers();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'sneakers'
        ];

        $this->view('men/index', $data);
    }

    public function boots()
    {

        $products = $this->manModel->getboots();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'boots'
        ];

        $this->view('men/index', $data);
    }

    public function deville()
    {

        $products = $this->manModel->getdeville();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'deville'
        ];

        $this->view('men/index', $data);
    }

    public function echarpes()
    {

        $products = $this->manModel->getecharpes();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'echarpes'
        ];

        $this->view('men/index', $data);
    }

    public function montres()
    {

        $products = $this->manModel->getmontres();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'montres'
        ];

        $this->view('men/index', $data);
    }

    public function newVetements()
    {

        $products = $this->manModel->getnewVetements();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'nouveautesv'
        ];

        $this->view('men/newItems', $data);
    }

    public function newChaussures()
    {

        $products = $this->manModel->getnewChaussures();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'nouveautesc'
        ];

        $this->view('men/newItems', $data);
    }

    public function newAccessoires()
    {

        $products = $this->manModel->getnewAccessoires();

        $data = [
            'products' => $products,
            'main_folder' => 'hommes',
            'second_folder' => 'nouveautesa'
        ];

        $this->view('men/newItems', $data);
    }
}
