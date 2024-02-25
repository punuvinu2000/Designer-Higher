<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $name= $_POST["name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $re_password= $_POST["re_password"];

    try {
        require_once "conekt.php";

        $query = "INSERT INTO `all_data`(`name`, `email`, `password` ) VALUES (?,?,?);";

        $stmt=$pdo->prepare($query);

        $stmt->execute([$name,$email,$password]);

        $pdo=null;
        $stmt=null;

        header("Location: ../success.html");

        die();


    } catch (PDOException $e) {
        die("Querry failed:  " . $e->getMessage());
    }

}
else {
    header("Location: ../404.html");
}



?>