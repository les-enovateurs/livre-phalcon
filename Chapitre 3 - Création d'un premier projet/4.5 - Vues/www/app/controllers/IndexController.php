<?php

use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $aUtilisateurs = Utilisateurs::find();

        $this->view->utilisateurs = $aUtilisateurs;
    }

}

