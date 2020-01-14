<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function paginationAction()
    {
        $nPageCourante = 1;
        if(true === $this->request->has('page')){
            $nPageCourante = $this->request->get('page');
        }
        $aUtilisateur = Utilisateurs::find();

        $oPaginator = new PaginatorModel(
            [
                'data'  => $aUtilisateur,
                'limit' => 10,
                'page'  => $nPageCourante,
            ]
        );

        $this->view->utilisateur_pagination = $oPaginator->paginate();
    }
}

