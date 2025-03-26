<?php

declare(strict_types=1);

use App\Jobs\SendTaskReminder;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $tasks = Task::whereDate('due_date', Carbon::tomorrow())->get();
    foreach ($tasks as $task) {
        dispatch(new SendTaskReminder($task));
    }
})->dailyAt('00:00')->name('Task Expiration Reminder');
