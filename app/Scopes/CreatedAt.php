<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\{Builder, Model, Scope};

class CreatedAt implements Scope
{

    /**
     * Undocumented function
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('created_at', 'desc');
    }

}

