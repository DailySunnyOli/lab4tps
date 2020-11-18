<?php
namespace Repository;

use Repository\ICareers as ICareers;
use Model\Career as Career;

class CareerRepository implements ICareers{
    private $CareerList;

    public function __construct(){
        $this->CareerList= array();

    }
    public function add(Career $newCareer){
        $this->retrieveData();
       // $id = count($this->CareerList);
        //$id = ($id)? $id++ : 1;
        //$newCareer->setId($id);
		array_push($this->CareerList, $newCareer);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->CareerList;
    }
    
    public function getAvailable(){
		$this->retrieveAvailable();
		return $this->CareerList;
	}
	

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->CareerList as $Career) {
			$valueArray['careerId'] = $Career->getCareerId();
			$valueArray['name'] = $Career->getName();
            $valueArray['active'] = $Career->getActive();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('../Data/Careers.json', $jsonContent);
	}

	public function retrieveData(){
		$this->CareerList = array();

		$jsonPath = $this->GetJsonFilePath();

		// $jsonContent = file_get_contents('../Data/Careers.json');
		$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$Career = new Career($valueArray['id'],$valueArray['name'],$valueArray['active']);
			
			array_push($this->CareerList, $Career);
		}
    }
    
    public function retrieveAvailable(){
		$this->CareerList = array();

		$jsonPath = $this->GetJsonFilePath();

		//$jsonContent = file_get_contents('../Data/Careers.json');
		$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
            if ($valueArray['active'] == 'true'){
                $Career = new Career($valueArray['careerId'],$valueArray['name'],$valueArray['active']);
			
			    array_push($this->CareerList, $Career);

            }
		}
	}

    function GetJsonFilePath(){

        $initialPath = "Data/Careers.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>