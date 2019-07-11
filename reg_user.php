<?php
include_once "Banco/conect.php";
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
echo "<pre>";
    print_r($data);
echo "</pre>";
if($data['password'] == $data['password2']){
    $stmt2 = $conn->prepare("SELECT * FROM users WHERE email = ?" );
    $stmt2->execute([$data['email']]);
    $stmt2->fetchAll(PDO::FETCH_ASSOC);

    if($stmt2->rowCount() == 0){
        try{
            $stmt = $conn->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$data['name'], $data['email'], $data['password']]);
            header('location: index.php?id=Sucesso');
        }catch(PDOException $e){
            echo $e;
        }
    }else{
        echo "usuário já cadastrado!";
    }
}