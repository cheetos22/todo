<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

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

    public function edit(Task $task)
    {
        Gate::authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);
        $this->taskService->updateTask($task, $request->validated());
        return redirect()->route('tasks.index');
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
        return redirect()->route('tasks.index');
    }

    public function generatePublicLink(Task $task)
    {
        Gate::authorize('generatePublicLink', $task);
        if ($task->public_token && $task->public_token_expires_at > now()) {
            return back()->with('public_link', route('tasks.public', ['token' => $task->public_token]));
        }

        $task->public_token = Str::random(32);
        $task->public_token_expires_at = now()->addSeconds(60);
        $task->save();

        return back()->with('public_link', route('tasks.public', ['token' => $task->public_token]));
    }


    public function showPublic($token)
{
    $task = Task::where('public_token', $token)->first();

    if (!$task || $task->public_token_expires_at < now()) {
        abort(403, 'Link wygasł.');
    }

    return view('tasks.public', compact('task'));
}
}
