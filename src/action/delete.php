<?php
require('../database/conn.php');

$id = filter_input(INPUT_GET,'id');
if($id){
    $sql = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();
}
header('Location: ../index.php');
exit;
?>
