<?php

namespace App\Domain\ClaimForms\Enums;

/**
* Class GasType.
*/
class GasType{
    public const NG = 'Natural Gas';
    public const LP = 'Liquid Propane';

    /**
    * @return mixed
    */
    public static function choices()
    {
        $choices = [];

        $choices['NG'] = self::NG;
        $choices['LP'] = self::LP;

        return $choices;
    }
}
