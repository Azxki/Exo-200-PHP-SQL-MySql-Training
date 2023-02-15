<?php

$username = 'root';
$password = '';
$host = 'localhost';
$data = 'exo200';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Suppression d'une randonnée

    $id = $_POST['$i2'];
    echo $id;
}

catch (PDOException $exception) {
    echo $exception->getMessage();
}