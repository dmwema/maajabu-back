<?php

namespace App\Models;

use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function works(){
        return $this->hasMany(Work::class);
    }
}
