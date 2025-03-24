<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->getTasks($request->all());
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id === Auth::id()) {
            $this->taskService->deleteTask($task);
        }
        return redirect()->route('tasks.index');
    }
}
