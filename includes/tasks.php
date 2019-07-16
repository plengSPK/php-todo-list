<?php

class Task {
    public function fetch_all(){
        global $conn;

        $query = $conn->prepare("SELECT * FROM tasks");
        $query->execute();

        return $query->fetchAll();
    }
}