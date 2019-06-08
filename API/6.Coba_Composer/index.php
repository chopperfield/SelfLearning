<?php
    require_once 'vendor/fzaninotto/Faker/src/autoload.php';


    $faker = Faker\Factory::create('fr_FR');


    for ($i=0;$i<=20;$i++){
        echo $faker->name . "<br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Penduduk</title>
</head>
<body>
    <h1>Data Penduduk</h1>

    <?php for($i=0;$i<10;$i++) : ?>
    <ul>
        <li>
            <?= $faker->name; ?>
        </li>
        <li>
            <?= $faker->address; ?>
        </li>
        <li>
            <?= $faker->email; ?>
        </li>
        
    </ul>
    <?php endfor;?>

</body>
</html>