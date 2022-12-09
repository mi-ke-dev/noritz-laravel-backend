<?php

namespace App\Domain\Website\Products\Http\Livewire;

use App\Models\Heater;
use App\Models\HeaterSeries;
use Livewire\Component;
use view;
use DB;

class Products extends Component
{

    public $commercial_heaters=array(), $residental_heaters=array(),$size=[],$type=[],$features=[],$install_location=[],$efficiency=[],$residental_total=0,$commercial_total=0,$heater_type=[],$filter_heater_total=0,$search_heaters=array(),$heater_series=array(),$heater=array();
    public $perPage = 3,$everyLoadHeater=6;
    public $layout="products";
    public $ifremUrl = '';
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount() {
        $this->residental_heaters();
        $this->commercial_heaters();
    }
    public function refresh(){
        $this->perPage =3;
        $this->heater_series ="";
        $this->residental_heaters();
        $this->commercial_heaters();
    }
    public function filter_refresh(){
        $this->perPage = 3;
        $this->heater_series ="";
        $this->search_heaters = [];
        $this->heater_type = [];
        $this->type=[];
        $this->size = [];
        $this->features = [];
        $this->install_location =[];
        $this->efficiency = [];
        $this->residental_heaters();
        $this->commercial_heaters();
    }
    public function render()
    {
        $this->ifremUrl = env('IFREM_URL');
        if(!empty($this->heater_type) || !empty($this->size) || !empty($this->type) || !empty($this->features) || !empty($this->install_location) || !empty($this->efficiency)){
            $search_heaters = HeaterSeries::whereHas('heaters', function($q){
                if(!empty($this->heater_type)){
                   $q->whereIn(DB::raw('lower(model_type)'),$this->heater_type);

                }
                if(!empty($this->size)){
                    $q->whereIn("sizing",$this->size);
                }
                if(!empty($this->type)){
                    $q->whereIn("type",$this->type);
                }
                if(!empty($this->features)){
                    $q->whereIn("features",$this->features);
                }
                if(!empty($this->install_location)){
                    $q->whereIn("install_location",$this->install_location);
                }
                if(!empty($this->efficiency)){
                    $q->whereIn("thermal_efficiency",$this->efficiency);
                }
            })->orderBy('sort_order','asc');
            $this->filter_heater_total = $search_heaters->count();
            $this->search_heaters = $search_heaters->limit($this->perPage)->get();

        }

        if($this->layout=='product_detail'){
            return view('domain.website.products.livewire.product_detail')->layout('domain.website.products.layout');
         }else{
          return view('domain.website.products.livewire.products')->layout('domain.website.products.layout');
        }

    }
    public function residental_heaters(){
        $residental_heaters = HeaterSeries::whereHas('heaters', function($q){
            //$q->where("residential_or_commercial",'like','%'.'residential'.'%');
            $q->where(DB::raw('lower(model_type)'), 'residential');
        })->orderBy('sort_order','asc');
        $this->residental_total = $residental_heaters->count();

        //$residental_heaters = $residental_heaters->paginate($this->perPage);
       // $this->residental_heaters = collect($residental_heaters->items());
        $this->residental_heaters = $residental_heaters->limit($this->perPage)->get();

    }
    public function more_residental_heaters(){
        $this->perPage = $this->perPage + $this->everyLoadHeater;
        $this->residental_heaters();
        $this->commercial_heaters ='';

    }
    public function commercial_heaters(){
        $commercial_heaters = HeaterSeries::whereHas('heaters', function($q){
            //$q->where("residential_or_commercial",'like','%'.'commercial'.'%');
            $q->where(DB::raw('lower(model_type)'), 'commercial');
        })->orderBy('sort_order','asc');

        $this->commercial_total= $commercial_heaters->count();
        // $commercial_heaters = $commercial_heaters->paginate($this->perPage);
        // $this->commercial_heaters = collect($commercial_heaters->items());
        $this->commercial_heaters = $commercial_heaters->limit($this->perPage)->get();

    }

    public function more_commercial_heaters(){
        $this->perPage = $this->perPage + $this->everyLoadHeater;
        $this->commercial_heaters();
        $this->residental_heaters ='';

    }
    public function loadMore(){
        $this->perPage = $this->perPage + $this->everyLoadHeater;
        if($this->residental_heaters){
            $this->residental_heaters();
        }else{
            $this->commercial_heaters();
        }
    }
    public function heater_series($id){
      $this->heater_series  =   HeaterSeries::with(['heaters' => function ($query) {
                                    //$query->limit(1);
                                }])->where('id',$id)->first();

    }
    public function product_detail($heater_id){
        $this->layout='product_detail';
        $this->heater= Heater::with(['heaterSeries','feature_highlights','feature_specs'])->where('id',$heater_id)->first();
    }
}
