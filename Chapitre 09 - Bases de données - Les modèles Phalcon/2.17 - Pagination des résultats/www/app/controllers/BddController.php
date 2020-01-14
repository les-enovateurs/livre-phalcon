<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use Phalcon\Paginator\Adapter\QueryBuilder;

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

        $builder = $this->modelsManager->createBuilder()->from(Utilisateurs::class);

        $oPaginator = new QueryBuilder(
            [
                'builder' => $builder,
                'limit'   => 10,
                'page'    => $nPageCourante,
            ]
        );

        $this->view->utilisateur_pagination = $oPaginator->paginate();
    }
}

