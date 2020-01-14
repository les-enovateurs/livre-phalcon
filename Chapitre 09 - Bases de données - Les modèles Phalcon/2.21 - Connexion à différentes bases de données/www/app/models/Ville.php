<?php

namespace HelloWorld\Models;

class Ville extends \Phalcon\Mvc\Model
{
    public function initialize()
	{
   		$this->setConnectionService('dbMaitreMysql');
	}

}