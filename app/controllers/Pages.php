<?php
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Welcome'
    ];

    $this->view('pages/index', $data);
  }

  public function salesterms()
  {
    $data = [];

    $this->view('pages/salesterms');
  }

  public function legalnotices()
  {
    $data = [];

    $this->view('pages/legalnotices');
  }

  public function about()
  {
    $this->view('pages/about');
  }
}
