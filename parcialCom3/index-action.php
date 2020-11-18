<?php
    require_once("Config/Autoload.php");

    use Model\User as User;
    if($_POST)
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["pass"]) ? $_POST["pass"] : "";

        if($email == "admin@utn.com" && $password === "111") //cambié la pass porque el teclado me anda mal
        {
            $user = new User();
            $user->setEmail($email);
            $user->setPass($password);

            session_start();

            $_SESSION["loggedUser"] = $user;
            header("location: student-add.php");
        }
        else{
            session_start();
            $_SESSION['message'] = "Usuario incorrecto";
            header("location: index.php");
        }
            
    }
?>
