<?php

namespace App\Domain\ClaimForms\Models;

use App\Domain\ClaimForms\Database\Factories\RMAClaimFormFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\ClaimForms\Traits\HasUuid;
use OptimistDigital\NovaNotesField\Traits\HasNotes;


/**
 * Class RMAClaimForm.
 */
class RMAClaimForm extends Model
{
    use HasUuid;
    use HasFactory;
    use HasNotes;

    protected $table = "rma_claim_forms";


    protected $casts = [
        'id' => 'string',
        'distributor_address' => 'json',
        'installer_address' => 'json',
        'installation_address' => 'json',
        'return_shipping_address' => 'json',
        'archived_at' => 'datetime',
    ];

    protected $fillable = [
        //
        'party_requesting_the_rma_and_responsible_for_charges',
        'noritz_distributor',
        'contact_name',
        'distributor_address',
        'phone_number',
        'noritz_sales_representative',
        'installing_company',
        'installer_contact',
        'installer_phone_number',
        'noritz_engineer',
        'installer_address',
        'owner_name',
        'owner_phone_number',
        'installation_address',
        'return_shipping_address',
        'model_number',
        'gas_type',
        'serial_number',
        'application_type',
        'recirculation_pump',
        'reason_for_return',
        'return_box',
        'return_remote_controller',
        'return_remote_cord',
        'other',
        'preapprove_the_total_amount_for_repair',
        'box_purchase_distributors_only',
        'remote_controller_purchase_distributors_only',
        'remote_cord_purchase_distributors_only',
        'initials',
        'accept_terms_and_conditions',
        'name',
        'email',
        'fax_number',
        'created_at',
        'updated_at',
    ];

    /**
     * @var string[][]
     */
    public static $createRules = [
        'email' => 'required',
        'accept_terms_and_conditions' => 'required'
    ];

    /**
     * @var string[][]
     */
    public static $updateRules = [
        'email' => 'required',
        'accept_terms_and_conditions' => 'required'
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
        return RMAClaimFormFactory::new();
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
