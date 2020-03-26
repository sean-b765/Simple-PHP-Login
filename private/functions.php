<?php

require_once 'initialize.php';


function insert_new_user($user, $email, $pass)
{
    global $database;

    $sql  = 'INSERT INTO users(username, email, password) ';
    $sql .= "VALUES('".$user."', '".$email."', '".$pass."');";

    $result = $database->query($sql);
    return $result;

}//end insert_new_user()


function query($sql)
{
    global $database;
    $result = $database->query($sql);
    return $result;

}//end query()


function user_exists($user, $pass)
{
    // database (mysqli obj / $conn) from database.php
    global $database;
    $user = mysqli_real_escape_string($database->conn, $user);
    $pass = mysqli_real_escape_string($database->conn, $pass);

    $sql = 'SELECT * FROM users ';
    // don't forget spaces inbetween sql lines !
    $sql .= "WHERE username='{$user}' ";
    $sql .= "AND password='{$pass}'";

    $result = $database->query($sql);

    if (mysqli_num_rows($result) != 1) {
        // echo 'user doesnt exist';
        return false;
    } else {
        // echo 'user does exist';
        return true;
    }

}//end user_exists()
