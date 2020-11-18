<?php
namespace Process;
    require_once("../Config/Autoload.php");

    use Model\User as User;
    var_dump($_POST);
    if($_POST)
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["pass"]) ? $_POST["pass"] : "";
        var_dump($email);
        var_dump($password);

        if($email == "user@myapp.com" && $password === "111")
        {
            $user = new User();
            $user->setEmail($email);
            $user->setPass($password);

            session_start();

            $_SESSION["loggedUser"] = $user;
            var_dump($_SESSION);
            header("location: ../add-form.php");
        }
       // else
           // header("location:../index.php");
    }
    var_dump($_POST);
?>

