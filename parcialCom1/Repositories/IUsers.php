<?php 
namespace Repositories;

use Models\User as User;

interface IUsers{
	function add(User $newUser);
	function delete($name);
	function getAll();
 
}
?>
