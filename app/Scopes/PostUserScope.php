<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PostUserScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->join('users as auth_user', function ($join) {
            $join->on('auth_user.id', '=', 'posts.user_id')
                ->where('auth_user', auth()->id());
        });

        return $builder;
    }
}
