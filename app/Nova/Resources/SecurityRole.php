<?php

namespace App\Nova\Resources;

use App\Domain\TechnicalInfo\Nova\Resource;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;

/**
* Class SecurityRole.
*/
class SecurityRole extends Resource
{
    public static $group = 'Project';

    public static $displayInNavigation = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\SecurityRole::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
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

            // Number::make('ID', 'id')
            //     ->hideFromIndex()
            //     ,
            Text::make('Name', 'name')
                ,
            HasMany::make('Attachment Security Templates', 'attachmentSecurityTemplates', 'App\Domain\TechnicalInfo\Nova\Resources\AttachmentSecurityTemplate')
            // BelongsToMany::make('Users', 'users')
            //     ->hideFromIndex()
            //     ,


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

        ];
    }

}
