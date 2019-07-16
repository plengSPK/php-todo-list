<?php

// $conn = new mysqli('localhost','root','','php-todo-list');

try{
    $conn = new PDO('mysql:host=localhost;dbname=php-todo-list','root','');
}catch(PDOException $e){
    exit('Database error.');
}