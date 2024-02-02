<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function location() {
    	return $this->belongsTo('App\Models\Location', 'location_id');
    }
    public function listing() {
    	return $this->hasOne('App\Models\Listing', 'building_id');
    }
}
