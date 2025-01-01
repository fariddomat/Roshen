<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];

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

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class);
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFAQ::class);
    }
}
