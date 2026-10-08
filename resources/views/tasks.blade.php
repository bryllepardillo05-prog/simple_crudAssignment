<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Laravel CRUD</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; }
        form { margin-bottom: 20px; display: inline-block; }
        input[type="text"] { padding: 8px; width: 250px; }
        button { padding: 8px 12px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    </style>
</head>
<body>

    <h2>kina simpolan nga example sa Laravel CRUD as in grabe ka simple ni grabe ka raw grabe ka fresh</h2>

    <!-- CREATE FORM -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter task title" required>
        <button type="submit">Add Task</button>
    </form>

    <!-- READ TABLE -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>
                        <!-- UPDATE FORM (Inline) -->
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $task->title }}" required>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <!-- DELETE FORM -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>