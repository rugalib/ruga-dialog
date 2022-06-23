<?php

declare(strict_types=1);

namespace Ruga\Dialog\Buttons;

use Laminas\Json\Expr;

class AbstractButton implements ButtonInterface
{
    public string $text='';
    public string $icon='ui-icon-blank';
    public bool $showText=true;
    public bool $disabled=false;
    
    /**
     * @var Expr|null
     * @todo There is a bug in laminas-json if typed attributes are used
     */
    public $click;
    
    
    
    public function __construct(string $text)
    {
        $this->text=$text;
        $this->click=new Expr('function(event, ui){}');
    }
    
    
    /**
     * Return all the non-null properties as an object.
     *
     * @return \stdClass
     */
    public function getOptionsObject(): \stdClass
    {
        $options = [];
        
        $options = array_filter(
            get_object_vars($this),
            function ($value) {
                return $value !== null;
            }
        );
        
        return (object)($options);
    }
    
    
    
    /**
     * Return all the non-null properties as a JSON string.
     *
     * @return \stdClass
     */
    public function getOptionsJson(): string
    {
        return \Laminas\Json\Json::encode(
            $this->getOptionsObject(),
            false,
            ['enableJsonExprFinder' => true, 'prettyPrint' => true]
        );
    }
    
    
    
    public function jsonSerialize()
    {
        return $this->getOptionsObject();
    }
    
}