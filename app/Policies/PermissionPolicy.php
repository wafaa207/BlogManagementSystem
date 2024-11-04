<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission; // Assuming you are using Spatie's package for permissions
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view any permissions.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can view a specific permission.
     */
    public function view(User $user, Permission $permission): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can create permissions.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can update a permission.
     */
    public function update(User $user, Permission $permission): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can delete a permission.
     */
    public function delete(User $user, Permission $permission): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can restore a permission.
     */
    public function restore(User $user, Permission $permission): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine if the user can permanently delete a permission.
     */
    public function forceDelete(User $user, Permission $permission): bool
    {
        return $user->hasRole('admin');
    }
}
