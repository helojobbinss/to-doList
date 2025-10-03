<?php
require_once('./database/conn.php');
$tasks = [];

$sql = $pdo->query("SELECT * FROM tasks");

if ($sql->rowCount() > 0) {
    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>To-do list</title>
</head>
<body>
    <div id="to-do">
        <h1>Lista de tarefas a fazer</h1>
        <form action="action/create.php" method="POST" class="to-do-form">
            <input type="text" name="descricao" placeholder="Descreva a tarefa" required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <div id="tasks">
            <?php foreach ($tasks as $task): ?>
                <div class="task">
                    <input type="checkbox"
                        class="progress <?= $task['completo'] ? 'done' : ''?>"
                        data-task-id= <?= $task['id']?>
                        name="progress"
                        <?= $task['completo'] ? 'checked' : '' ?>
                    >
                    <p class="task-descricao"><?= htmlspecialchars($task['descricao']) ?></p>
                    <div class="task-action">
                        <a class="action-button edit-button">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a class="action-button delete-button" href="./action/delete.php?id=<?= $task['id'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                <form action="./action/update.php" method="POST" class="to-do-form edit-task hidden">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <input type="text" name="descricao" placeholder="Edite a tarefa" value="<?= htmlspecialchars($task['descricao']) ?>" required>
                    <button type="submit" class="form-button">
                     <i class="fa-solid fa-check"></i>
                    </button>
                </form>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="./javascript/script.js"></script>
</body>
</html>
