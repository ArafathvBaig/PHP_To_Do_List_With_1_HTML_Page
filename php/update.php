<?php
// update the edited task
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    // echo "Id inside Update: ".$id;
    // echo "Task inside Update: ".$task;
    include 'C:\xampp\htdocs\PHP Programming\To_Do_List\php\database.php';
    $sql = "UPDATE tasks SET task='$task' WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header('location: ../pages/index.php');
    }
}
