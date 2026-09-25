<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #333;
        }

        .add-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #1f2937;
            color: white;
        }

        .pending {
            color: #b45309;
            font-weight: bold;
        }

        .completed {
            color: #15803d;
            font-weight: bold;
        }

        .btn {
            border: none;
            padding: 7px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .edit {
            background: #2563eb;
        }

        .delete {
            background: #dc2626;
        }

        .status {
            background: #16a34a;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="add-btn">
        + Add Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count() > 0)

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($tasks as $task)

        <tr>
            <td>{{ $task->id }}</td>

            <td>
                {{ $task->task_name }}
            </td>

            <td>
                {{ $task->description }}
            </td>

            <td>
                @if($task->status == 'Completed')
                    <span class="completed">
                        Completed
                    </span>
                @else
                    <span class="pending">
                        Pending
                    </span>
                @endif
            </td>

            <td>
                {{ $task->due_date ?? 'No due date' }}
            </td>

            <td>

                <a href="{{ route('tasks.edit', $task) }}"
                   class="btn edit">
                    Edit
                </a>

                @if($task->status == 'Pending')

                    <form action="{{ route('tasks.status', $task) }}"
                          method="POST">

                        @csrf
                        @method('PATCH')

                        <input type="hidden"
                               name="status"
                               value="Completed">

                        <button class="btn status">
                            Complete
                        </button>

                    </form>

                @else

                    <form action="{{ route('tasks.status', $task) }}"
                          method="POST">

                        @csrf
                        @method('PATCH')

                        <input type="hidden"
                               name="status"
                               value="Pending">

                        <button class="btn status">
                            Pending
                        </button>

                    </form>

                @endif

                <form action="{{ route('tasks.destroy', $task) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this task?');">

                    @csrf
                    @method('DELETE')

                    <button class="btn delete">
                        Delete
                    </button>

                </form>

            </td>
        </tr>

        @endforeach

        </tbody>
    </table>

    @else

        <p>No tasks found. Add your first task!</p>

    @endif

</div>

</body>
</html>