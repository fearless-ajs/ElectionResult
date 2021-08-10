<?php

namespace App\Http\Livewire;

use App\Models\Announced_pu_result;
use App\Models\Lga;
use App\Models\Polling_unit;
use Livewire\Component;

class LgaResult extends Component
{
    public $lgas;
    public $units;
    public $results;

    public $lga;


    public function mount()
    {
        $this->fetchLgas();
    }

    public function fetchLgas()
    {
        $this->lgas = Lga::all();
    }

    public function fetchUnits(){
        $this->units = Polling_unit::where('lga_id', $this->lga)->get();
        if (count($this->units) >= 1){
            return true;
        }
        return false;
    }


    public function generate()
    {
        //Check if the user selects a local government area
        if (!$this->lga){
            return  $this->emit('alert', ['type' => 'error', 'message' => 'Please select a Local Government Area']);
        }

        if($this->fetchUnits() == false){
            return  $this->emit('alert', ['type' => 'info', 'message' => 'No Result found']);
        }
        return  $this->emit('alert', ['type' => 'success', 'message' => 'Results Generated']);
    }

    public function render()
    {
        return view('livewire.lga-result');
    }
}
