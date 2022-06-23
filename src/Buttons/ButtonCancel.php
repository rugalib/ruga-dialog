<?php

declare(strict_types=1);

namespace Ruga\Dialog\Buttons;

use Laminas\Json\Expr;

class ButtonCancel extends AbstractButton
{
    public function __construct(string $text = 'Abbrechen')
    {
        parent::__construct($text);
        $this->icon = 'ui-icon-cancel';
        $click = <<<JS
function(event, ui){
    $(this).dialog('close');
}
JS;
        $this->click = new Expr($click);
    }
    
}