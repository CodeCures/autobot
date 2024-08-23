<?php

namespace App\Traits;

trait WithOffset
{

    /**
     * Scope a query to apply offset and limit.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $offset
     * @param int $defaultLimit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithOffset($query, $offset = null, $defaultLimit = 10)
    {
        if (is_null($offset)) {
            $offset = 0;
        }

        return $query->skip($offset)->take($defaultLimit);
    }
}
