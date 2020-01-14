<?php

class VersionTask extends \Phalcon\Cli\Task
{
    public function mainAction()
    {
        $config = $this->getDI()->get('config');

        echo $config['version'];
    }

    public function exempleAction()
    {
        echo 'Voici un exemple';
    }
}
