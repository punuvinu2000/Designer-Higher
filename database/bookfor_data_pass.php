<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $name= $_POST["name"];
    $email= $_POST["email"];
    $select_se= $_POST["select_se"];
    $date= $_POST["date"];
    $darequestte= $_POST["request"];


    try {
        require_once "conekt.php";

        $query = "INSERT INTO `book_for`(`name`, `email`, `service`, `date`, `request`) VALUES (?,?,?,?,?);";

        $stmt=$pdo->prepare($query);

        $stmt->execute([$name,$email,$select_se,$date,$darequestte]);

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