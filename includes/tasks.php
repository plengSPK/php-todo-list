<?php

class Task {
    public function fetch_all(){
        global $conn;

        $query = $conn->prepare("SELECT * FROM tasks");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($task_id){
        global $conn;

        $query = $conn->prepare("SELECT * FROM tasks WHERE task_id = ?");
        $query->bindValue(1, $task_id);
        $query->execute();

        return $query->fetch();
    }

}