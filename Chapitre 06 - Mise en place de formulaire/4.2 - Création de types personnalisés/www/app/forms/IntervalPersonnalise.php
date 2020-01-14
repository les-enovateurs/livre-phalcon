<?php
namespace HelloWorld\Forms;

use Phalcon\Forms\Element\AbstractElement;

class IntervalPersonnalise extends AbstractElement
{
    public function render(array $aAttributs = null): string
    {

        $sHtml = '<input type="numeric" name="debut_' . $this->getName() . '" id="debut_' . $this->getName() . '"> - ';
        $sHtml .= '<input type="numeric" name="fin_' . $this->getName() . '" id="fin_' . $this->getName() . '">';

        return $sHtml;

    }
}