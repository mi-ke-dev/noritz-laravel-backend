<?php

namespace App\Domain\TechnicalInfo\Facades;

use Illuminate\Support\Facades\Facade;

class TechnicalInfo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'technical-info';
    }
}
