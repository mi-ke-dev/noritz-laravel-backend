<?php

namespace App\Domain\PartsLookup\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Textarea;
use Illuminate\Support\Collection;
use App\Domain\PartsLookup\Models\Part;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use App\Domain\PartsLookup\Action\PartsUpload;
use Illuminate\Contracts\Queue\ShouldQueue;

class BulkUpload extends Action
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

    public $name = 'Bulk Parts Upload';
    public function handle(ActionFields $fields, Collection $models)
    {
      //echo json_encode(request()->all());
      $pu = (new PartsUpload)->import(request('part_deatils'));
      if($pu['status']){
        return Action::message('It worked!');
      } else {
        return Action::danger($pu['msg']);
      }

    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Heading::make('<p class="text-danger">*Note : If the ParListID and PartNumber already exsists in database, it will be updated with data you uploading.</p>')->asHtml(),

            Textarea::make('Upload Data (Copy data from excel template and past it to inputfield on the right side.)', 'part_deatils')
            ->rules('required')
            ->rows(10),
        ];
    }
}
