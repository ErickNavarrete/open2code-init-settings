<?php

namespace OpenToCode\InitSettings\Builder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class O2CBuilder extends Builder
{
    /**
     * @param array $request
     *
     * @return O2CBuilder
     */
    public function filterLike(array $request): O2CBuilder
    {
        return $this->where(function ($query) use ($request) {
            foreach ($request as $key => $value) {
                $query->orWhere($key, 'like', '%'.$value.'%');
            }
        });
    }

    /**
     * @param string $value
     * @param array  $fields
     *
     * @return O2CBuilder
     */
    public function filterLikeAll(string $value, array $fields = []): O2CBuilder
    {
        $columns = (is_null($fields)) ? Schema::getColumnListing(
            $this->getModel()->getTable()
        ) : $fields;

        return $this->where(function ($query) use ($value, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%'.$value.'%');
            }
        });
    }
}