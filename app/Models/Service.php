<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Tarif;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','tarif_id','img_url'];

    protected $hidden = [
        'pivot'
    ];

    public function tarifs(){
        return $this->belongsToMany(Tarif::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
    // public function image(){
    //     return $this->morphOne(Image::class,'imageable');
    // }
}
