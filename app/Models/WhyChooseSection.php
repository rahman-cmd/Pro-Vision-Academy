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
     * Check if section has a cover image.
     */
    public function hasCoverImage(): bool
    {
        return !empty($this->cover_image);
    }

    /**
     * Get full URL for cover image if stored as a path.
     */
    public function getCoverImageUrlAttribute(): ?string
    {
        if (!$this->cover_image) {
            return null;
        }
        // Return as-is if it's an external URL
        if (str_starts_with($this->cover_image, 'http://') || str_starts_with($this->cover_image, 'https://')) {
            return $this->cover_image;
        }
        // Otherwise, treat as local storage path
        return asset($this->cover_image);
    }
}
