<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Employer;
use App\Models\User;

class EmployerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employer $employer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return null === $user->employer;
    }
    public function update(User $user, Employer $employer): bool
    {
        return $employer->user_id === $user->id;
    }
    public function delete(User $user, Employer $employer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employer $employer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employer $employer): bool
    {
        return false;
    }
}