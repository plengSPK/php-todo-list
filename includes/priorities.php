<?php

class Priority{
    public function fetch_data($priority_id){
        global $conn;

        $query = $conn->prepare("SELECT * FROM priorities WHERE priority_id = ?");
        $query->bindValue(1, $priority_id);
        $query->execute();

        return $query->fetch();
    }

    public function fetch_all(){
        global $conn;

        $query = $conn->prepare("SELECT * FROM priorities");
        $query->execute();

        return $query->fetchAll();
    }
}