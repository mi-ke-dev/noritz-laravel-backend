<?php

namespace App\Domain\ClaimForms\Nova\Resources;

use App\Nova\Actions\ArchiveClaim;
use App\Nova\Filters\ArchiveStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Domain\ClaimForms\Nova\Resource;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;

/**
 * Class Submission.
 */
class Submission extends Resource
{


    public static $defaultSort = ['created_at' => 'desc'];

    public static $group = 'Claim Forms';

    public static $displayInNavigation = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Domain\ClaimForms\Models\Submission::class;

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
        'claim_id'
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
            Text::make('Claim Id'),
            Text::make('Submission Type')
                ->displayUsing(function ($str) {
                    if (Str::contains($str, 'RGA1ClaimForm')) {
                        return 'RGA1';
                    }

                    if (Str::contains($str, 'RGA2ClaimForm')) {
                        return 'RGA2';
                    }

                    if (Str::contains($str, 'RMAClaimForm')) {
                        return 'RMA';
                    }
                }),
            Text::make('Email')
                ->sortable(),
            DateTime::make('Submitted At')
                ->sortable(),
            DateTime::make('Archived At')->readonly(),
            Text::make('View', function () {
                if (Str::contains($this->submission_type, 'RGA1ClaimForm')) {
                    $path = 'r-g-a1-claim-forms';
                }

                if (Str::contains($this->submission_type, 'RGA2ClaimForm')) {
                    $path = 'r-g-a2-claim-forms';
                }

                if (Str::contains($this->submission_type, 'RMAClaimForm')) {
                    $path = 'r-m-a-claim-forms';
                }

                return "<a href='/nova/resources/$path/{$this->submission_id}'>View</a>";
            })->asHtml()
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

}
