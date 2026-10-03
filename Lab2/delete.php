<?php
include 'db.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    mysqli_query($conn, "DELETE FROM tasks WHERE id = $id");
    mysqli_query($conn, "SET @new_id = 0");
    mysqli_query($conn, "UPDATE tasks SET id = (@new_id := @new_id + 1) ORDER BY id");
    mysqli_query($conn, "ALTER TABLE tasks AUTO_INCREMENT = 1");
}

header("Location: index.php");
exit;
?>
