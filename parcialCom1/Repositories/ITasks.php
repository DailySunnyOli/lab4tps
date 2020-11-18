<?php 
namespace Repositories;

use Models\Task as Task;

interface ITasks{
	function add(Task $newTask);
	function delete($name);
	function getAll();
 
}
?>
