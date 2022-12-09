<?php

namespace App\Domain\ClaimForms\Nova\Resources;

use App\Nova\Actions\ArchiveClaim;
use App\Nova\Filters\ArchiveStatus;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Domain\ClaimForms\Nova\Resource;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Code;

;

use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\DateTime;
use OptimistDigital\NovaNotesField\NotesField;

/**
 * Class RGA2ClaimForm.
 */
class RGA2ClaimForm extends Resource
{
    public static $group = 'Claim Forms';

    public static $displayInNavigation = true;

    public static $defaultSort = ['created_at' => 'desc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Domain\ClaimForms\Models\RGA2ClaimForm::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'claim_id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'claim_id',
        'contact_person',
        'companycustomer_name',
        'phone',
        'email'

    ];

    public static $perPageOptions = [12, 25, 50, 100];

    public function fieldsForIndex(NovaRequest $request)
    {
        return [

            Text::make('Claim Id', function () {

                $number = 100000000 + $this->claim_id;
                return 'C' . Str::padLeft($number, 9);
            })
                ->sortable()
            ,
            Text::make('Company/Customer Name', 'companycustomer_name')
                ->nullable()
                ->sortable()
            ,
            Text::make('Contact Person', 'contact_person')
                ->nullable()
                ->sortable()
            ,
            Text::make('Email', 'email')
                ->sortable()
            ,
            Text::make('Phone', 'phone')
                ->nullable()
                ->sortable()
            ,

            DateTime::make('Created At', 'created_at')
                ->nullable()
                ->sortable()
                ->exceptOnForms()
            ,

            DateTime::make('Archived At')->readonly(),

        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            /*
                Field::make('Name', 'key')
                    ->showOnIndex()
                    ->hideFromIndex()
                    ->onlyOnForms()
                    ->exceptOnForms()
                    ->showOnDetail()
                    ->hideFromDetail()
                    ->showOnCreating()
                    ->showOnUpdating()
                    ->required()
                    ->rules('required')
                    ->nullable(),
            */

            Text::make('Claim Id', function () {

                $number = 100000000 + $this->claim_id;
                return 'C' . Str::padLeft($number, 9);
            })
            ,
            Date::make('Date', 'date')
                ->hideFromIndex()
                ->nullable()
            ,
            Text::make('Company/Customer Name', 'companycustomer_name')
                ->hideFromIndex()
                ->nullable()
            ,
            Text::make('Contact Person', 'contact_person')
                ->hideFromIndex()
                ->nullable()
            ,
            Text::make('Email', 'email')
                ->hideFromIndex()
            ,
            Text::make('Email (Confirm)', 'email_confirm')
            ,
            Text::make('Phone', 'phone')
                ->nullable()
            ,
            Text::make('Sales Order Number', 'sales_order_number')
                ->nullable()
            ,
            Text::make('PO Number', 'po_number')
                ->nullable()
            ,
            Text::make('Customer Reference Number', 'customer_reference_number')
                ->nullable()
            ,
            Boolean::make('Was the item received damaged?', 'was_the_item_received_damaged')
                ->nullable()
            ,
            Boolean::make('Did you receive incorrect items and/or quantities?', 'did_you_receive_incorrect_items_andor_quantities')
                ->nullable()
            ,
            Boolean::make('Is the item defective?', 'is_the_item_defective')
                ->nullable()
            ,
            Boolean::make('Is this new, unused and needs to be returned?', 'is_this_new_unused_and_needs_to_be_returned')
                ->nullable()
            ,
            Boolean::make('Was the packaging damaged?', 'was_the_packaging_damaged')
                ->nullable()
            ,
            Boolean::make('Was the carrier notified of the damage?', 'was_the_carrier_notified_of_the_damage')
                ->nullable()
            ,
            Boolean::make('Were any items refused from the shipment?', 'were_any_items_refused_from_the_shipment')
                ->nullable()
            ,
            Boolean::make('Was the quantity on the packing slip correct?', 'was_the_quantity_on_the_packing_slip_correct')
                ->nullable()
            ,
            Boolean::make('Did the received item match the packing slip?', 'did_the_received_item_match_the_packing_slip')
                ->nullable()
            ,
            Boolean::make('Is the item missing components?', 'is_the_item_missing_components')
                ->nullable()
            ,
            Select::make('In case of overage, would you like to purchase or return the items?', 'purchase_overage')
                ->options(\App\Domain\ClaimForms\Enums\PurchaseReturn::choices())
                ->displayUsingLabels()
                ->nullable()
            ,
            Select::make('In case of damage, defect, or shortage, would you like a replacement item or credit?', 'purchase_damage')
                ->options(\App\Domain\ClaimForms\Enums\ReplacementCredit::choices())
                ->displayUsingLabels()
                ->nullable()
            ,

            Text::make('Claim Photos', function() {
                $count = 1;
                $html = "<ul>";
                foreach($this->claim_photos as $claim_photo) {
                    $html .= "<li><a href='https://noritz-support-apps-19576.s3.us-west-1.amazonaws.com/{$claim_photo}' target='_blank'>View Attachment $count</a></li>";
                    $count++;
                }
                $html .= "</ul>";

                return $html;
            })
            ->asHtml()
            ,

            Code::make('Items Received', 'items_received')
                ->nullable()
                ->json()
            ,
            Textarea::make('Describe the issue', 'describe_the_issue')->alwaysShow()
            ,
            Boolean::make('I agree to the Terms and Conditions', 'i_agree_to_the_terms_and_conditions')
            ,
            DateTime::make('Created At', 'created_at')
                ->nullable()
                ->exceptOnForms()
            ,
            DateTime::make('Updated At', 'updated_at')
                ->nullable()
                ->exceptOnForms()
            ,

            DateTime::make('Archived At')->readonly(),

            NotesField::make('Notes')
                ->placeholder('Add note') // Optional
                ->addingNotesEnabled(true) // Optional
                ->fullWidth(), // Optional

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new ArchiveStatus()
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new ArchiveClaim)->canRun(function(NovaRequest $request) {
                return true;
            })
        ];
    }


    public static function indexQuery(NovaRequest $request, $query)
    {
        if (static::$defaultSort && empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];
            foreach (static::$defaultSort as $field => $order) {
                $query->orderBy($field, $order);
            }
        }

        return $query;
    }

    public static function label()
    {
        return "RGA2 Claim Forms";
    }

}
