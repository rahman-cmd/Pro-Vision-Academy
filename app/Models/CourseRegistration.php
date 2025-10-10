<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'registration_number',
        'amount_paid',
        'payment_method',
        'payment_status',
        'payment_reference',
        'status',
        'special_requirements',
        'dietary_restrictions',
        'accommodation_needed',
        'notes',
        'registered_at',
    ];

    protected function casts(): array
    {
        return [
            'amount_paid' => 'decimal:2',
            'accommodation_needed' => 'boolean',
            'registered_at' => 'datetime',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($registration) {
            if (empty($registration->registration_number)) {
                $registration->registration_number = self::generateRegistrationNumber();
            }
        });
    }

    /**
     * Get the user that owns the registration.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course for this registration.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Scope to get confirmed registrations.
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope to get pending registrations.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get paid registrations.
     */
    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    /**
     * Check if registration is confirmed.
     */
    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    /**
     * Check if payment is completed.
     */
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Generate unique registration number.
     */
    protected static function generateRegistrationNumber(): string
    {
        do {
            $number = 'REG-' . date('Y') . '-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (self::where('registration_number', $number)->exists());

        return $number;
    }

    /**
     * Confirm the registration.
     */
    public function confirm(): void
    {
        $this->update(['status' => 'confirmed']);
        
        // Increment course participants count
        $this->course->increment('current_participants');
    }

    /**
     * Cancel the registration.
     */
    public function cancel(): void
    {
        $this->update(['status' => 'cancelled']);
        
        // Decrement course participants count if it was confirmed
        if ($this->wasChanged('status') && $this->getOriginal('status') === 'confirmed') {
            $this->course->decrement('current_participants');
        }
    }
}
