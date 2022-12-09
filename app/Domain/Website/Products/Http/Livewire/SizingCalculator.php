<?php

namespace App\Domain\Website\Products\Http\Livewire;

use App\Models\Heater;
use App\Models\HeaterSeries;
use Livewire\Component;
use view;
use DB;
use heaterArray;
use Session;

class SizingCalculator extends Component
{
    public $steps = 0;
    public $zip_code;
    public $noofShower = 1;
    public $bodySpray="no";
    public $recirculation="no";
    public $replaceBoliler="no";
    public $heaters = array();
    public $color;
    public $modelOfHeater;
    public $contactNotrizMessage;
    public $recursionVar;
    //public $defaultValue="no";

    protected $rules = [
        'zip_code' => 'required|min:5',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount()
    {
    }
    public function render()
    {
        return view('domain.website.products.livewire.sizing')->layout('domain.website.products.layout');
    }
    public function increment()
    {
        if ($this->noofShower < 4) {
            $this->noofShower++;
        } else {
            session()->flash('info', "You Can't Enter More Number");
        }
    }
    public function decrement()
    {
        if ($this->noofShower > 1) {
            $this->noofShower--;
        } else {
            session()->flash('info', "You Can't Enter Negative Number");
        }
    }
    public function stepscount($steps)
    {
        $this->steps = $steps;
    }
    public function stepOneSubmit()
    {
        $validatedData = $this->validate();
        $items = DB::table('wp_noritz_gwt')
            ->select('zip_code', 'color')
            ->where('zip_code', '=', $validatedData['zip_code'])
            ->first();
        if ($items) {
            $this->color = $items->color;
            switch ($this->color) {
                case 'BR':
                    $this->color = 'brown';
                    break;
                case 'BL':
                    $this->color = 'blue';
                    break;
                case 'GN':
                    $this->color = 'green';
                    break;
                case 'YL':
                    $this->color = 'yellow';
                    break;
                case 'OR':
                    $this->color = 'orange';
                    break;
                case 'RD':
                    $this->color = 'red';
                    break;
                case 'GR':
                    $this->color = 'grey';
                    break;
            }
            $this->stepscount(2);
        } else {
            session()->flash('invalidZipCode', "Most likely we're having trouble matching your zip code. Please check to ensure you've entered a 5-digit zip code and try again.");
        }
    }
    public function stepTwoSubmit()
    {
        $validatedData = $this->validate(
            [
                'noofShower' => 'required',
                'recirculation' => 'required',
            ],
            // [
            //     'recirculation.required' => 'This Field is Required',
            // ]
        );

        $residnetialArry = config('residential-sizing-calculator.rules');
        $recirculationArray = config('residential-sizing-calculator.recirculation');
        // dd($recirculationArray);
        if (in_array($residnetialArry[$this->color], $residnetialArry)) {
            $this->modelOfHeater = $residnetialArry[$this->color][$this->noofShower];
            //dd($this->modelOfHeater);
            if ($this->modelOfHeater == 'Contact Noritz') {
                $this->contactNotrizMessage = "A Noritz Tankless Water Heater is ideal for any household size, but for larger bathroom configurations,  there are additional factors that may come into play when choosing the best unit for you.
                In order to complete this process, please contact Noritz using one of the methods below";
                $this->stepscount(3);
            } elseif (in_array($this->modelOfHeater, array_keys($recirculationArray)) && $this->recirculation == 'yes') {
                $this->modelOfHeater = $recirculationArray[$this->modelOfHeater];
            }
            //dd($this->modelOfHeater,$recirculationArray,$this->recirculation);
            $this->stepThreeSubmit();
            $this->stepscount(3);
        }
    }
    public function stepThreeSubmit()
    {
        // $this->heater = Heater::where("name", $this->modelOfHeater)->limit(5)->get();
        $this->heaters = Heater::where("name", $this->modelOfHeater)->get();
    }

    public function getDownloadFile($field_name, $model_no) {

        $model_no = str_replace("[","%5B",$model_no);
        $model_no = str_replace("]","%5D",$model_no);
        return "/file-download/" . $model_no . "/". $field_name;
      }

}
