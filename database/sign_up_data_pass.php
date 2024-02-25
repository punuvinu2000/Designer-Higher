<?php
$sing_in=false;

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $email= $_POST["email"];
    $password= $_POST["password"];
    

    try {
        require_once "conekt.php";

       $query = "SELECT `password` FROM `all_data` WHERE email= $email;";

        $stmt=$pdo->prepare($query);
        if ($stmt==$password) {

            $sing_in=true;
 
        }
        else{
            header("Location: ../unsuccess.html");
        }
        $pdo=null;
        
        header("Location: ../success.html");


    } catch (PDOException $e) {
        
        die("Querry failed:  " . $e->getMessage());
    }

}
else {
    header("Location: ../404.html");
}



?>