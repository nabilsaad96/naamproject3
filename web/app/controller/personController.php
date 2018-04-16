<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a SoldierController and route it
$sc = new PersonController();
$sc->route($action);

class PersonController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {

			case 'view':
        // $name = $_GET['name']; // get the person name
				$id = $_GET['id'];
				$this->view($id);
				break;

			case 'tree':
				$this->tree();
			break;

			case 'add':
				$this->add();
				break;

			case 'addProcess':
				$this->addProcess();
				break;

			case 'deleteUser':
				$id = $_GET['id'];
				$this->deleteUser($id);
				break;

			case 'editUser':
				$id = $_GET['id'];
				$this->editUser($id);
				break;

			case 'deleteItem':
				$id = $_GET['id'];
				$desc = $_GET['desc'];
				$this->deleteItem($desc, $id);
				break;
		}
	}

	public function view($id) {
		//Page init
		$pageTitle = 'Chaplain Story';
		include_once SYSTEM_PATH.'/view/header.tpl';
		//Get person for page
		$person = Person::loadById($id);
		//Stop if person doesn't exist.
		if($person == null) {
		 die('Invalid person ID');
		}
		$comments = Comment::getByStoryId($id);
		//Load rest of page
		include_once SYSTEM_PATH.'/view/specificPerson.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function tree() {
		$people = Person::getPerson();
		$pageTitle = 'Story';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/familyTree.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function add() {
		$pageTitle = 'Add Person';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/createMember.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function addProcess() {
		// get POST variables
		$firstName 	 = $_POST['first_name']; // required
		//$lastName 	 = $_POST['last_name']; // required
		//$fileName		 = $_POST['file_name'];
		//$info_small 	 = ' ';//$_POST['summary'];
		$info_large   = $_POST['full_description'];
		//$quick_info 	 = $_POST['quick_info'];

		// first name and last name are required
		if( empty($firstName)) {
			header('Location: '.BASE_URL.'/createMember'); exit();
		}

		$person = new Person();

		$person->first_name   = $firstName;
		$person->last_name    = $firstName;
		//$person->file_name    = $fileName;
		$person->info_small   = $info_large;
		$person->info_large   = $info_large;
		//$person->quick_info   = $quick_info;


		$personID = $person->save();
		//echo 'soldier ID: '.$soldierID;
		header('Location: '.BASE_URL.'/person/view/'.$personID); exit();
	}

	public function deleteUser($id) {
		if($id == 0)
      return null; // can't insert something that already has an ID

    $db = Db::instance(); // connect to db
    // build query


    $q = sprintf("DELETE FROM royalty WHERE id = %d;",
      $id
      );
    //echo $q;
    $db->query($q); // execute query
		$q = sprintf("DELETE FROM quick_info WHERE personID = %d;",
			$id
			);
			$db->query($q); // execute query
			header('Location: '.BASE_URL.'/stories/'); exit();

	}

	public function editUser($id) {
		if($id == 0)
			return null; // can't insert something that already has an ID

			$info_small 	 = $_POST['summary'];
			$info_large   = $_POST['description'];

		$db = Db::instance(); // connect to db
		// build query


		$q = sprintf("UPDATE royalty SET
      `info_small` = %s,
      `info_large` = %s
      WHERE `id` = %d;",
      $db->escape($info_small),
      $db->escape($info_large),
			$id
			);
		//echo $q;
		$db->query($q); // execute query
			header('Location: '.BASE_URL.'/person/view/'.$id); exit();

	}

	public function deleteItem($desc, $id) {
		$db = Db::instance();

		$q = sprintf("DELETE FROM quick_info WHERE `details` = '%s';",
			$desc
			);
			$db->query($q); // execute query
			echo $q;
			//header('Location: '.BASE_URL.'/person/view/'.$id); exit();

	}

}
