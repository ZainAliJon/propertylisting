<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function building() {
    	return $this->hasOne('App\Models\Building', 'location_id');
    }
}
