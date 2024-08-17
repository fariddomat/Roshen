<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getImagePathAttribute()
    {
        return asset('uploads/images/'. $this->img);

        // return Storage::url('images/'.$this->img);
    }
}
