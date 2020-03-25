<?php

require_once('initialize.php');

    function insert_new_user($user, $pass) {
        global $database;

        $sql  = "INSERT INTO users(username, password) ";
        $sql .= "VALUES('" . $user . "', '" . $pass . "');";

        $result = $database->query($sql);
        return $result;
    }

    function query($sql) {
        global $database;
        $result = $database->query($sql);
        return $result;
    }

    function user_exists($user, $pass) {
        // database (mysqli obj / $conn) from database.php
        global $database;
        $user = mysqli_real_escape_string($database->conn, $user);
        $pass = mysqli_real_escape_string($database->conn, $pass);
        
        $sql  = "SELECT * FROM users "; // don't forget spaces inbetween sql lines !
        $sql .= "WHERE username='{$user}' ";
        $sql .= "AND password='{$pass}'";
        
        $result = $database->query($sql);

        if (mysqli_num_rows($result) != 1) {
            return false;
        } else {
            return true;
        }
    }

?>