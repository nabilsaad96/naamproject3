<?php

include_once '../global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a SiteController and route it
$sc = new SiteController();
$sc->route($action);

class SiteController {

	// route us to the appropriate class method for this action
	public function route($action) {
		switch($action) {
			case 'home':
				$this->home();
				break;

			case 'randomPerson':
				$this->randomPerson();
			break;

			case 'specificPerson':
				$this->specificPerson();
			break;

			case 'altHome':
				$this->home();
			break;

			case 'createMember':
				$this->createMember();
			break;

			case 'login':
				$this->login();
				break;

			case 'loginProcess':
				$username = $_POST['username'];
				$password = $_POST['pw'];
				$this->loginProcess($username, $password);
				break;

			case 'signup':
				$this->signup();
				break;

			case 'logout':
				$this->logoutProcess();
				break;

			case 'help':
				$this->help();
				break;

			case 'showPhysicalServer':
				$this->showPhysicalServer();
				break;

			case 'showVirtualServer':
				$this->showVirtualServer();
				break;

			case 'signupProcess':
				$username = $_POST['username'];
				$password = $_POST['pw'];
				$email = $_POST['email'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dob = $_POST['birthday'];
				$this->signupProcess($username, $password, $email, $firstName, $lastName, $dob);
				break;
		}

	}

	public function home() {
		$pageTitle = 'Home';
		$events = Event::getEvents();

		include_once SYSTEM_PATH.'/view/header.tpl';
	//	if(isset($_SESSION['username'])):
	//		include_once SYSTEM_PATH.'/view/dashboard.tpl';
//	else:
			include_once SYSTEM_PATH.'/view/homepage.tpl';
	//	endif;

		include_once SYSTEM_PATH.'/view/footer.tpl';
  }

	public function help() {
		$pageTitle = 'Help';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/help.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function signupProcess($un, $pw, $em, $fn, $ln, $dob) {

		$user = User::loadByUsername($un);
		if($user == null) {

			$user = new User();

			$user->username  = $un;
			$user->password  = $pw;
			$user->email     = $em;
			$user->firstName = $fn;
			$user->lastName  = $ln;
			$user->birthday  = $dob;

			$userID = $user->save();
			$this->loginProcess($un, $pw);
		}
		header('Location: '.BASE_URL.'/login'); exit();
	}


	public function loginProcess($un, $pw) {

		$user = User::loadByUsername($un);
		if($user == null) {
	// user with that username doesn't exist
			$_SESSION['message'] = "Invalid username or password.";
			header('Location: '.BASE_URL.'/login/'); exit();
		} elseif($user->password != $pw) {
	// password doesn't match
			$_SESSION['message'] = "Invalid username or password.";
			header('Location: '.BASE_URL.'/login/'); exit();
		} else {
			$_SESSION['username'] = $user->username;
			$_SESSION['user_id'] = $user->id;
			$_SESSION['role'] = $user->role;
			header('Location: '.BASE_URL); exit();
		}
	}



	public function specificPerson() {
		$pageTitle = 'Specific Person';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/specificPerson.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function createMember() {
		$pageTitle = 'Create Member';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/createMember.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function randomPerson() {
		$stories = Story::getStories();
		$size = count($stories);

		if ($size > 1 ) {
			$arrayIndex = rand(0, $size - 1);
			$story = $stories[$arrayIndex];
			$id = $story->id;
			header('Location: '.BASE_URL.'/stories/view/'.$id); exit();
		}
		else { // There are not chaplains stored on the server
			header('Location: '.BASE_URL); exit(); // send us to home page
		} // End if.
	}

	public function showPhysicalServer() {
		$pageTitle = 'Physical Server Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}
	public function showVirtualServer() {
		$pageTitle = 'Virtual Server Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = VirtualServer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDS() {
		$pageTitle = 'Docker Swarm Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showHLB() {
		$pageTitle = 'Hardware Load Balancer Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDatabase() {
		$pageTitle = 'Database Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showApp() {
		$pageTitle = 'Application Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}


	public function login() {
		$pageTitle = 'Login';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/login.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function logoutProcess() {
		unset($_SESSION['username']); // not necessary, but just to be safe
		session_destroy();
		header('Location: '.BASE_URL); exit(); // send us to home page
	}

	public function signup() {
		$pageTitle = 'Signup';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/signup.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}
}
