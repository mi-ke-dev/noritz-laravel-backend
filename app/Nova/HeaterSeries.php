<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\VaporImage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class HeaterSeries extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\HeaterSeries::class;

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
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            //ID::make(__('ID'), 'id')->sortable(),
            Text::make('Name','name')
            ->sortable()
            ->rules('required', 'max:255'),
            VaporImage::make('Thumbnail Store Path', 'thumbnail_store_path')->path('heater_family/' . $request->name)->download(function () {
                return Storage::disk('s3')->download($this->thumbnail_store_path, 'thumbnail_store_path.png');
            }),
            Text::make('Category','category'),
            Textarea::make('Description','description')->hideFromIndex(),
            VaporImage::make('Lifestyle Photo', 'lifestyle_photo')->path('heater_family/' . $request->name)->download(function () {
                return Storage::disk('s3')->download($this->lifestyle_photo_path, 'lifestyle_photo_path.png');
            }),
            Textarea::make('Lifestyle Photo Description','lifestyle_photo_description')->hideFromIndex()

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
