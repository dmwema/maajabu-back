<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FTitle extends Model
{
    use HasFactory;
    protected $table = "ftitles";

    function elements()
    {
        return $this->hasMany(FElement::class, 'ftitle_id');
    }
}
