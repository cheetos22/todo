<x-app-layout>
    <div class="container mx-auto max-w-4xl py-12 mt-12 px-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">{{ __('Edit TodoList') }}</h2>

        @if($task->public_token && $task->public_token_expires_at > now())
        <div class="bg-green-100 p-4 rounded-lg my-4">
            <p>Publiczny link do zadania (ważny do {{ $task->public_token_expires_at->format('H:i:s') }}):</p>
            <input type="text" value="{{ route('tasks.public', ['token' => $task->public_token]) }}" readonly class="w-full border p-2">
            <button onclick="copyLink()" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Kopiuj</button>
        </div>

        <script>
            function copyLink() {
                navigator.clipboard.writeText("{{ route('tasks.public', ['token' => $task->public_token]) }}");
                alert('Link skopiowany!');
            }
        </script>
    @else
        <form action="{{ route('tasks.share', $task) }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mb-4 mt-10 rounded">Generuj link do publiczenigo udostępnienia</button>
        </form>
    @endif

        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $task->name }}" required class="w-full border border-gray-300 rounded-md p-3 mb-4">
            <textarea name="description" class="w-full border border-gray-300 rounded-md p-3 mb-4">{{ $task->description }}</textarea>

            <div class="flex space-x-4 mb-4">
                <select name="priority" class="w-1/3 border border-gray-300 rounded-md p-3">
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                </select>
                <select name="status" class="w-1/3 border border-gray-300 rounded-md p-3">
                    <option value="to-do" {{ $task->status == 'to-do' ? 'selected' : '' }}>To-Do</option>
                    <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
                <input type="date" name="due_date" value="{{ $task->due_date }}" required class="w-1/3 border border-gray-300 rounded-md p-3">
            </div>

            <button type="submit" class="w-full bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">
                Zapisz zmiany
            </button>
        </form>
    </div>
</x-app-layout>
