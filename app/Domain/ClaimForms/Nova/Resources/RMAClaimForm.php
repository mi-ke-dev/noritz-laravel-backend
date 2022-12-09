<?php

namespace App\Domain\ClaimForms\Nova\Resources;

use App\Nova\Actions\ArchiveClaim;
use App\Nova\Filters\ArchiveStatus;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Domain\ClaimForms\Nova\Resource;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use OptimistDigital\NovaNotesField\NotesField;

/**
* Class RMAClaimForm.
*/
class RMAClaimForm extends Resource
{
    public static $group = 'Claim Forms';

    public static $displayInNavigation = true;

    public static $defaultSort = ['created_at' => 'desc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Domain\ClaimForms\Models\RMAClaimForm::class;

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
        'name',
        'email',
        'fax_number',
    ];

    public static $perPageOptions = [12, 25, 50, 100];

    public function fieldsForIndex(NovaRequest $request)
    {
        return [

            Text::make('Claim Id', function () {

                $number = 100000000 + $this->claim_id;
                return 'B' . Str::padLeft($number, 9);
            })
                ->sortable()
            ,

            Text::make('Name', 'name')
                ->nullable()
                ->sortable()
            ,
            Text::make('Email', 'email')
                ->sortable()
            ,
            Text::make('Fax Number', 'fax_number')
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
                return 'B' . Str::padLeft($number, 9);
            })
            ,

            Select::make('Party requesting the RMA and responsible for charges?', 'party_requesting_the_rma_and_responsible_for_charges')
                ->hideFromIndex()
                ->options(\App\Domain\ClaimForms\Enums\ChargeParty::choices())
                ->displayUsingLabels()
                ->nullable()
                ,
            Text::make('Noritz Distributor', 'noritz_distributor')
                ->hideFromIndex()
                ->nullable()
                ,
            Text::make('Contact Name', 'contact_name')
                ->hideFromIndex()
                ->nullable()
                ,
            Text::make('Distributor Address', 'distributor_address')
                ->hideFromIndex()
                ->nullable()
                ,
            Text::make('Phone Number', 'phone_number')
                ->nullable()
                ,
            Text::make('Noritz Sales Representative', 'noritz_sales_representative')
                ->nullable()
                ,
            Text::make('Installing Company', 'installing_company')
                ->nullable()
                ,
            Text::make('Installer Contact', 'installer_contact')
                ->nullable()
                ,
            Text::make('Installer Phone Number', 'installer_phone_number')
                ->nullable()
                ,
            Text::make('Noritz Engineer', 'noritz_engineer')
                ->nullable()
                ,
            Text::make('Installer Address', 'installer_address')
                ->nullable()
                ,
            Text::make('Owner Name', 'owner_name')
                ->nullable()
                ,
            Text::make('Owner Phone Number', 'owner_phone_number')
                ->nullable()
                ,
            Text::make('Installation Address', 'installation_address')
                ->nullable()
                ,
            Text::make('Return Shipping Address', 'return_shipping_address')
                ->nullable()
                ,
            Text::make('Model Number', 'model_number')
                ->nullable()
                ,
            Select::make('Gas Type', 'gas_type')
                ->options(\App\Domain\ClaimForms\Enums\GasType::choices())
                ->displayUsingLabels()
                ->nullable()
                ,
            Text::make('Serial Number', 'serial_number')
                ->nullable()
                ,
            Select::make('Application Type', 'application_type')
                ->options(\App\Domain\ClaimForms\Enums\ApplicationType::choices())
                ->displayUsingLabels()
                ->nullable()
                ,
            Select::make('Recirculation Pump', 'recirculation_pump')
                ->options(\App\Domain\ClaimForms\Enums\YesNo::choices())
                ->displayUsingLabels()
                ->nullable()
                ,
            Textarea::make('Reason For Return', 'reason_for_return')
                ->nullable()
                ,
            Boolean::make('Return Box', 'return_box')
                ->nullable()
                ,
            Boolean::make('Return Remote Controller', 'return_remote_controller')
                ->nullable()
                ,
            Boolean::make('Return Remote Cord', 'return_remote_cord')
                ->nullable()
                ,
            Text::make('Other', 'other')
                ->nullable()
                ,
            Select::make('Pre-Approve the Total amount for Repair', 'preapprove_the_total_amount_for_repair')
                ->options(\App\Domain\ClaimForms\Enums\PreApproveRepairTotals::choices())
                ->displayUsingLabels()
                ->nullable()
                ,
            Boolean::make('Box Purchase (Distributors Only)', 'box_purchase_distributors_only')
                ->nullable()
                ,
            Boolean::make('Remote Controller Purchase (Distributors Only)', 'remote_controller_purchase_distributors_only')
                ->nullable()
                ,
            Boolean::make('Remote Cord Purchase (Distributors Only)', 'remote_cord_purchase_distributors_only')
                ->nullable()
                ,
            Text::make('Initials', 'initials')
                ->nullable()
                ,
            Boolean::make('Accept Terms and Conditions', 'accept_terms_and_conditions')
                ,
            Text::make('Name', 'name')
                ->nullable()
                ,
            Text::make('Email', 'email')
                ,
            Text::make('Fax Number', 'fax_number')
                ->nullable()
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
        return "RMA Claim Forms";
    }

}
