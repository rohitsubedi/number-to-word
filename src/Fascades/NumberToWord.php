<?php

namespace Rohit\NumberToWord\Facades;

use Illuminate\Support\Facades\Facade;

class NumberToWord extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'number-to-word';
    }
}
