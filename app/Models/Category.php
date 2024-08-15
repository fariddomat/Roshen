<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    //
    protected $guarded=[];
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('name','like',"%$search%");
        });
    }



    public function getImagePathAttribute()
    {
        return asset('uploads/images/'. $this->img);

        // return Storage::url('images/'.$this->img);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
