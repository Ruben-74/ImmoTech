<?php

namespace App\Policies;

use App\Models\Option;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OptionPolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Option $option): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Option $option): Response
    {
        if ( $user->role == 'admin') {
            return Response::allow();
        }
        else {
            return $user->id === $user->user_id
            ? Response::allow()
            : Response::deny('Vous pouvez pas modifier un bien qui n\'est pas le votre');
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Option $option): Response
    {
        if ( $user->role == 'admin') {
            return Response::allow();
        }
        else {
            return $user->id === $user->user_id
            ? Response::allow()
            : Response::deny('Vous pouvez pas supprimer un bien qui n\'est pas le votre');
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Option $option): Response
    {
        
        if ( $user->role == 'admin') {
            return Response::allow();
        }
        else {
            return $user->id === $user->user_id
            ? Response::allow()
            : Response::deny('Vous pouvez pas restaurer un bien qui n\'est pas le votre');
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Option $option): Response
    {
        
        if ( $user->role == 'admin') {
            return Response::allow();
        }
        else {
            return $user->id === $user->user_id
            ? Response::allow()
            : Response::deny('Vous pouvez pas forcer la suppression un bien qui n\'est pas le votre');
        }
    }
}
