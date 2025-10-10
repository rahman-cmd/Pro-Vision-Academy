<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'country',
        'specialization',
        'bio',
        'image',
        'title',
        'institution',
        'achievements',
        'type',
        'linkedin',
        'website',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    /**
     * Scope to get active speakers.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope to get international speakers.
     */
    public function scopeInternational($query)
    {
        return $query->where('type', 'international');
    }

    /**
     * Scope to get local speakers.
     */
    public function scopeLocal($query)
    {
        return $query->where('type', 'local');
    }

    /**
     * Scope to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Check if speaker is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Check if speaker is international.
     */
    public function isInternational(): bool
    {
        return $this->type === 'international';
    }

    /**
     * Get the speaker's full title with name.
     */
    public function getFullTitleAttribute(): string
    {
        return $this->title ? $this->title . ' ' . $this->full_name : $this->full_name;
    }
}
