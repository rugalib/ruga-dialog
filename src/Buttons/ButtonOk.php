<?php

declare(strict_types=1);

namespace Ruga\Dialog\Buttons;

use Laminas\Json\Expr;

class ButtonOk extends AbstractButton
{
    public function __construct(string $text='Ok')
    {
        parent::__construct($text);
        $this->icon='ui-icon-check';
        $click= <<<JS
function(event, ui){
    $(this).dialog('close');
}
JS;
        $this->click=new Expr($click);
    }
    
}