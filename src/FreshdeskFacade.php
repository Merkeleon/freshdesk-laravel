<?php

namespace Merkeleon\Laravel\Freshdesk;

use Illuminate\Support\Facades\Facade;

class FreshdeskFacade extends Facade
{
    const VERSION = '0.2.0';
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'freshdesk';
    }
}
