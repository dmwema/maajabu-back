<?php

namespace App\Models;

use App\Models\Studio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['img_url'];

    public function studio(){
        return $this->belongsTo(Studio::class);
    }
}
