<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use PhpParser\ErrorHandler\Collecting;

class Project extends Model
{

    protected $guarded = [];
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }


    public function scopeWhenPrice($query, $price)
    {
        if ($price) {
            $price = array_map('intval', explode(' ', $price));
            return $query->when($price, function ($q) use ($price) {
                return $q->whereHas('apartments', function ($q1) use ($price) {
                    return $q1->where('price', '<=', $price[2])->where('price', '>=', $price[0]);
                });
            });
        }
    }

    public function scopeWhenRoom($query, $room)
    {
        if ($room) {
            $room = array_map('intval', explode(' ', $room));
            return $query->when($room, function ($q) use ($room) {
                return $q->whereHas('apartments', function ($q1) use ($room) {
                    return $q1->where('room_count', '<=', $room[2])->where('room_count', '>=', $room[0]);
                });
            });
        }
    }

    public function scopeWhenArea($query, $area)
    {
        if ($area) {
            $area = array_map('intval', explode(' ', $area));
            return $query->when($area, function ($q) use ($area) {
                return $q->whereHas('apartments', function ($q1) use ($area) {
                    return $q1->where('area', '<=', $area[2])->where('area', '>=', $area[0]);
                });
            });
        }
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function propertie()
    {
        return $this->hasOne(Propertie::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function facility()
    {
        return $this->hasOne(Facility::class);
    }

    public function getAApartmentAttribute()
    {
        $q = $this->apartments()->where('appendix', '<>', 'on')->get();
        if ($q->count() > 0) {
            return $q;
        }
        return false;
    }

    public function getFrontApartmentAttribute()
    {
        $q = $this->apartments()->where('appendix', '<>', 'on')->where('type', 'شقة أمامية')->get();

        if ($q->count() > 0) {
            return $q;
        }
        return false;
    }

    public function getBackApartmentAttribute()
    {
        $q = $this->apartments()->where('appendix', '<>', 'on')->where('type', 'شقة خلفية')->get();

        if ($q->count() > 0) {
            return $q[0];
        }
        return false;
    }

    public function getAppendixApartmentAttribute()
    {
        $q = $this->apartments()->where('appendix', 'on')->get();
        if ($q->count() > 0) {
            return $q[0];
        }
        return false;
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function getPosterPathAttribute()
    {
        return asset('uploads/images/' . $this->id . '/' . $this->img);
        // return Storage::url('images/' . $this->id . '/' . $this->img);
    }
    public function getCoverImgPathAttribute()
    {
        return asset('uploads/images/' . $this->id . '/' . $this->cover_img);
    }
    public function getImagePathAttribute()
    {
        if ($this->projectImages()->exists()) {
            foreach ($this->projectImages as $key => $value) {
                return asset('uploads/images/' . $this->id . '/' . $value->img);

                // return Storage::url('images/' . $this->id . '/' . $value->img);
            }
        }
    }
    public function getImagesPathAttribute()
    {
        $array = [];
        if ($this->projectImages()->exists()) {
            foreach ($this->projectImages as $key => $value) {
                array_push(
                    $array,
                    asset('uploads/images/' . $this->id . '/' . $value->img)
                );
            }
        }
        return $array;
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function FloorRow($id)
    {
        $q = $this->floors->where('floor_id', $id)->where('apartment_id');
        // dd($q);
        $q1 = collect();
        $q2 = collect();
        $q3 = collect();
        $b = false;

        foreach ($q as $key => $floor) {
            if ($floor->apartment->type == "أمامية") {
                $q2->push($floor);
            } elseif ($floor->apartment->type == "خلفية") {
                $q1->push($floor);
            }else{
                $q3->push($floor);
            }
        }

        $index = $q2->count() / 2; // Get the middle index of the second collection

        $q2->splice($index, 0, $q3); // Insert $q3 in the middle of $q2

        $q4=$q2->flatten();

        $index = $q4->count() / 2; // Get the middle index of the second collection

        $q4->splice($index, 0, $q1); // Insert $q1 in the middle of $q2

        return $q4->flatten();
    }

    public function backCount($id, $a_id)
    {
        // dd($this->FloorRow($id)->where("apartment_id",$a_id)->count());
        return $this->FloorRow($id)->where("apartment_id", $a_id)->count();
    }

    public function backCount2($id)
    {
        $back = $this->apartments->where('type', 'خلفية');
        // dd($back->pluck('id'));
        // dd($this->FloorRow($id)->whereIn("apartment_id",$back->pluck('id'))->count());
        return $this->FloorRow($id)->whereIn("apartment_id", $back->pluck('id'))->count();
    }

    public function getAppendixxCountAttribute()
    {
        $id = $this->floors_count;
        $a = $this->apartments->where('type', 'ملحق');
        // dd($a);
        return $this->FloorRow($id)->whereIn("apartment_id", $a->pluck('id'))->count();
    }

    public function pdfs()
    {
        return $this->hasMany(Pdfm::class);
    }
}
