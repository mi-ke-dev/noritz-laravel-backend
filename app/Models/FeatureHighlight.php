<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FeatureHighlight extends Model
{
    use HasFactory;
    protected $table = "feature_highlights";

    protected $appends  = ['full_icon_svg'];


    public function getFullIconSvgAttribute(){
       
        if($this->icon_svg && $this->icon_svg != ''){
          return Storage::url($this->icon_svg);
        }
        return asset('images/nrcr.jpg');
      }

}
