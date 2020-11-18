<?php
namespace Repository;

use Repository\IStudents as IStudents;
use Model\Student as Student;

class StudentRepository implements IStudents{
    private $StudentList;

    public function __construct(){
        $this->StudentList= array();

    }
    public function add(Student $newStudent){
        $this->retrieveData();
       // $id = count($this->StudentList);
        //$id = ($id)? $id++ : 1;
        //$newStudent->setId($id);
		array_push($this->StudentList, $newStudent);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->StudentList;
    }


	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->StudentList as $Student) {
			$valueArray['idCarreer'] = $Student->getIdCarreer();
			$valueArray['name'] = $Student->getName();
            $valueArray['lastName'] = $Student->getLastName();
            $valueArray['email'] = $Student->getEmail();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('../Data/Students.json', $jsonContent);
	}

	public function retrieveData(){
		$this->StudentList = array();

		$jsonPath = $this->GetJsonFilePath();

		// $jsonContent = file_get_contents('../Data/Student.json');
		$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$Student = new Student($valueArray['idCarreer'],$valueArray['name'],$valueArray['lastName'], $valueArray['email']);
			
			array_push($this->StudentList, $Student);
		}
    }
    

    function GetJsonFilePath(){

        $initialPath = "Data/Students.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>