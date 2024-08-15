<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    protected $guarded=[];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
