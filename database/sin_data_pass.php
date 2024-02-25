<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){

   
    $email= $_POST["email"];
    $password= $_POST["password"];
    

    try {
        require_once "conekt.php";

        $query = "SELECT  `password` FROM `all_data` WHERE 1;";

        $stmt=$pdo->prepare($query);

        $stmt->execute([$name,$email,$password]);

        $pdo=null;
        $stmt=null;

        header("Location: ../index.php");

        die();


    } catch (PDOException $e) {
        die("Querry failed:  " . $e->getMessage());
    }

}
else {
    header("Location: ../Registered.php");
}



?>