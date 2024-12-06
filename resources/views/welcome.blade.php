<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        h1 {
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .todo-list {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .todo-item {
            background-color: #fafafa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
        .todo-item:hover {
            background-color: #f1f1f1;
        }
        .todo-item h3 {
            margin: 0;
            color: #333;
        }
        .todo-item p {
            margin: 5px 0;
            color: #666;
        }
        .todo-item .priority {
            font-weight: bold;
        }
        .status {
            font-size: 14px;
            padding: 5px;
            border-radius: 4px;
        }
        .completed {
            background-color: #4CAF50;
            color: white;
        }
        .pending {
            background-color: #FF5722;
            color: white;
        }
        .empty-message {
            text-align: center;
            font-size: 18px;
            color: #888;
        }
    </style>
</head>
<body>

    <header>
        <h1>Your Todo List</h1>
    </header>

    <div class="container">
        <div class="todo-list">
            @if($todos->isEmpty())
                <p class="empty-message">You have no todos. Add some!</p>
            @else
                @foreach($todos as $todo)
                    <div class="todo-item">
                        <h3>{{ $todo->title }}</h3>
                        <p>{{ $todo->description }}</p>
                        <p class="priority">Priority: {{ $todo->priority }}</p>
                        <p class=>Status: {{ $todo->is_completed }}</p>
                        </p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</body>
</html>
