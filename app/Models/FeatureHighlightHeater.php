<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureHighlightHeater extends Model
{
    use HasFactory;
    protected $table = "feature_highlight_heater";

    public function feature_highlight()
   {
       return $this->belongsTo(FeatureHighlight::class, 'feature_highlight_id');
   }
}
