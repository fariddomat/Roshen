<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Propertie extends Model
{
    //
    protected $guarded=[];

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('title','like',"%$search%");
        });
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/images/'. $this->img);

        // return Storage::url('images/'.$this->img);

    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
