<?php 
namespace Repository;

use Models\Book as Book;

interface IBooks{
	function add(Book $book);
	//function delete($title);
	function getAll();
 
}
?>
