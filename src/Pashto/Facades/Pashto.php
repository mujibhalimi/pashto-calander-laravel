<?php

namespace mujibhalimi\Pashto\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Pashto
 * @package Halimi\Pashto
 * @author  Mujib <salimjan3008@gmail.com>
 */
class Pashto extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */

    protected static function getFacadeAccessor ()
    {
        return 'mujibhalimi\Pashto\Helpers\PashtoDateHelper';
    }
}