<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\TechnicalInfo\Database\Factories\AttachmentSecurityTemplateFactory;
use App\Domain\TechnicalInfo\Traits\HasUuid;

/**
* Class AttachmentSecurityTemplate.
*/
class AttachmentSecurityTemplate extends Model
{
    // use HasUuid;
    use HasFactory;

    protected $table = "attachment_security_templates";

    // protected $keyType = 'uuid';
    // protected $primaryKey = 'id';

    protected $casts = [
        // 'id' => 'string'
    ];

    protected $fillable = [
        //
        'id',
        'key',
        'security_role',
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
        return AttachmentSecurityTemplateFactory::new();
    }

    //=============================================================================
    // Relationships
    // - https://laravel.com/docs/8.x/eloquent-relationships
    // - https://hackernoon.com/eloquent-relationships-cheat-sheet-5155498c209
    //=============================================================================
    public function security_role(): BelongsTo
    {
        return $this->belongsTo(SecurityRole::class, 'security_role_id');
    }

    // public function security_role(): BelongsTo
    // {
    //     return $this->belongsTo(SecurityRole::class, 'security_role_id');
    // }


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
