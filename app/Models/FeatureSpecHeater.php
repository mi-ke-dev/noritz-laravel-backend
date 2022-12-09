<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureSpecHeater extends Model
{
    use HasFactory;

    protected $table = "feature_spec_heaters";

    public function feature_spec()
   {
       return $this->belongsTo(FeatureSpec::class, 'feature_spec_id');
   }
}
