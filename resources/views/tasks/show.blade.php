<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Szczegóły Zadania') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-2xl font-semibold text-gray-800 break-words overflow-hidden">
            {{ $task->name }}
        </h3>

        <div class="mt-4">
            <p class="text-gray-600 break-words"><strong>Opis:</strong> {{ $task->description ?? 'Brak opisu' }}</p>
            <br>
            <p class="text-gray-600"><strong>Priorytet:</strong>
                <span class="px-2 py-1 rounded
                    ">
                    {{ ucfirst($task->priority) }}
                </span>
            </p>
            <p class="text-gray-600"><strong>Status:</strong>
                <span class="px-2 py-1 rounded">
                    {{ ucfirst($task->status) }}
                </span>
            </p>
            <p class="text-gray-600"><strong>Termin:</strong> {{ $task->due_date }}</p>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded shadow hover:bg-gray-600">
                Powrót do listy
            </a>

            <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600">
                Edytuj zadanie
            </a>
        </div>
    </div>
</x-app-layout>
