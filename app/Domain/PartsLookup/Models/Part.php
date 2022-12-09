<?php

namespace App\Domain\PartsLookup\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Domain\PartsLookup\Database\Factories\PartFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Domain\PartsLookup\Traits\HasUuid;


/**
* Class Part.
*/
class Part extends Model
{
    // use HasUuid;
    use HasFactory;

    protected $table = "parts";

    // protected $keyType = 'uuid';
    // protected $primaryKey = 'id';

    protected $casts = [
        // 'id' => 'string'
    ];

    protected $fillable = [
        //
        'part_list_id',
        'keyword',
        'part_description_en',
        'part_description_jp',
        'part_number',
        'available_for_sale',
        'version',
        'sequence',
        'upgrade_reason_en',
        'upgrade_reason_jp',
        'applicable_models',
    ];

    /**
    * @var string[][]
    */
    public static $createRules = [
      // 'example_field' => ['required', 'string', 'max:255'],
    ];

    /**
    * @var string[][]
    */
    public static $updateRules = [
      // 'example_field' => ['required', 'string', 'max:255'],
    ];

    //=============================================================================
    // Setup and Configuration
    //=============================================================================
    public static function boot()
    {
        parent::boot();

        //
    }

    //=============================================================================
    // Setup and Configuration
    //=============================================================================
    protected static function newFactory(): Factory
    {
        return PartFactory::new();
    }

    //=============================================================================
    // Relationships
    // - https://laravel.com/docs/8.x/eloquent-relationships
    // - https://hackernoon.com/eloquent-relationships-cheat-sheet-5155498c209
    //=============================================================================

    public function heaters(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Heater::class, 'heater_part');
    }

    public function scopeByPartNumber(Builder $query, $part_number = null) : Builder
    {
        if($part_number)
            $query->where('part_number', 'ILIKE',  '%'.$part_number. '%');
        return $query;
    }

    public function scopeByPartListId(Builder $query, $part_list_id = null) : Builder
    {
        if($part_list_id)
            $query->where('part_list_id', 'ILIKE',  '%'.$part_list_id. '%');
        return $query;
    }

    public function scopeByModelNumber(Builder $query, $model_number = null) : Builder
    {
        if($model_number)
            $query->whereHas('heaters', function($q) use($model_number){
                $q->where('model_no', 'ILIKE', '%' . $model_number . '%');
            });
        return $query;
    }

    public function scopeByPartSearch(Builder $query, $search = null) : Builder
    {
        if($search)
            $query->where(function($q) use($search){
                $q
                ->where('part_description_en', 'ILIKE',  '%'.$search. '%')
                ;
            });
        return $query;
    }



    //=============================================================================
    // Mutators
    //  - https://laravel.com/docs/8.x/eloquent-mutators#defining-a-mutator
    //=============================================================================
    /*
    // example mutator
    public function setFirstNameAttribute($value)
    {
      $this->attributes['first_name'] = strtolower($value);
    }
    */

    //=============================================================================
    // Accessors
    //  - https://laravel.com/docs/8.x/eloquent-mutators#defining-an-accessor
    //=============================================================================
    /*
    // example accessor
    public function getFirstNameAttribute($value)
    {
      return ucfirst($value);
    }
    */
}
