<?php

namespace App\Scopes;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class LocationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $request = request();
        if ($request->country) {
            $country = DB::table('countries')->where('slug', $request->country)->first();
            $builder->where('country_id', '=', $country->id);
            if ($request->province) {
                $province = DB::table('provinces')->where('slug', $request->province)->first();
                $builder->where('province_id', '=', $province->id);
            }
        }
    }
}