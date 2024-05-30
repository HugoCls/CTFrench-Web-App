<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db_username = 'overcop_user';
    $db_password = 'Uqo08o_01';
    $db_name = 'ctf';
    $db_host = '79.137.38.217';

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('Could not connect to the database');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        header("Location: search.html");
    } else {
        header("Location: index.html");
    }

    mysqli_close($db);
}
?>
