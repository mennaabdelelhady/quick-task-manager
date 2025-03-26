<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2x1 font-bold mb-4">Create Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-4 shadow-sm rounded">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" value="" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="w-full p-2 border rounded"></textarea>
            </div>
            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Task</button>
            </div>
        </form>
    </div>

</body>
</html>       