<?php

declare(strict_types=1);

namespace Ruga\Dialog;

/**
 * Interface to a template.
 *
 * @see      Dialog
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
interface DialogInterface
{
    /**
     * Return an id for the html element
     * If no id is set, generate a random identifiert.
     *
     * @param string $suffix
     *
     * @return string
     */
    public function getId($suffix = ''): string;
    
    
    
    /**
     * Set id for the html element.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id): self;
    
    
    
    /**
     * Generate and return the html string to create a dialog.
     *
     * @return string
     */
    public function renderHtml(): string;
    
    
    
    /**
     * Generate and return the java script string to create a dialog.
     *
     * @return string
     */
    public function renderJavascript(): string;
}
