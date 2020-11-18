<?php
namespace Process;
include_once '../Config/constants.php';
include_once '../Config/autoload.php';

use Models\Task as Task;
use Repositories\TaskRepository as TaskRepository;

if ($_POST){
    $taskRepo = new TaskRepository();
    $taskList = $taskRepo->getAll();
    $flag = null;

    foreach($taskList as $task){

        if ($task->getTitle() == $_POST['title']){
            $flag = 1;
        }
    }
    if($flag){
        $message = "No puede haber dos tareas con el mismo título";
    }
    else{
        $task_aux = new Task($_POST['title'],$_POST['date'],$_POST['description'],$_POST['reminder']);
        $taskRepo->add($task_aux);
        $message = "Tarea agregada con éxito";
    }
    include_once '../dashboard.php';
}