<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandingSection extends Model
{
    protected $fillable = [
        'slug',
        'section_label',
        'title',
        'subtitle',
        'body',
        'extra',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'extra' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(LandingItem::class)->orderBy('sort_order');
    }
}
