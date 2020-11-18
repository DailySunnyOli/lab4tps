<?php
require_once 'Config/Autoload.php';
use Repository\StudentRepository as StudentRepository;
use Model\Student as Student;

if ($_POST){
    $StudentRepo = new StudentRepository();
        
        $Student_aux = new Student($_POST['careerId'],$_POST['name'],$_POST['lastName'],$_POST['email']);
        $StudentRepo->add($Student_aux);
        include_once 'student-list.php';
}
else {
    sesion_start();
    $_SESSION['message'] = "Se ha producido un error";
    header("Location: index.php");
}
?>