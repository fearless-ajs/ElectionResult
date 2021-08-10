<?php

namespace App\Http\Livewire;

use App\Models\Announced_pu_result;
use Livewire\Component;

class LgaPollingUnitResult extends Component
{
    public $results;

    public function mount($unit)
    {
        $this->fetchUnitResult($unit);
    }

    public function fetchUnitResult($unit)
    {
        $this->results = Announced_pu_result::where('polling_unit_uniqueid', $unit->id)->get();
    }

    public function render()
    {
        return view('livewire.lga-polling-unit-result');
    }
}
