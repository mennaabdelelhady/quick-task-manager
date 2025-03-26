<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Task Manager</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">
            Create Task
        </a>
        
        <ul class="mt-4 space-y-2">
            @foreach ($tasks as $task)
            <li class="flex items-center justify-between bg-white p-4 shadow-sm rounded">
                <div class="flex-1">
                    <strong class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">
                        {{ $task->title }}
                    </strong>
                    <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                </div>
                
                <div class="flex items-center space-x-2 ml-4">
                    <form action="{{ route('tasks.toggleStatus', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-sm {{ $task->completed ? 'text-green-500 hover:text-green-600' : 'text-gray-500 hover:text-gray-600' }} transition duration-200">
                            {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
                        </button>
                    </form>
                    
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-600 text-sm transition duration-200">
                        Edit
                    </a>
                    
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500  text-sm">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>