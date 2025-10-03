<?php
require('../database/conn.php');

$id = filter_input(INPUT_POST, 'id');
$completo = filter_input(INPUT_POST, 'completo');

if ($id !== null && $completo !== null) {
    $sql = $pdo->prepare('UPDATE tasks SET completo = :completo WHERE id = :id');
    $sql->bindValue(':completo', $completo, PDO::PARAM_BOOL);
    $sql->bindValue(':id', $id);
    $sql->execute();
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
