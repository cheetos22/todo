<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

final class TaskService
{
    public function getTasks(array $filters = [])
    {
        return Task::where('user_id', Auth::id())
            ->when(isset($filters['priority']), fn ($q) => $q->where('priority', $filters['priority']))
            ->when(isset($filters['status']), fn ($q) => $q->where('status', $filters['status']))
            ->when(isset($filters['due_date']), fn ($q) => $q->whereDate('due_date', $filters['due_date']))
            ->get();
    }

    public function createTask(array $data)
    {
        $data['user_id'] = Auth::id();

        return Task::create($data);
    }

    public function updateTask(Task $task, array $data)
    {
        if ($task->user_id === Auth::id()) {
            $task->update($data);
        }
    }

    public function deleteTask(Task $task)
    {
        if ($task->user_id === Auth::id()) {
            $task->delete();
        }
    }
}
