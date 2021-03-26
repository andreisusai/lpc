<?php
class Women extends Controller
{
    public function __construct()
    {
        $this->womanModel = $this->model('Woman');
    }

    public function blouses()
    {
        $products = $this->womanModel->getBlouses();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'blouses'
        ];

        $this->view('women/index', $data);
    }

    public function chemise()
    {
        $products = $this->womanModel->getchemise();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'chemise'
        ];

        $this->view('women/index', $data);
    }

    public function tShirt()
    {
        $products = $this->womanModel->getTShirt();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 't-shirt'
        ];

        $this->view('women/index', $data);
    }

    public function pantalon()
    {
        $products = $this->womanModel->getpantalon();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'pantalon'
        ];

        $this->view('women/index', $data);
    }

    public function pull()
    {
        $products = $this->womanModel->getpull();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'pull'
        ];

        $this->view('women/index', $data);
    }

    public function escarpins()
    {
        $products = $this->womanModel->getescarpins();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'escarpins'
        ];

        $this->view('women/index', $data);
    }

    public function balerinnes()
    {
        $products = $this->womanModel->getbalerinnes();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'balerinnes'
        ];

        $this->view('women/index', $data);
    }

    public function bottes()
    {
        $products = $this->womanModel->getbottes();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'bottes'
        ];

        $this->view('women/index', $data);
    }

    public function baskets()
    {
        $products = $this->womanModel->getbaskets();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'baskets'
        ];

        $this->view('women/index', $data);
    }

    public function sacs()
    {
        $products = $this->womanModel->getsacs();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'sacs'
        ];

        $this->view('women/index', $data);
    }

    public function echarpes()
    {
        $products = $this->womanModel->getecharpes();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'echarpes'
        ];

        $this->view('women/index', $data);
    }

    public function ceintures()
    {
        $products = $this->womanModel->getceintures();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'ceintures'
        ];

        $this->view('women/index', $data);
    }

    public function montres()
    {
        $products = $this->womanModel->getmontres();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'montres'
        ];

        $this->view('women/index', $data);
    }

    public function bijoux()
    {
        $products = $this->womanModel->getbijoux();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'bijoux'
        ];

        $this->view('women/index', $data);
    }

    public function newVetements()
    {

        $products = $this->womanModel->getnewVetements();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'nouveautesv'
        ];

        $this->view('women/newItems', $data);
    }

    public function newChaussures()
    {

        $products = $this->womanModel->getnewChaussures();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'nouveautesc'
        ];

        $this->view('women/newItems', $data);
    }

    public function newAccessoires()
    {

        $products = $this->womanModel->getnewAccessoires();

        $data = [
            'products' => $products,
            'main_folder' => 'femmes',
            'second_folder' => 'nouveautesa'
        ];

        $this->view('women/newItems', $data);
    }
}
