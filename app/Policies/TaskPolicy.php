<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return $this->isOwner($user, $task);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return $this->isOwner($user, $task);
    }

    /**
     * Determine whether the user can generate public link.
     */
    public function generatePublicLink(User $user, Task $task)
    {
        return $this->isOwner($user, $task);
    }

    private function isOwner(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
