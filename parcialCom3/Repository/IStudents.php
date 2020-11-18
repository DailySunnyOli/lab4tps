<?php 
namespace Repository;

use Models\Student as Student;

interface IStudents{
	function add(Student $student);
	//function delete($lastName);
	function getAll();
 
}
?>