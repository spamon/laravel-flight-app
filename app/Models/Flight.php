<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'flight_code',
        'flight_data',
    ];

    protected $casts = [
        'flight_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
