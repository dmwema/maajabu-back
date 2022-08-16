<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pack_id',
        'client_type',
        'seance_type',
        'seance_qte',
        'start_date',
        'enr_type',
        'enr_type2',
        'songs_nb',
        'group_id',
        'date',
        'copies',
        'impression_proch',
        'duplication_type',
        'status',
        'total',
        'duplication_nb'
    ];

    // protected $hidden = [
    //     'pivot'
    // ]

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
