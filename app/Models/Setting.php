<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'email',
        'phone',
        'address',
        'logo',
        'favicon',
        'description',
        'copyright',
        'google_analytics',
        'google_maps',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'status',
    ];
}