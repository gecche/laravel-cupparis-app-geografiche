<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CupGeoRegione;
use Illuminate\Auth\Access\HandlesAuthorization;
use Gecche\PolicyBuilder\Facades\PolicyBuilder;

class CupGeoRegionePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CupGeoRegione  $model
     * @return mixed
     */
    public function view(User $user, CupGeoRegione $model)
    {
        //
        if ($user && $user->can('view cup_geo_regione')) {
            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        if ($user && $user->can('create cup_geo_regione')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deal  $model
     * @return mixed
     */
    public function update(User $user, CupGeoRegione $model)
    {
        //
        if ($user && $user->can('edit cup_geo_regione')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deal  $model
     * @return mixed
     */
    public function delete(User $user, CupGeoRegione $model)
    {
        //
        if ($user && $user->can('delete cup_geo_regione')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can access to the listing of the models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function listing(User $user)
    {
        //
        if ($user && $user->can('list cup_geo_regione')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can access to the listing of the models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function acl(User $user, $builder)
    {

//        if ($user && $user->can('view all cup_geo_regione')) {
//        }

        if ($user && $user->can('view cup_geo_regione')) {
            return PolicyBuilder::all($builder,CupGeoRegione::class);
        }

        return PolicyBuilder::none($builder,CupGeoRegione::class);
    }
}
