<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

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

    protected function casts(): array
    {
        return [
            'status' => 'string',
        ];
    }

    /**
     * Scope: only active settings.
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Is active setting.
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * Convenience: has logo uploaded.
     */
    public function hasLogo(): bool
    {
        return !empty($this->logo);
    }

    /**
     * Convenience: has favicon uploaded.
     */
    public function hasFavicon(): bool
    {
        return !empty($this->favicon);
    }

    /**
     * Accessor: full URL for logo.
     */
    public function getLogoUrlAttribute(): ?string
    {
        return $this->resolveAssetUrl($this->logo);
    }

    /**
     * Accessor: full URL for favicon.
     */
    public function getFaviconUrlAttribute(): ?string
    {
        return $this->resolveAssetUrl($this->favicon);
    }

    /**
     * Accessor: available social links as key=>url array.
     */
    public function getSocialLinksAttribute(): array
    {
        $links = [
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
        ];

        return array_filter($links, static fn ($v) => !empty($v));
    }

    /**
     * Helper: resolve local path or return absolute URL as-is.
     */
    protected function resolveAssetUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset($path);
    }

    /**
     * Get the single current settings (first record).
     * Adjust to active()->first() if multiple rows with statuses are expected.
     */
    public static function current(): ?self
    {
        return static::query()->orderBy('id')->first();
    }
}