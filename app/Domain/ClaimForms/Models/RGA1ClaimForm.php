<?php

namespace App\Domain\ClaimForms\Models;

use App\Domain\ClaimForms\Database\Factories\RGA1ClaimFormFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\ClaimForms\Traits\HasUuid;
use OptimistDigital\NovaNotesField\Traits\HasNotes;


/**
 * Class RGA1ClaimForm.
 */
class RGA1ClaimForm extends Model
{
    use HasUuid;
    use HasFactory;
    use HasNotes;

    protected $table = "rga1_claim_forms";


    protected $casts = [
        //
        'id' => 'string',
            'items' => 'json',
            'archived_at' => 'datetime',
    ];

    protected $fillable = [
        //
        'companycustomer_name',
        'sales_order_number',
        'customer_reference_number',
        'customer_purchase_order_number',
        'items',
        'describe_the_issue',
        'has_the_box_been_opened',
        'has_the_item_been_installed',
        'is_the_items_in_new_resalable_condition',
        'reason_for_return',
        'name',
        'phone',
        'email',
        'email_confirm',
        'created_at',
        'updated_at',
    ];

    /**
     * @var string[][]
     */
    public static $createRules = [
        'describe_the_issue' => 'required',
        'email' => 'required|email|same:email_confirm',
        'email_confirm' => 'required'

        //   'example_field' => ['required', 'string', 'max:255'],
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
        return RGA1ClaimFormFactory::new();
    }

    //=============================================================================
    // Relationships
    // - https://laravel.com/docs/8.x/eloquent-relationships
    // - https://hackernoon.com/eloquent-relationships-cheat-sheet-5155498c209
    //=============================================================================
    public function submission()
    {
        return $this->morphTo();
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
