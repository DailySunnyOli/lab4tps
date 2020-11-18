<?php 
namespace Repository;

use Model\Career as Career;

interface ICareers{
	function add(Career $Career);
	//function delete($name);
	function getAll();
 
}
?>