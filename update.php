<form method="post" action="update.php" style="display: flex; flex-direction: column; width: 40%;
                                                margin-left: 30%; text-align: center">
    <label for="id">Numéro de parcours :</label>
    <input type="text" name="id" id="id">

    <label for="name">Name :</label>
    <input type="text"" name="name" id="name">

    <label for="difficulty">Difficultée :</label>
    <input type="text" name="difficulty" id="difficulty">

    <label for="distance">Distance :</label>
    <input type="text" name="distance" id="distance">

    <label for="duration">Durée :</label>
    <input type="text" name="duration" id="duration">

    <label for="height">Hauteur :</label>
    <input type="text" name="height" id="height">

    <input type="submit" name="submit" value="Envoyer">
</form>

<?php

$username = 'root';
$password = '';
$host = 'localhost';
$data = 'exo200';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Modification d'une radonnée

    $id = $_POST['id'];
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height = $_POST['height'];

    $stmt = $db->prepare('update hiking set name = :name where id = :id');
    $stmt1 = $db->prepare('update hiking set difficulty = :difficulty where id = :id');
    $stmt2 = $db->prepare('update hiking set distance_km = :distance where id = :id');
    $stmt3 = $db->prepare('update hiking set duration_h = :duration where id = :id');
    $stmt4 = $db->prepare('update hiking set height_difference_m = :height where id = :id');

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);

    $stmt1->bindParam(':difficulty', $difficulty);
    $stmt1->bindParam(':id', $id);

    $stmt2->bindParam(':distance', $distance);
    $stmt2->bindParam(':id', $id);

    $stmt3->bindParam(':duration', $duration);
    $stmt3->bindParam(':id', $id);

    $stmt4->bindParam(':height', $height);
    $stmt4->bindParam(':id', $id);

    $stmt->execute();
    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();
    $stmt4->execute();

    echo '<div style="text-align: center">Randonnée modifiée avec succès !</div>';
}

catch (PDOException $exception) {
    echo $exception->getMessage();
}