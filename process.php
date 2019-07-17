<?php

require_once('includes/connection.php');
require_once('includes/tasks.php'); 
require_once('includes/priorities.php'); 

$error = "";
$update = false;

$task_name = "";
$task_prio = "";
$task_duedate = "";
$finished = "";
$id = 0;

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


if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

    $query = $conn->prepare('SELECT * FROM tasks WHERE task_id = ?');
    $query->bindValue(1, $id);

    $query->execute();

    $result = $query->fetch();
    $task_name = $result['task_name'];
    $task_duedate = $result['due_date'];
    $task_prio = $result['priority_id'];
    $finished = $result['finished'];
}

if(isset($_POST['update'])){

    if(isset($_POST['task_name'], $_POST['priority_select'], $_POST['due_date'])){

        $task_id = $_POST['id'];
        $task_name = $_POST['task_name'];
        $priority_select = $_POST['priority_select'];
        $finished = $_POST['finished'];
        $due_date = $_POST['due_date'];

        if(empty($task_name) or empty($priority_select) or empty($due_date)){
            $error = 'All fields are required!';
        }else{
            $query = $conn->prepare("UPDATE tasks SET task_name=?, due_date=?, priority_id=?, finished=? WHERE task_id=?");
            $query->bindValue(1, $task_name);
            $query->bindValue(2, $due_date);
            $query->bindValue(3, $priority_select);
            $query->bindValue(4, $finished);
            $query->bindValue(5, $task_id);

            $query->execute();

            header('location: index.php');
            exit();
        }

    }else{
        $error = 'All fields are required!';
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = $conn->prepare('DELETE FROM tasks WHERE task_id = ?');
    $query->bindValue(1, $id);

    $query->execute();

    header('location: index.php');
    exit();
}
