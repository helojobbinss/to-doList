<?php
require('../database/conn.php');

$id = filter_input(INPUT_POST,'id');
$descricao = filter_input(INPUT_POST,'descricao');

if($id && $descricao){
    $sql = $pdo->prepare('UPDATE tasks SET descricao = :descricao WHERE id = :id');
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':id', $id);
    $sql->execute();
}
header('Location: ../index.php');
exit;
?>
