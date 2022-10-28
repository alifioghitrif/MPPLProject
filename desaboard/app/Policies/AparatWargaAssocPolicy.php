<?php

namespace App\Policies;

use App\Models\User;
use App\Models\aparat_warga_assoc;
use Illuminate\Auth\Access\HandlesAuthorization;

class AparatWargaAssocPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\aparat_warga_assoc  $aparatWargaAssoc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, aparat_warga_assoc $aparatWargaAssoc)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\aparat_warga_assoc  $aparatWargaAssoc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, aparat_warga_assoc $aparatWargaAssoc)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\aparat_warga_assoc  $aparatWargaAssoc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, aparat_warga_assoc $aparatWargaAssoc)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\aparat_warga_assoc  $aparatWargaAssoc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, aparat_warga_assoc $aparatWargaAssoc)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\aparat_warga_assoc  $aparatWargaAssoc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, aparat_warga_assoc $aparatWargaAssoc)
    {
        //
    }
}
