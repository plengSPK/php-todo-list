<?php

require_once('includes/connection.php');
require_once('includes/tasks.php'); 
require_once('includes/priorities.php'); 

$error = "";

$task = new Task;
$tasks = $task->fetch_all();

$priority = new Priority;
$priorities = $priority->fetch_all();


if(isset($_POST['submit'])){

    if(isset($_POST['task_name'], $_POST['priority_select'], $_POST['due_date'])){

        $task_name = $_POST['task_name'];
        $priority_select = $_POST['priority_select'];
        $due_date = $_POST['due_date'];

        if(empty($task_name) or empty($priority_select) or empty($due_date)){
            $error = 'All fields are required!';
        }else{
            $query = $conn->prepare('INSERT INTO tasks (task_name, due_date, priority_id, finished) VALUES (?, ?, ?, ?)');
            $query->bindValue(1, $task_name);
            $query->bindValue(2, $due_date);
            $query->bindValue(3, $priority_select);
            $query->bindValue(4, false);

            $query->execute();

            header('location: index.php');
            exit();
        }

    }else{
        $error = 'All fields are required!';
    }
}