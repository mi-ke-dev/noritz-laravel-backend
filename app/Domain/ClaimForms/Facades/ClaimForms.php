<?php

namespace App\Domain\ClaimForms\Facades;

use Illuminate\Support\Facades\Facade;

class ClaimForms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'claim-forms';
    }
}
