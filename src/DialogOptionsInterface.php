<?php

declare(strict_types=1);

namespace Ruga\Dialog;

interface DialogOptionsInterface
{
    /**
     * Return all the non-null properties as an object.
     *
     * @return \stdClass
     */
    public function getOptionsObject(): \stdClass;
}