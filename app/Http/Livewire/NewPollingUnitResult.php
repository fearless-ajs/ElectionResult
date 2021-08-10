<?php

namespace App\Http\Livewire;

use App\Models\Party;
use App\Models\Announced_pu_result;
use App\Models\Polling_unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class NewPollingUnitResult extends Component
{
    public $units;
    public $parties;

    //For input fields
    public $unit;
    public $party;
    public $score;

    public function mount()
    {
        $this->fetchUnits();
        $this->fetchParties();
    }

    public function fetchUnits()
    {
        $this->units =  Polling_unit::all();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
           'party' => 'required|max:255',
           'unit'  => 'required',
        ]);
    }
    public function save()
    {
        $this->validate([
            'party' => 'required|max:255',
            'unit'  => 'required',
        ]);


      $result =  Announced_pu_result::where('polling_unit_uniqueid', $this->unit)
                             ->where('party_abbreviation', $this->party)->first();
       //If result exists, then update it
       if ($result){
          //update and return
          Announced_pu_result::where('polling_unit_uniqueid', $this->unit)
              ->where('party_abbreviation', $this->party)->update([
               'party_score'     => $this->score,
               'date_entered'    => Carbon::now()->toDateTimeString(),
               'user_ip_address' => Request::ip()
           ]);

          return $this->emit('alert', ['type' => 'success', 'message' => 'Polling Unit Result Updated']);

       }

       //If result not exist then create new result
       Announced_pu_result::create([
           'polling_unit_uniqueid'  => $this->unit,
           'party_abbreviation'     => $this->party,
           'party_score'                  => $this->score,
           'date_entered'           => Carbon::now()->toDateTimeString(),
           'user_ip_address'        => Request::ip()
       ]);
       $this->score = '';
        return $this->emit('alert', ['type' => 'success', 'message' => 'Polling Unit Result Inserted']);
    }

    public function fetchParties()
    {
        $this->parties = Party::all();
    }

    public function render()
    {
        return view('livewire.new-polling-unit-result');
    }
}
