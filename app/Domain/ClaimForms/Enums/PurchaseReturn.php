<?php

namespace App\Domain\ClaimForms\Enums;

/**
* Class PurchaseReturn.
*/
class PurchaseReturn{
    public const PURCHASE = 'Purchase';
    public const RETURN = 'Return';

    /**
    * @return mixed
    */
    public static function choices()
    {
        $choices = [];

        $choices['PURCHASE'] = self::PURCHASE;
        $choices['RETURN'] = self::RETURN;

        return $choices;
    }
}
