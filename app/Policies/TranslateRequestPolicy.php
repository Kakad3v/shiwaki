<?php

namespace App\Policies;

use App\TranslateRequest;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TranslateRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any translate requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the translate request.
     *
     * @param  \App\User  $user
     * @param  \App\TranslateRequest  $translateRequest
     * @return mixed
     */
    public function view(User $user, TranslateRequest $translateRequest)
    {
        //
    }

    /**
     * Determine whether the user can create translate requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    public function manage(User $user, TranslateRequest $translateRequest)
    {
        return $user->is($translateRequest->user);
    }
    /**
     * Determine whether the user can update the translate request.
     *
     * @param  \App\User  $user
     * @param  \App\TranslateRequest  $translateRequest
     * @return mixed
     */
    public function update(User $user, TranslateRequest $translateRequest)
    {
        return $user->is($translateRequest->user) || $translateRequest->members->contains($user);
    }

    /**
     * Determine whether the user can delete the translate request.
     *
     * @param  \App\User  $user
     * @param  \App\TranslateRequest  $translateRequest
     * @return mixed
     */
    public function delete(User $user, TranslateRequest $translateRequest)
    {
        //
    }

    /**
     * Determine whether the user can restore the translate request.
     *
     * @param  \App\User  $user
     * @param  \App\TranslateRequest  $translateRequest
     * @return mixed
     */
    public function restore(User $user, TranslateRequest $translateRequest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the translate request.
     *
     * @param  \App\User  $user
     * @param  \App\TranslateRequest  $translateRequest
     * @return mixed
     */
    public function forceDelete(User $user, TranslateRequest $translateRequest)
    {
        //
    }
}
