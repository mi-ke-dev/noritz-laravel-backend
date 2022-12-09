<?php

namespace App\Domain\ClaimForms\Enums;

/**
* Class ChargeParty.
*/
class ChargeParty{
    public const DISTRIBUTOR = 'Distributor';
    public const INSTALLER = 'Installer';
    public const OWNER = 'Owner';

    /**
    * @return mixed
    */
    public static function choices()
    {
        $choices = [];

        $choices['DISTRIBUTOR'] = self::DISTRIBUTOR;
        $choices['INSTALLER'] = self::INSTALLER;
        $choices['OWNER'] = self::OWNER;

        return $choices;
    }
}
