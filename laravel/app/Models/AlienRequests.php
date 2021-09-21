<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlienRequests extends Model
{
    protected $table = 'alien_requests';
    protected $fillable = [
        'internalId',
        'requestName',
        'requestNumber',
        'direction',
        'route'
    ];
    use HasFactory;
}
