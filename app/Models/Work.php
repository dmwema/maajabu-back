<?php

namespace App\Models;

use App\Models\Artist;
use App\Models\Engineer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','engineer_id','artist_id'];

    protected $hidden = [
        'pivot'
    ];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function engineer(){
        return $this->belongsTo(Engineer::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
