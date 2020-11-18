<?php 
namespace Repositories;

use Repositories\IUsers as IUsers;
use Models\User as User;

class UserRepository implements Iusers{
	
	private $userList = array();

	public function add(user $newUser){
		$this->retrieveData();
		array_push($this->userList, $newUser);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->userList;
	}
	public function delete($name){
		$this->retrieveData();
		$newList = array();
		foreach ($this->userList as $user) {
			if($user->getName() != $name){
				array_push($newList, $user);
			}
		}

		$this->userList = $newList;
		$this->saveData();
	}

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->userList as $user) {
			$valueArray['name'] = $user->getName();
			$valueArray['user'] = $user->getUser();
			$valueArray['pass'] = $user->getPass();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('../Data/users.json', $jsonContent);
	}

	public function retrieveData(){
		$this->userList = array();

		$jsonPath = $this->GetJsonFilePath();

		// $jsonContent = file_get_contents('../Data/user.json');
		$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$user = new user($valueArray['name'],$valueArray['user'],$valueArray['pass']);
			
			array_push($this->userList, $user);
		}
	}

    function GetJsonFilePath(){

        $initialPath = "Data/users.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>