<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Apartment extends Model
{
    //
    protected $guarded=[];

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('title','like',"%$search%");
        });
    }

    // public function getImagePathAttribute()
    // {
    //     return asset('uploads/images/' . $this->project->id . '/' . $this->img);

    //     // return Storage::url('images/' . $this->project->id . '/' .$this->img);

    // }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function apartmentImages()
    {
        return $this->hasMany(ApartmentImage::class);
    }

    public function getImagePathAttribute()
    {
        if ($this->apartmentImages()->exists()) {
            foreach ($this->apartmentImages as $key => $value) {
                return asset('uploads/images/apartments/' . $this->id . '/' . $value->img);

                // return Storage::url('images/' . $this->id . '/' . $value->img);
            }
        }
    }
    public function getImagesPathAttribute()
    {
        $array = [];
        if ($this->apartmentImages()->exists()) {
            foreach ($this->apartmentImages as $key => $value) {
                array_push(
                    $array,
                    asset('uploads/images/apartments/' . $this->id . '/' . $value->img)
                );
            }
        }
        return $array;
    }
}
