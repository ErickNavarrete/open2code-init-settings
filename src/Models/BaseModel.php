<?php

namespace OpenToCode\InitSettings\Models;

use Illuminate\Database\Eloquent\Model;
use OpenToCode\InitSettings\Builder\O2CBuilder;

class BaseModel extends Model
{
    /**
     * @param $query
     *
     * @return O2CBuilder
     */
    public function newEloquentBuilder($query): O2CBuilder
    {
        return new O2CBuilder($query);
    }
}