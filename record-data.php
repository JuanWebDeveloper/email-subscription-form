<?php

/*===============
<|-Connection -|>
===============*/
$connect = new PDO('mysql:host=localhost;dbname=practices', 'root', '');

/*=====================================================
<|-Validate that the fields are not empty           -|>
=====================================================*/
if (!empty($_POST['name']) && !empty($_POST['email'])) {
    /*===============
    <|-Variables  -|>
    ===============*/
    $name = trim($_POST['name']);
    $name = filter_var(ucwords(strtolower($name)), FILTER_SANITIZE_STRING);
    $email = trim($_POST['email']);
    $email = filter_var(strtolower($email), FILTER_SANITIZE_EMAIL);
    $weather = date('m/d/y');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = '<h1 class="message">Please enter a valid email</h1>';

    } else {
        /*===============
        <|-Query      -|>
        ===============*/
        $statment = $connect->prepare('INSERT INTO emailsubscription (id, username, email, weather) VALUES(null, :username, :email, :weather)');
        $statment->execute(array(':username' => $name, ':email' => $email, ':weather' => $weather));
    } 

} else {
    $message = '<h1 class="message">Please fill in all the fields</h1>';
}

