<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling_unit extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function lga()
    {
      return $this->belongsTo(Lga::class, 'lga_id');
    }

}
