<?php
require_once('process.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Todo List</title>

    <link rel="stylesheet" href="style.css">

    <!-- google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">

        <h2>Add Task</h2>

        <?php if($error != ""): ?>
            <div class="alert alert-danger">
                <li><?php echo $error; ?></li>
            </div>
        <?php endif; ?>

        <form class="form-inline justify-content-center" action="" method="post">
            <div class="form-group">
                <!-- <label for="taskname">Task</label> -->
                <input type="text" name="task_name" class="form-control" placeholder="Task">
            </div>
            <div class="form-group">
                <!-- <label for="priority">Priority</label> -->
                <select name="priority_select" class="form-control">
                    <option disabled selected value> -- Priority -- </option>
                    <?php foreach($priorities as $prio): ?>
                        <option value="<?= $prio['priority_id']; ?>">
                            <?= $prio['priority_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <!-- <label for="duedate">Due date</label> -->
                <input type="date" name="due_date" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
        </form>


        <h2>Todo</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Priority</th>
                    <th scope="col">Task</th>
                    <th scope="col">Due date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tasks as $task): ?>
                    <tr>
                        <?php $prio_name = $priority->fetch_data($task['priority_id']); ?>
                        <td><?= $prio_name['priority_name']; ?></td>
                        <td><?= $task['task_name']; ?></td>
                        <td><?= $task['due_date']; ?></td>
                        <td class="btn-action">
                            <a href="#">
                                <i class="material-icons">check_circle_outline</i>
                            </a>
                            <a href="index.php?edit=<?php echo $task['task_id'] ?>">
                                <i class="material-icons">create</i>
                            </a>
                            <a href="process.php?delete=<?php echo $task['task_id'] ?>">
                                <i class="material-icons">delete_outline</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>