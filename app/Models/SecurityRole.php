<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domain\TechnicalInfo\Database\Factories\SecurityRoleFactory;

/**
* Class SecurityRole.
*/
class SecurityRole extends Model
{
    // use HasUuid;
    use HasFactory;

    protected $table = "security_roles";


    protected $casts = [
        // 'id' => 'string'
    ];

    // protected $keyType = 'uuid';
    // protected $primaryKey = 'id';

    protected $fillable = [
        //
        'id',
        'name',
        'user_id',
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
        return SecurityRoleFactory::new();
    }

    //=============================================================================
    // Relationships
    // - https://laravel.com/docs/8.x/eloquent-relationships
    // - https://hackernoon.com/eloquent-relationships-cheat-sheet-5155498c209
    //=============================================================================
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function attachmentSecurityTemplates(): HasMany
    {
        return $this->hasMany(AttachmentSecurityTemplate::class);
    }

    // public function users(): BelongsToMany
    // {
    //     return $this->belongsToMany(User::class);
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
