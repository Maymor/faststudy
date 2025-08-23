<?php

use Dmitry\Faststudy\Task;
use Dmitry\Faststudy\TaskService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

/*$task_service = new TaskService();

$task = new Task(
        'Test task',
        1
);*/

// $task_service->saveTask($task);

//var_dump($task_service->getAllTasks());
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>
    <link rel="stylesheet" src="style.css">
</head>
<body>
<h1>Список задач</h1>
<form id="taskForm">
    <input type="text" id="taskInput" placeholder="Введите задачу">
    <button type="submit">Добавить</button>
</form>
<ul id="taskList">

</ul>
<script>
    const form = document.getElementById('taskForm');
    const input = document.getElementById('taskInput');
    const list = document.getElementById('taskList');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // отменяем перезагрузку

        const taskText = input.value.trim();
        if (taskText.length === 0) {
            return;
        } // не добавляем пустое

        const li = document.createElement('li');
        li.textContent = taskText;
        list.appendChild(li);

        input.value = '';
    });
</script>
</body>
</html>