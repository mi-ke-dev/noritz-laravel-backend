<?php

namespace App\Domain\ClaimForms\Nova\Resources;

use App\Nova\Actions\ArchiveClaim;
use App\Nova\Filters\ArchiveStatus;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Domain\ClaimForms\Nova\Resource;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Code;

;

use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use OptimistDigital\NovaNotesField\NotesField;

/**
 * Class RGA1ClaimForm.
 */
class RGA1ClaimForm extends Resource
{

    public static $group = 'Claim Forms';

    public static $displayInNavigation = true;

    public static $defaultSort = ['created_at' => 'desc'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Domain\ClaimForms\Models\RGA1ClaimForm::class;

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
        'phone',
        'email'
    ];

    public static $perPageOptions = [12, 25, 50, 100];

    public function fieldsForIndex(NovaRequest $request)
    {
        return [

            Text::make('Claim Id', function () {

                $number = 100000000 + $this->claim_id;
                return 'A' . Str::padLeft($number, 9);
            })
                ->sortable()
            ,
            Text::make('Name', 'name')
                ->sortable()
                ->nullable()
            ,
            Text::make('Phone', 'phone')
                ->sortable()
                ->nullable()
            ,
            Text::make('Email', 'email')
                ->sortable()
            ,

            DateTime::make('Created At', 'created_at')
                ->sortable()
                ->nullable()
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
                return 'A' . Str::padLeft($number, 9);
            })
            ,
            Text::make('Company/Customer Name', 'companycustomer_name')
                ->hideFromIndex()
                ->nullable()
            ,
            Text::make('Sales Order Number', 'sales_order_number')
                ->hideFromIndex()
                ->nullable()
            ,
            Text::make('Customer Reference Number', 'customer_reference_number')
                ->hideFromIndex()
                ->nullable()
            ,
            Text::make('Customer Purchase Order Number', 'customer_purchase_order_number')
                ->hideFromIndex()
                ->nullable()
            ,
            Code::make('Items', 'items')
                ->nullable()
            ,
            Textarea::make('Describe the issue', 'describe_the_issue')
            ,
            Boolean::make('Has the box been opened?', 'has_the_box_been_opened')
                ->nullable()
            ,
            Boolean::make('Has the item been installed?', 'has_the_item_been_installed')
                ->nullable()
            ,
            Boolean::make('Is the item(s) in new resalable condition?', 'is_the_items_in_new_resalable_condition')
                ->nullable()
            ,
            Textarea::make('Reason for return?', 'reason_for_return')
                ->nullable()
            ,
            Text::make('Name', 'name')
                ->nullable()
            ,
            Text::make('Phone', 'phone')
                ->nullable()
            ,
            Text::make('Email', 'email')
            ,
            Text::make('Email (Confirm)', 'email_confirm')
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
        return "RGA1 Claim Forms";
    }
}
