<?php

declare(strict_types=1);

namespace Ruga\Dialog;

use Laminas\Json\Json;

/**
 * Abstract template.
 *
 * @see      Dialog
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
abstract class AbstractDialog implements DialogInterface
{
    const CONF_TEMPLATE = 'dialog-template';
    
    /** @var null|string */
    private $id = null;
    
    /** @var null|string */
    private $body = null;
    
    /** @var DialogOptionsInterface */
    private $options;
    
    
    private $buttons=[];
    
    
    
    public function __construct(DialogOptionsInterface $options = null)
    {
        $this->options = $options /*?? new DialogOptions()*/
        ;
    }
    
    
    
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }
    
    
    
    /**
     * Return an id for the html element
     * If no id is set, generate a random identifiert.
     *
     * @return string
     */
    public function getId($suffix = ''): string
    {
        if (!$this->id) {
            $this->id = 'ruga_dialog_' . preg_replace(
                    '#[^A-Za-z0-9\-_]+#',
                    '',
                    md5('ruga_dialog_' . date('c'))
                );
        }
        return $this->id . ($suffix ? '-' . $suffix : '');
    }
    
    
    
    /**
     * Set id for the html element.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    
    
    /**
     * Generate and return the html string to create a dialog.
     *
     * @return string
     */
    public function renderHtml(): string
    {
        $str = '<div id="' . $this->getId() . '"';
        $str .= '>';
        $str .= $this->body ?? '';
        $str .= '</div>';
        
        return $str;
    }
    
    
    
    /**
     * Generate and return the java script string to create a dialog.
     *
     * @return string
     */
    public function renderJavascript(): string
    {
        $html = addcslashes($this->renderHtml(), "'");
        
//        $options_json = \Laminas\Json\Json::encode($this->options->getOptionsObject(), false, ['enableJsonExprFinder' => true, 'prettyPrint' => true] );
        
        $str = "(function($, window, document) {
    const dialog_id='{$this->getId()}';
    $(function() {";
        
        
        $str .= <<<JS

var dialog_{$this->getId()}=$('{$html}').dialog(
    {$this->options->getOptionsJson()}
);
JS;
        
        
        if ($this->options->getAjaxUrl()) {
            $str .= <<<JS

$('#{$this->getId()}').on('dialogopen', function(event, ui) {
    const options=$(this).data('uiDialog').options;
    $(this).html(options.ajaxLoadingHtml);
    let data={};
    $.each($(this).data(), function(key, value) {
        if(key !== 'uiDialog') data[key]=value;
    });
    $.ajax({
        url: options.ajaxUrl,
        data: data,
        method: options.ajaxMethod,
        context: $(this),
        headers: { 'X-Ruga-Component': 'ruga-dialog' , 'X-Ruga-Layout': options.ajaxRequestLayout }
    }).done(function(data) {
        $(this).html(data);
        const title=$('title', this).text();
        if(title) {
            $(this).dialog('option', 'title', title);
        }
    });
});
JS;
        }
        
        
        $str .= '});';
        $str .= '}(window.jQuery, window, document));';
        return $str;
    }
    
    
}
