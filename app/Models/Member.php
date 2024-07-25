<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'table',
        'colorcode',
        'GCcode',
        'SM',
        'ASM',
        'Territory_name',
        'To_slab',
        'Outlet_name',
        'town',
        'Dealername',
        'DealerNic',
        'Telephone',
        'transportrequired',
        'busallocation',
        'conform',
        // Add other fields as needed
    ];
}
