<?php
    // $mahasiswa =[
    //     [
    //     "Nama" => "David Pramono",
    //     "NIK" => "0110782",
    //     "E-mail" => "Dapram12@gmail.com",
    //     ],
    //     [
    //         "Nama" => "David Pramono",
    //         "NIK" => "0110782",
    //         "E-mail" => "Dapram12@gmail.com",
    //     ],
    //     [
    //         "Nama" => "David Pramono",
    //         "NIK" => "0110782",
    //         "E-mail" => "Dapram12@gmail.com",
    //         ]
    // ];

    $dbh = new PDO ('mysql:host=localhost;dbname=wpu_rest','root','');

    $db = $dbh->prepare('Select * from mahasiswa');
    $db->execute();
    
    $mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

    $data = json_encode($mahasiswa);
    echo $data;
?>