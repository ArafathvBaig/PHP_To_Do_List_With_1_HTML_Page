<?php
$errors = "";
include 'C:\xampp\htdocs\PHP Programming\To_Do_List\php\database.php';
// insert a quote if submit button is clicked
if (isset($_POST['submit'])) {
    if (empty($_POST['task'])) {
        $errors = "You must fill in the task";
    } else {
        $task = $_POST['task'];
        $sql = "INSERT INTO tasks (task) VALUES ('$task')";
        $result = mysqli_query($connection, $sql);
    }
    header('location: ../pages/index.php');
}
