<?php

namespace App\Domain\PartsLookup\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Textarea;
use App\Domain\PartsLookup\Models\Part;
use App\Domain\PartsLookup\Action\PartsUpload;

class DemoExcel extends Action
{
    use InteractsWithQueue, Queueable;

    public $showOnTableRow = false;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        return Action::download( asset('csv/PartUploadTemplate.xlsx'), 'PartUploadTemplate.xlsx');

      //return Action::message('It worked!');

    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            // Textarea::make('Part Deatils')->rules('required'),
        ];
    }
}
