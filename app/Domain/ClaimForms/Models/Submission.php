<?php

namespace App\Domain\ClaimForms\Models;

use App\Domain\ClaimForms\Database\Factories\SubmissionFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\ClaimForms\Traits\HasUuid;


/**
 * Class Submission.
 */
class Submission extends Model
{
    use HasUuid;
    use HasFactory;

    protected $table = "submissions";


    protected $casts = [
        //
        'id' => 'string',
        'submitted_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    protected $fillable = [
        //
        'is_this_a_heater',
        'is_this_venting_accessories_andor_parts',
        'have_you_contacted_technical_support_for_troubleshooting',
        'was_the_item_received_damaged',
        'did_you_receive_incorrect_items_andor_quantities',
        'is_the_item_defective',
        'is_this_new_unused_and_needs_to_be_returned',
        'claim_id',
        'submission_type',
        'submission_id',
        'email',
        'submitted_at',
        'created_at',
        'updated_at',
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
        return SubmissionFactory::new();
    }

    //=============================================================================
    // Relationships
    // - https://laravel.com/docs/8.x/eloquent-relationships
    // - https://hackernoon.com/eloquent-relationships-cheat-sheet-5155498c209
    //=============================================================================
    public function submission()
    {
        return $this->morphMany(Submission::class, 'submission');
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
