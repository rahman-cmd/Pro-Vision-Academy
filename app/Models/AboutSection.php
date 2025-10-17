<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'item_one_title',
        'item_one_content',
        'item_two_title',
        'item_two_content',
        'item_three_title',
        'item_three_content',
        'status',
    ];

    /**
     * Scope to get active about sections.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Check if about section is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Check if section has mission statement.
     */
    public function hasMission(): bool
    {
        return !empty($this->mission);
    }

    /**
     * Check if section has vision statement.
     */
    public function hasVision(): bool
    {
        return !empty($this->vision);
    }

    /**
     * Check if section has values.
     */
    public function hasValues(): bool
    {
        return !empty($this->values);
    }
}
