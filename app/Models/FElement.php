<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FElement extends Model
{
    use HasFactory;

    protected $table = "felements";

    protected $fillable = [
        'name',
        'fx',
        'level',
        'comment',
        'ftitle_id',
        'file_id',
    ];

    public function ftitle()
    {
        $this->belongsTo(FTitle::class, 'ftitle_id');
    }
}
