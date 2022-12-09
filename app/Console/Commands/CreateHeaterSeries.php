<?php

namespace App\Console\Commands;

use App\Models\Heater;
use App\Models\HeaterSeries;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateHeaterSeries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:heater_series';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create heater series';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        HeaterSeries::truncate();
      $heaters = Heater::select('id','series','series_image')->where('series','!=','NULL')->get();
        if(!empty($heaters)){
           foreach($heaters as $heater){
                if(!empty($heater->series)){
                    $heater_family = HeaterSeries::where('name',$heater->series)->first();
                    if(empty($heater_family)){
                      $uuid=Str::uuid()->toString();
                      $heater_family = new HeaterSeries();
                      $heater_family->id=$uuid;
                      $heater_family->name  = $heater->series;
                      $heater_family->thumbnail_store_path = $heater->series_image;
                      $heater_family->save();
                    }
                    $heater->heater_family_id=$heater_family->id;
                    $heater->save();
                    //Heater::where('series',$heater->series)->update(array('heater_family_id'=>$heater_family->id));
               }

            }
        }
    }
}
