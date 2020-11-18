<?php
namespace Repository;

use Repository\IBooks as IBooks;
use Model\Book as Book;

class BookRepository{
    private $bookList;

    public function __construct(){
        $this->bookList= array();

    }
    public function add(Book $newbook){
        $this->retrieveData();
       // $id = count($this->bookList);
        //$id = ($id)? $id++ : 1;
        //$newbook->setId($id);
		array_push($this->bookList, $newbook);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->bookList;
	}
	

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->bookList as $book) {
			$valueArray['id'] = $book->getId();
			$valueArray['title'] = $book->getTitle();
            $valueArray['author'] = $book->getAuthor();
            $valueArray['genre'] = $book->getGenre();
            $valueArray['format'] = $book->getFormat();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('../Data/books.json', $jsonContent);
	}

	public function retrieveData(){
		$this->bookList = array();

		$jsonPath = $this->GetJsonFilePath();

		// $jsonContent = file_get_contents('../Data/book.json');
		$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$book = new Book($valueArray['id'],$valueArray['title'],$valueArray['author'], $valueArray['genre'], $valueArray['format']);
			
			array_push($this->bookList, $book);
		}
	}

    function GetJsonFilePath(){

        $initialPath = "Data/books.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>