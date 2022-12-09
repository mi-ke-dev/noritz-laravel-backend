<?php

namespace App\Domain\ClaimForms\Models;

use Illuminate\Support\Str;
use App\Domain\ClaimForms\Database\Factories\RGA2ClaimFormFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\ClaimForms\Traits\HasUuid;
use OptimistDigital\NovaNotesField\Traits\HasNotes;


/**
 * Class RGA2ClaimForm.
 */
class RGA2ClaimForm extends Model
{
    use HasUuid;
    use HasFactory;
    use HasNotes;

    protected $table = "rga2_claim_forms";


    protected $casts = [
        //
        'id' => 'string',
        'date' => 'date',
        'claim_photos' => 'json',
        'items_received' => 'json',
        'archived_at' => 'datetime',
    ];

    protected $fillable = [
        //
        'date',
        'companycustomer_name',
        'contact_person',
        'email',
        'email_confirm',
        'phone',
        'sales_order_number',
        'po_number',
        'customer_reference_number',
        'was_the_item_received_damaged',
        'did_you_receive_incorrect_items_andor_quantities',
        'is_the_item_defective',
        'is_this_new_unused_and_needs_to_be_returned',
        'was_the_packaging_damaged',
        'was_the_carrier_notified_of_the_damage',
        'were_any_items_refused_from_the_shipment',
        'was_the_quantity_on_the_packing_slip_correct',
        'did_the_received_item_match_the_packing_slip',
        'is_the_item_missing_components',
        'purchase_overage',
        'purchase_damage',
        'claim_photos',
        'items_received',
        'describe_the_issue',
        'i_agree_to_the_terms_and_conditions',
        'created_at',
        'updated_at',
    ];

    /**
     * @var string[][]
     */
    public static $createRules = [
        'email' => 'required|email|same:email_confirm',
        'email_confirm' => 'required',
        'describe_the_issue' => 'required',
        'i_agree_to_the_terms_and_conditions' => 'required'
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
        return RGA2ClaimFormFactory::new();
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
