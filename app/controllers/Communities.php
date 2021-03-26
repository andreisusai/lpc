<?php

class Communities extends Controller
{

    public function __construct()
    {
        $this->communityModel = $this->model('Community');
    }

    public function events()
    {

        $events = $this->communityModel->getEvents();

        $data = [
            "title" => 'Evénements',
            "events" => $events
        ];

        $this->view('communities/index', $data);
    }

    public function aboutus()
    {
        $data = [
            "title" => 'Qui sommes-nous',
            "quote" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor, eligendi laboriosam. Repellendus officia harum eaque.',
            "second_title" => '&Agrave; propos',
            "second_quote" => 'Chez Le Petit Commerce nous envisageons notre activité en tant que retail as service. Nous considérons que la vente "traditionnelle" n\'a plus lieu d\'être et qu\'il faut élever le service au moins au même niveau que les produits : nous vendons des services.

            Nos clients ne doivent pas être satisfaits que des produits qu\'ils achètent chez nous. Ils doivent aussi revenir pour le service auquel ils ont eu droit.
            
            Pour la suite de notre aventure, nous envisageons d\'ouvrir des boutiques dans les autres grandes villes de France. Parce que la vente en ligne ne pourra jamais totalement se substituer à la vente en boutique...',
            "third_title" => 'où ?',
            "third_quote" => 'Adresse: '
        ];

        $this->view('communities/aboutus', $data);
    }

    public function location()
    {
    }
}
