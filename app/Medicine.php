<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    // protected $table = 'medicine';
    protected $fillable = [
        'name_english', 'qty', 'price'
    ];

    public function prescriptions(){
        return $this->belongsToMany('App\Prescription');
    }
}
