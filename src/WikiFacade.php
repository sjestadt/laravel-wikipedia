<?php

namespace sjestadt\Larapedia;

use Illuminate\Support\Facades\Facade;

class WikiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wiki';
    }
}