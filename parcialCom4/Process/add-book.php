<?php
namespace Process;
include_once '../Config/Constants.php';
include_once '../Config/Autoload.php';

use Model\Book as Book;
use Repository\BookRepository as BookRepository;

if ($_POST){
    $BookRepo = new BookRepository();
    $BookList = $BookRepo->getAll();
    $flag = null;

    foreach($BookList as $Book){

        if ($Book->getId() == $_POST['id']){
            $flag = 1;
        }
    }
    if($flag){
        $message = "No puede haber dos libros con el mismo id";
    }
    else{
        $Book_aux = new Book($_POST['id'], $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['format']);
        $BookRepo->add($Book_aux);
        $message = "Libro agregado con éxito";
    }
    header('Location: ../list.php');
}