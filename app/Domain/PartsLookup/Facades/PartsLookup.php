<?php

namespace App\Domain\PartsLookup\Facades;

use Illuminate\Support\Facades\Facade;

class PartsLookup extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'parts-lookup';
    }
}
