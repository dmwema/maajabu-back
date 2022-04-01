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

    public function work()
    {
        return $this->belongsTo(Work::class, "work_id");
    }

    public function engineer()
    {
        return $this->belongsTo(Engineer::class);
    }
}
