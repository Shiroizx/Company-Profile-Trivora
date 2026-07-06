<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LandingItem extends Model
{
    protected $fillable = [
        'landing_section_id',
        'title',
        'description',
        'meta',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'meta' => 'array',
        ];
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(LandingSection::class, 'landing_section_id');
    }
}
