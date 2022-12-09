<?php

namespace App\Domain\PartsLookup\Nova\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use App\Domain\PartsLookup\Nova\Resource;
use App\Domain\PartsLookup\Nova\Actions\BulkUpload;
use Benjacho\BelongsToManyField\BelongsToManyField;
use App\Domain\PartsLookup\Nova\Actions\DemoExcel;

/**
 * Class Part.
 */
class Part extends Resource
{
    public static $group = 'Project';

    public static $displayInNavigation = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Domain\PartsLookup\Models\Part::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'part_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'part_list_id',
        'part_number'
    ];

    public static $perPageOptions = [12, 25, 50, 100];

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

//    Number::make('ID', 'id')
//     ->hideFromIndex()
//     ->hideWhenUpdating()
//    ,
            Text::make('Part List Id', 'part_list_id')
                ->hideFromIndex()
            ,
            Text::make('Keyword', 'keyword')
                ->hideFromIndex()
            ,
            Text::make('Part Description En', 'part_description_en')
                ->hideFromIndex()->rules('required')
            ,
//   Text::make('Part Description Jp', 'part_description_jp')
//    ->hideFromIndex()
//   ,
            Text::make('Part Number', 'part_number')
            ,
            Select::make('Available For Sale', 'available_for_sale')->options([
                'Y' => 'Yes',
                'N' => 'No'
            ])->rules('required'),
            Text::make('Version', 'version')
            ,
            Text::make('Sequence', 'sequence')
            ,
            Text::make('Upgrade Reason En', 'upgrade_reason_en')
            ,
            Text::make('Serial # Information', 'serial_num_information')
            ,
//   Text::make('Upgrade Reason Jp', 'upgrade_reason_jp')
//   ,
            // BelongsToMany::make('Applicable Models', 'applicable_models')
            //     ,
            BelongsToManyField::make('Applicable Models', 'heaters', 'App\Nova\Resources\Heater')
                ->relationModel(\App\Models\Heater::class)
                ->optionsLabel('model_no')
                ->hideFromIndex()
            ,

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
        return [];
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
            BulkUpload::make()->standalone()
                ->confirmText('Are you sure you want to activate this user?')
                ->confirmButtonText('Upload')
                ->cancelButtonText("Cancel"),
            DemoExcel::make()->standalone()
                ->confirmText('Do you want to download sample file?')
                ->confirmButtonText('Download')
                ->cancelButtonText("Cancel"),
        ];
    }

}
