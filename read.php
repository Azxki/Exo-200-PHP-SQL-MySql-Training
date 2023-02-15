<?php

$username = 'root';
$password = '';
$host = 'localhost';
$data = 'exo200';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Affichage des randonnées

    $stmt = $db->prepare('SELECT * from hiking');
    $state = $stmt->execute();
    $i = 1;

    if ($state) {
        foreach ($stmt->fetchAll() as $rando) {
            echo "Randonnées " . $i . " : " . $rando['name'] . "  <a href='update.php'>Modifier</a>" . '<br>';
            $i++;
        }
    } else {
        echo "requête invalide !";
    }

    //Ajout d'une randonnée

    $sql = "INSERT INTO hiking (name, difficulty, distance_km, duration_h, height_difference_m)
            VALUES ('Le Sentier de la Chapelle depuis Cilaos', 'Moyen', '8', '3.30', '700')";


    $db->exec($sql);

    echo "<div>La randonnée a été ajoutée avec succès !</div>";
}

catch (PDOException $exception) {
    echo $exception->getMessage();
}