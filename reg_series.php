<?php
include_once "Banco/conect.php";
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $stmt2 = $conn->prepare("SELECT * FROM series = ?" );
    $stmt2->execute([$data]);
    $stmt2->fetchAll(PDO::FETCH_ASSOC);

    if($stmt2->rowCount() == 0){
        try{
            $stmt = $conn->prepare("INSERT INTO series(name, genre ,  seasons, synopsis) VALUES (?, ?, ?, ?)");
            $stmt->execute([$data['name'], $data['genre'], $data[' seasons,'], $data['synopsis']]);
            // var_dump($data);

            
     header('location: index.php?id=Sucesso');


        }catch(PDOException $e){
            echo $e;
        }
    }else{
        echo "Series already registered";
    }
 