<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'early_bird_price',
        'early_bird_deadline',
        'start_date',
        'end_date',
        'duration',
        'location',
        'max_participants',
        'current_participants',
        'level',
        'category',
        'image',
        'objectives',
        'requirements',
        'status',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'early_bird_price' => 'decimal:2',
            'early_bird_deadline' => 'date',
            'start_date' => 'date',
            'end_date' => 'date',
            'is_featured' => 'boolean',
        ];
    }

    /**
     * Get the course registrations.
     */
    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    /**
     * Get the users registered for this course.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_registrations')
                    ->withPivot(['registration_number', 'amount_paid', 'payment_status', 'status', 'registered_at'])
                    ->withTimestamps();
    }

    /**
     * Scope to get active courses.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope to get featured courses.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Check if course is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Check if course has available spots.
     */
    public function hasAvailableSpots(): bool
    {
        return $this->max_participants === null || $this->current_participants < $this->max_participants;
    }

    /**
     * Get the effective price (early bird if applicable).
     */
    public function getEffectivePriceAttribute(): float
    {
        if ($this->early_bird_price && $this->early_bird_deadline && now()->lte($this->early_bird_deadline)) {
            return $this->early_bird_price;
        }
        return $this->price;
    }
}
