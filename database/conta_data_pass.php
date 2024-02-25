<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $name= $_POST["name"];
    $email= $_POST["email"];
    $subject= $_POST["subject"];
    $message= $_POST["message"];


    try {
        require_once "conekt.php";

        $query = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?);";

        $stmt=$pdo->prepare($query);

        $stmt->execute([$name,$email,$subject,$message]);

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