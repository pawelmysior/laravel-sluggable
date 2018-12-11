<?php

namespace PawelMysior\Sluggable;

use Cviebrock\EloquentSluggable\Sluggable as CviebrockSluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait Sluggable
{
    use CviebrockSluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_source',
            ],
        ];
    }

    public function scopeFindBySlug(Builder $query, string $slug = null): Model
    {
        return $query->where('slug', $slug)->firstOrFail();
    }

    protected function getSlugSourceAttribute(): string
    {
        return $this->title;
    }
}
