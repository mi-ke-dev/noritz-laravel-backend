<?php

namespace App\Domain\ClaimForms\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid() : void
    {
        if (config('database.connections.' . config('database.default') . '.driver') != 'pgsql') {
            self::creating(function ($model) {
                $model->setIncrementing(false);
                $model->id = Str::uuid()->toString();
            });
        }
    }
}
