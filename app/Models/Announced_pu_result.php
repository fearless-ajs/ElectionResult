<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announced_pu_result extends Model
{
    protected $guarded = [];


    public function pollingUnit ()
    {
        return $this->belongsTo(Polling_unit::class, 'polling_unit_uniqueid');
    }

    use HasFactory;
}
