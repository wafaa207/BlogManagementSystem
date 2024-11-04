<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view any roles.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can view a specific role.
     */
    public function view(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can create roles.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can update a role.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can delete a role.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can restore a role.
     */
    public function restore(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can permanently delete a role.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }
}
