<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading_title',
        'cover_image',
        'card_title_1',
        'card_title_2',
        'card_title_3',
        'card_title_4',
        'card_content_1',
        'card_content_2',
        'card_content_3',
        'card_content_4',
        'status',
    ];

    /**
     * Scope to get active sections.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    /**
     * Check if section is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Check if section has an icon.
     */
    public function hasIcon(): bool
    {
        return !empty($this->icon);
    }
}
