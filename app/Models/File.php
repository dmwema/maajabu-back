<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Function_;

class File extends Model
{
    use HasFactory;

    public function titles()
    {
        return $this->hasMany(FTitle::class);
    }
}
