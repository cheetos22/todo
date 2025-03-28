<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ToDo List') }}
        </h2>
    </x-slot>

    <div class="container mx-auto max-w-6xl py-12 mt-12 px-6 bg-white shadow-md rounded-lg">
        <!-- Sekcja filtrów -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-md mb-6">
            <form method="GET" class="flex flex-wrap gap-4 items-center">
                <select name="priority" class="border border-gray-300 rounded-md p-3 w-1/4">
                    <option value="">Wszystkie priorytety</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
                <select name="status" class="border border-gray-300 rounded-md p-3 w-1/4">
                    <option value="">Wszystkie statusy</option>
                    <option value="to-do">To-Do</option>
                    <option value="in-progress">In Progress</option>
                    <option value="done">Done</option>
                </select>
                <input type="date" name="due_date" class="border border-gray-300 rounded-md p-3 w-1/4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Filtruj</button>
            </form>
        </div>

        <!-- Tabela z zadaniami -->
        <table class="w-full bg-gray-50 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-4 text-left">Nazwa</th>
                    <th class="p-4 text-left">Priorytet</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Data</th>
                    <th class="p-4 text-left">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="border-t border-gray-300">
                        <td class="p-4">
                            <a href="{{ route('tasks.show', $task) }}" class="text-blue-500">
                                {{ $task->short_name }}
                            </a>
                        </td>
                        <td class="p-4">{{ ucfirst($task->priority) }}</td>
                        <td class="p-4">{{ ucfirst(str_replace('-', ' ', $task->status)) }}</td>
                        <td class="p-4">{{ $task->due_date }}</td>
                        <td class="p-4 flex space-x-4">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:underline">Edytuj</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Formularz dodawania zadania -->
        <div class="mt-6 bg-gray-50 p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf
                    @error('name')
                        <div class=" pb-4 text-cyan-500">{{ $message }}</div>
                    @enderror
                <input type="text" name="name" placeholder="Nazwa zadania" required class="w-full border border-gray-300 rounded-md p-3 mb-4">
                <textarea name="description" placeholder="Opis" class="w-full border border-gray-300 rounded-md p-3 mb-4"></textarea>

                <div class="flex space-x-4 mb-4">
                    @error('priority')
                        <div class=" pb-4 text-cyan-500">{{ $message }}</div>
                    @enderror
                    <select name="priority" class="w-1/3 border border-gray-300 rounded-md p-3">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    @error('status')
                        <div class=" pb-4 text-cyan-500">{{ $message }}</div>
                    @enderror
                    <select name="status" class="w-1/3 border border-gray-300 rounded-md p-3">
                        <option value="to-do">To-Do</option>
                        <option value="in-progress">In Progress</option>
                        <option value="done">Done</option>
                    </select>
                    @error('due_date')
                        <div class=" pb-4 text-cyan-500">{{ $message }}</div>
                    @enderror
                    <input type="date" name="due_date" required class="w-1/3 border border-gray-300 rounded-md p-3">
                </div>
                <button type="submit" class="w-full bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">Dodaj</button>
            </form>
        </div>
    </div>
</x-app-layout>
