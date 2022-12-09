<?php

namespace App\Domain\Website\Products\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\Heater;
use App\Models\HeaterSeries;
use Livewire\Component;
use view;
use DB;

class Compares extends Component
{
    public $layout="products";
    public $heater_id;
    public $heater_id_second;
    public $heater_id_third;
    public $heater_detail;
    public $heater_detail_second;
    public $heater_detail_third;
    public $heater;
    public $heaters;
    public $is_active_second_heater = false;
    public $is_active_third_heater = false;
    public $feature_category_array = ['efficiency', 'btu_mode', 'heat_exchangers'];
    public $feature_category_array_data = ['efficiency'=> 'Efficiency', 'btu_mode'=>'BTU Mode
    ', 'heat_exchangers'=> 'Heat Exchangers'];
    public $spec_category_array = ['warranty', 'wifi_enabled'];
    public $spec_category_array_data = ['warranty'=> 'Warranty', 'wifi_enabled'=> 'Wifi Enabled'];

    public function mount(Request $request) {
     
      $model_numbers = explode(",",$request->model);
      if(!empty($model_numbers[0])){
        $this->heater_id =  $model_numbers[0];
      }
      if(!empty($model_numbers[1])){
        $this->is_active_second_heater = true;
        $this->heater_id_second =  $model_numbers[1];
        $this->heater_detail_second = $this->detail($this->heater_id_second);
      }
      if(!empty($model_numbers[2])){
        $this->is_active_third_heater = true;
        $this->heater_id_third =  $model_numbers[2];
        $this->heater_detail_third = $this->detail($this->heater_id_third);
      }

      $this->heaters = Heater::select('id','series','model_no')->where('model_no','!=','NULL')
      ->where('brand','Noritz Brand')->where('show_on_compare_tool', true)->get();

      $this->heaters = $this->removeElementWithValue($this->heaters, 'model_no', 'LP');
    }

    function removeElementWithValue($array, $key, $value){
      foreach($array as $subKey => $subArray){
          if(strpos($subArray[$key], $value) !== false){
                unset($array[$subKey]);
          }
      }
      return $array;
    }
    
    public function render()
    {   
      $this->product_detail();
      return view('domain.website.products.livewire.compares',[
        'heater_detail'=> $this->heater_detail,
        'heater_detail_second'=> $this->heater_detail_second,
        'heater_detail_third'=> $this->heater_detail_third,
        'heaters'=> $this->heaters,
        'is_active_second_heater'=> $this->is_active_second_heater,
        'is_active_third_heater'=> $this->is_active_third_heater
      ])->layout('domain.website.products.layout');
    }

    public function updatedHeaterId($id)
    {
      $this->heater_id = $id;
      $this->pushUrl();
    }

    public function updatedHeaterIdSecond($id)
    {
      if (!is_null($id)) {
        $this->heater_id_second = $id;
        $this->heater_detail_second = $this->detail($id); 
        $this->pushUrl();
      }
    }

    public function updatedHeaterIdThird($id)
    {
      if (!is_null($id)) {
        $this->heater_id_third = $id;
        $this->heater_detail_third = $this->detail($id); 
        $this->pushUrl();
      }
    }

    public function pushUrl(){
      // $url = 'file:///D:/python/src/compare.html?modelList=';
      $paramsArray = [];
      if($this->heater_id){
        $paramsArray[] = $this->heater_id;
      }
      if($this->heater_id_second){
        $paramsArray[] = $this->heater_id_second;
      }
      if($this->heater_id_third){
        $paramsArray[] = $this->heater_id_third;
      }
      // dd($paramsArray);
      $url = implode(",", $paramsArray);
      $this->dispatchBrowserEvent('contentChanged', ['item' => $url] );

    }

    public function updateIsActiveSecondheater(){
      $this->is_active_second_heater = !$this->is_active_second_heater;
    }

    public function updateIsActiveThirdHeater(){
      $this->is_active_third_heater = !$this->is_active_third_heater;
    }
   
    public function product_detail(){
        $this->heater_detail = Heater::with(['heaterSeries','feature_highlights','feature_specs'])->where('model_no',$this->heater_id)->where('brand','Noritz Brand')->where('show_on_compare_tool', true)->first();
    }

    

    public function detail($id){
      $detail = Heater::with(['heaterSeries','feature_highlights','feature_specs'])->where('model_no',$id)->where('brand','Noritz Brand')->where('show_on_compare_tool', true)->first();
     
      return $detail;
    }

    public function deleteHeater2(){
      if($this->heater_id_third){
        $this->is_active_second_heater = true;
        $this->heater_id_second =  $this->heater_id_third;
        $this->heater_detail_second = $this->detail($this->heater_id_second);
        $this->deleteHeater3();
      } else {
        $this->heater_id_second = null;
        $this->heater_detail_second = null;
        $this->pushUrl();
      }
      
    }

    public function deleteHeater3(){
      $this->is_active_third_heater = false;
      $this->heater_id_third =  null;
        $this->heater_detail_third = null;
        $this->pushUrl();
    }
   

  
}
