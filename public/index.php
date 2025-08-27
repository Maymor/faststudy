<?php

use Dmitry\Faststudy\TaskService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$task_service = new TaskService();

$tasks = $task_service->getAllTasks();

if ($_POST['taskName'] ?? false) {
   $task = $task_service->createTask($_POST['taskName']);
   $task_service->saveTask($task);
}
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
<form id="taskForm" method="post" action="/">
    <input type="text" name="taskName" id="taskInput" placeholder="Введите задачу">
    <button type="submit">Добавить</button>
</form>
<?php if (!empty($tasks)):?>
<ul>
    <?php foreach ($tasks as $task): ?>
    <li>
        <?= $task['taskName'] ?>
    </li>
    <?php endforeach; ?>
</ul>

<?php else: ?>
<p>Задач ещё нет</p>
<?php endif;?>
</body>
</html>