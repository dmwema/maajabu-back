<?php

namespace App\Models;

use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = [
        'pivot'
    ];

    public function works(){
        return $this->belongsToMany(Work::class);
    }
}
