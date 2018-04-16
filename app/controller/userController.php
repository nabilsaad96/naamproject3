<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a SiteController and route it
$sc = new UserController();
$sc->route($action);

class UserController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {
			case 'view':
        $username = $_GET['username'];
				$this->view($username);
				break;

			case 'addfollow':
				$followee = $_GET['username'];
				$follower = $_GET['follower'];
				$this->addFollow($follower, $followee);
				break;

			case 'deletefollowerprocess':
				$follower = $_GET['follower'];
				$followee = $_GET['followee'];
				$this->delFollow($follower, $followee);
				break;

			case 'edit':
				$username = $_GET['username'];
				$this->edit($username);
				break;

			case 'editFirstName':
				$username = $_GET['username'];
				$firstName = $_POST['firstName'];
				$this->editFirstName($username, $firstName);
				break;

			case 'editLastName':
				$username = $_GET['username'];
				$lastName = $_POST['lastName'];
				$this->editlastName($username, $lastName);
				break;

			case 'editBirthday':
				$username = $_GET['username'];
				$birthday = $_POST['birthday'];
				$this->editBirthday($username, $birthday);
				break;

			case 'editEmail':
				$username = $_GET['username'];
				$email = $_POST['email'];
				$this->editEmail($username, $email);
				break;

			case 'editPassword':
				$username = $_GET['username'];
				$password = $_POST['password'];
				$this->editPassword($username, $password);
				break;
		}
	}


  public function view($un) {


    $user = User::loadByUsername($un);
		$tempId = $user->id;
		$events = Event::getPersonEvents($tempId);
		// does username exist?
		if($user == null) {
			header('Location: '.BASE_URL); exit();
		}
		$people = Follower::getByFollowee($user->username);
		$followers = Follower::getByFollower($user->username);

		$pageTitle = 'Profile for '.$user->username;
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/profilepage.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function edit($un) {

		$user = User::loadByUsername($un);
		// does username exist?
		if($user == null) {
			header('Location: '.BASE_URL); exit();
		}

		$pageTitle = 'Profile for '.$user->username;
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/editprofilepage.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function addFollow($fr, $fe) {
			$follow = new Follower();
			$follow->follower = $fr;
			$follow->followee = $fe;
			$followID = $follow->save();
			header('Location: '.BASE_URL.'/user/view/'.$fe); exit();
	}

	public function delFollow($fr, $fe) {
		$follow = new Follower();

		$follow->delete($fr, $fe);
		header('Location: '.BASE_URL.'/user/view/'.$fr); exit();
	}

	public function editPassword($un, $pw) {
		$user = User::loadByUsername($un);
		if($user != null) {
			$user->password = $pw;

			$userID = $user->update();
			header('Location: '.BASE_URL.'/user/view/'.$un.'/edit'); exit();
		}
	}

	public function editFirstName($un, $fn) {
		$user = User::loadByUsername($un);
		if($user != null) {
			$user->firstName = $fn;

			$userID = $user->update();
			header('Location: '.BASE_URL.'/user/view/'.$un.'/edit'); exit();
			}
		}

		public function editLastName($un, $ln) {
			$user = User::loadByUsername($un);
			if($user != null) {
				$user->lastName = $ln;

				$userID = $user->update();
				header('Location: '.BASE_URL.'/user/view/'.$un.'/edit'); exit();
			}
		}

		public function editEmail($un, $em) {
			$user = User::loadByUsername($un);
			if($user != null) {
				$user->email = $em;

				$userID = $user->update();
				header('Location: '.BASE_URL.'/user/view/'.$un.'/edit'); exit();
			}
		}

		public function editBirthday($un, $bd) {
			$user = User::loadByUsername($un);
			if($user != null) {
				$user->birthday = $bd;

				$userID = $user->update();
				header('Location: '.BASE_URL.'/user/view/'.$un.'/edit'); exit();
			}
		}
}
