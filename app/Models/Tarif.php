<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price'];

    protected $hidden = [
        'pivot'
    ];

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
