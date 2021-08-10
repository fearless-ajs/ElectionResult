<?php

namespace App\Http\Livewire;

use App\Models\Announced_pu_result;
use App\Models\Polling_unit;
use Livewire\Component;

class PollingUnitResult extends Component
{
    public $units;
    public $unit;
    public $unitNo;


    public $results;

    public function mount()
    {
        $this->fetchUnits();
    }

    public function updated()
    {
        if($this->unit){
            $this->unitNo = Polling_unit::findOrFail($this->unit)->polling_unit_number;
        }
    }

    public function generate()
    {
        if (!$this->unit){
            return  $this->emit('alert', ['type' => 'error', 'message' => 'Please select a polling unit']);
        }

       $this->results =  Announced_pu_result::where('polling_unit_uniqueid', $this->unit)->get();
        if (!$this->results){
           return $this->emit('alert', ['type' => 'info', 'message' => 'No record found for this polling unit']);
        }
        return  $this->emit('alert', ['type' => 'success', 'message' => 'Record Generated']);
    }

    public function fetchUnits()
    {
        $this->units =  Polling_unit::all();
    }

    public function render()
    {
        return view('livewire.polling-unit-result');
    }
}
