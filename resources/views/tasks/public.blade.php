<x-app-layout>
    <div class="container mx-auto max-w-4xl py-12 mt-12 px-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">{{ $task->name }}</h2>
        <p class="text-gray-600 mt-2">{{ $task->description }}</p>
        <p class="mt-4"><strong>Priorytet:</strong> {{ ucfirst($task->priority) }}</p>
        <p><strong>Status:</strong> {{ ucfirst(str_replace('-', ' ', $task->status)) }}</p>
        <p><strong>Termin:</strong> {{ $task->due_date }}</p>
    </div>
</x-app-layout>
