<?php

namespace App\Domain\ClaimForms\Enums;

/**
* Class ReplacementCredit.
*/
class ReplacementCredit{
    public const REPLACEMENT = 'Replacement';
    public const CREDIT = 'Credit';

    /**
    * @return mixed
    */
    public static function choices()
    {
        $choices = [];

        $choices['REPLACEMENT'] = self::REPLACEMENT;
        $choices['CREDIT'] = self::CREDIT;

        return $choices;
    }
}
