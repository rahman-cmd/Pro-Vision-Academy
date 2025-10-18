<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading_title',
        'image',
        'image_title',
        'status',
    ];



    /**
     * Scope to get active gallery items.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    /**
     * Check if gallery item is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

}
