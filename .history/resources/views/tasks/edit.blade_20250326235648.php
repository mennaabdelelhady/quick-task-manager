<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        </form> action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}"
                class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border rounded">{{ $task->description }}</textarea>
        </div>
        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Task</button>
        </div>
        </form>
    </div>
</body>
</html>
