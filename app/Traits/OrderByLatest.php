<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrderByLatest
{
    public function scopeLatestOrder(Builder $query)
    {
        return $query->orderBy('updated_at', 'DESC');
    }
}
