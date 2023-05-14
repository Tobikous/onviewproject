<?php

namespace App\Traits;

trait SearchableByName
{
    public function scopeSearchByName($query, $name, $keyword)
    {
        return $query->where($name, 'LIKE', "%{$keyword}%");
    }
}
