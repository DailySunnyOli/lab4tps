<?php
namespace Process;
include_once '../Config/constants.php';
include_once '../Config/autoload.php';

use Models\Task as Task;
use Repositories\TaskRepository as TaskRepository;
    if($_GET){
        $taskRepo = new TaskRepository();
        $taskRepo->delete($_GET['title']);
        $message = "Tarea eliminada con éxito";
    }
    include_once '../dashboard.php';
?>