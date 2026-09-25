<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button, a {
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #6b7280;
            color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add New Task</h1>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label>Task Name</label>
        <input type="text"
               name="task_name"
               value="{{ old('task_name') }}"
               required>

        <label>Description</label>
        <textarea name="description"
                  rows="5">{{ old('description') }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="Pending">
                Pending
            </option>

            <option value="Completed">
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input type="date"
               name="due_date"
               value="{{ old('due_date') }}">

        <button type="submit">
            Save Task
        </button>

        <a href="{{ route('tasks.index') }}"
           class="back">
            Back
        </a>

    </form>

</div>

</body>
</html>