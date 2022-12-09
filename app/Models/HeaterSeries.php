<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ClaimForms\Traits\HasUuid;


/**
* Class Heater.
*/
class HeaterSeries extends Model
{
    use HasUuid;
    use HasFactory;
    protected $table = "heater_series";
    public $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];
    protected $fillable = [
        'id',
        'name',
        'thumbnail_store_path',
        'sort_order',
        'category',
        'description',
        'lifestyle_photo'
    ];

    protected $appends  = ['heater_name'];

    public function getHeaterNameAttribute(){       
        $hn = $this->heaters()->pluck('model_no')->toArray();
        return implode(' | ', $hn);
    }
    public function  heaters(){
        return $this->hasMany(Heater::class,'heater_family_id');
    }
}
