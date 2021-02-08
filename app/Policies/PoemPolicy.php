<?php

namespace App\Policies;

use App\Poem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any poems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function view(User $user, Poem $poem)
    {
        //
    }

    /**
     * Determine whether the user can create poems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function update(User $user, Poem $poem)
    {
        return $user->is($poem->user) || $user->hasAnyRoles(['admin', 'owner']);
    }

    /**
     * Determine whether the user can delete the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function delete(User $user, Poem $poem)
    {
        //
    }

    /**
     * Determine whether the user can restore the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function restore(User $user, Poem $poem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function forceDelete(User $user, Poem $poem)
    {
        //
    }
}
