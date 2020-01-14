<?php
namespace HelloWorld\Forms;

use Phalcon\Forms\Element;

class IntervalPersonnalise extends Element
{
    public function render($aAttributs = null)
    {

        $sHtml = '<input type="numeric" name="debut_' . $this->getName() . '" id="debut_' . $this->getName() . '"> - ';
        $sHtml .= '<input type="numeric" name="fin_' . $this->getName() . '" id="fin_' . $this->getName() . '">';

        return $sHtml;

    }
}