<?php

namespace App\Models;

use App\Models\Studio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social_network extends Model
{
    use HasFactory;

    protected $fillable = ['name','studio_id'];

    public function studio(){
        return $this->belongsTo(Studio::class);
    }
}
