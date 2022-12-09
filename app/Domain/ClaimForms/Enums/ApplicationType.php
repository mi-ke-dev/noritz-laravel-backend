<?php

namespace App\Domain\ClaimForms\Enums;

/**
* Class ApplicationType.
*/
class ApplicationType{
    public const RESIDENTIAL = 'Residential';
    public const RESTAURANT = 'Restraurant';
    public const COMMERCIAL = 'Commercial';

    /**
    * @return mixed
    */
    public static function choices()
    {
        $choices = [];

        $choices['RESIDENTIAL'] = self::RESIDENTIAL;
        $choices['RESTAURANT'] = self::RESTAURANT;
        $choices['COMMERCIAL'] = self::COMMERCIAL;

        return $choices;
    }
}
