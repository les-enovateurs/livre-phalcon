<?php

use Phalcon\Mvc\View;
use Phalcon\Tag;

use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setDoctype(Tag::HTML5);

        $this->tag->prependTitle('page d\'accueil - ');
        
        $this->tag->appendTitle(' - n°1 ');

        $this->view->utilisateurs = Utilisateurs::find();
    }
}

