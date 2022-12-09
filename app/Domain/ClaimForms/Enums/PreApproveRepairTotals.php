<?php

namespace App\Domain\ClaimForms\Enums;

/**
* Class PreApproveRepairTotals.
*/
class PreApproveRepairTotals{
    public const NONE = 'None';
    public const USD150 = '$150';
    public const USD300 = '$300';

    /**
    * @return mixed
    */
    public static function choices()
    {
        $choices = [];

        $choices['NONE'] = self::NONE;
        $choices['USD150'] = self::USD150;
        $choices['USD300'] = self::USD300;

        return $choices;
    }
}
