<?php 
namespace Repositories;

use Repositories\ITasks as ITasks;
use Models\Task as Task;

class TaskRepository implements ITasks{
	
	private $taskList = array();

	public function add(task $newtask){
		$this->retrieveData();
		array_push($this->taskList, $newtask);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->taskList;
	}
	public function delete($title){
		$this->retrieveData();
		$newList = array();
		foreach ($this->taskList as $task) {
			if($task->getTitle() != $title){
				array_push($newList, $task);
			}
		}

		$this->taskList = $newList;
		$this->saveData();
	}

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->taskList as $task) {
			$valueArray['title'] = $task->getTitle();
			$valueArray['date'] = $task->getDate();
            $valueArray['description'] = $task->getDescription();
            $valueArray['reminder'] = $task->getReminder();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('../Data/tasks.json', $jsonContent);
	}

	public function retrieveData(){
		$this->taskList = array();

		$jsonPath = $this->GetJsonFilePath();

		// $jsonContent = file_get_contents('../Data/task.json');
		$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$task = new Task($valueArray['title'],$valueArray['date'],$valueArray['description'],$valueArray['reminder']);
			
			array_push($this->taskList, $task);
		}
	}


    function GetJsonFilePath(){

        $initialPath = "Data/tasks.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>