<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();

    //query = params;//get
    $response = $client->request('GET','http://omdbapi.com',[
        'query' => [
            'apikey' => 'fca96da1',
            's' => 'Transformers'
        ]
    ]);

    //var_dump($response->getbody()->getcontents()); //Output: JSON

    $result = json_decode($response->getbody()->getcontents(),true); //true=array;    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>

    <?php foreach ($result['Search'] as $movie) : ?> 
    <ul>
        <li>
            Title: <?= $movie['Title']; ?>
        </li>
        <li>
            Year: <?= $movie['Year']; ?>
        </li>
        <li>
            <img src="<?= $movie['Poster']; ?>" alt="" width="80px">
        </li>
    </ul>
    <?php endforeach ?>
</body>
</html>