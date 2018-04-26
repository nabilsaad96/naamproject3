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

			case 'showHLB':
				$this->showHLB();
				break;

			case 'showDatabase':
				$this->showDatabase();
				break;

			case 'showDS':
				$this->showDS();
				break;

			case 'showApp':
				$this->showApp();
				break;


				case 'showPhysicalServerDe':
					$this->showPhysicalServerDe();
					break;

				case 'showVirtualServerDe':
					$this->showVirtualServerDe();
					break;

				case 'showHLBDe':
					$this->showHLBDe();
					break;

				case 'showDatabaseDe':
					$this->showDatabaseDe();
					break;

				case 'showDSDe':
					$this->showDSDe();
					break;

				case 'showAppDe':
					$this->showAppDe();
					break;

				case 'showPhysicalServerDet':
					$this->showPhysicalServerDet();
					break;

				case 'showVirtualServerDet':
					$this->showVirtualServerDet();
					break;

				case 'showHLBDet':
					$this->showHLBDet();
					break;

				case 'showDatabaseDet':
					$this->showDatabaseDet();
					break;

				case 'showDSDet':
					$this->showDSDet();
					break;

				case 'showAppDet':
					$this->showAppDet();
					break;


			case 'showPhysicalServerDep':
				$n = $_GET['name'];
				$this->showPhysicalServerDep($n);
				break;

			case 'showVirtualServerDep':
				$n = $_GET['name'];
				$this->showVirtualServerDep($n);
				break;

			case 'showHLBDep':
				$n = $_GET['name'];
				$this->showHLBDep($n);
				break;

			case 'showDatabaseDep':
				$n = $_GET['name'];
				$this->showDatabaseDep($n);
				break;

			case 'showDSDep':
				$n = $_GET['name'];
				$this->showDSDep($n);
				break;

			case 'showAppDep':
				$n = $_GET['name'];
				$this->showAppDep($n);
				break;

			case 'showPhysicalServerDept':
				$n = $_GET['name'];
				$this->showPhysicalServerDept($n);
				break;

			case 'showVirtualServerDept':
				$n = $_GET['name'];
				$this->showVirtualServerDept($n);
				break;

			case 'showHLBDept':
				$n = $_GET['name'];
				$this->showHLBDept($n);
				break;

			case 'showDatabaseDept':
				$n = $_GET['name'];
				$this->showDatabaseDept($n);
				break;

			case 'showDSDept':
				$n = $_GET['name'];
				$this->showDSDept($n);
				break;

			case 'showAppDept':
				$n = $_GET['name'];
				$this->showAppDept($n);
				break;

			case 'dependencyOptions':
				$this->dependencyOptions();
				break;

			case 'dependentOptions':
				$this->dependentOptions();
				break;

			case 'showChanges':
				$this->showChanges();
				break;

			case 'makeChanges':
				$this->makeChanges();
				break;

			case 'makePhysical':
			$this->makePhysical();
			break;

			case 'makePhysicalObj':
			$n = $_GET['name'];
			$this->makePhysicalObj($n);
			break;

			case 'makeVirtual':
			$this->makeVirtual();
			break;

			case 'makeDB':
			$this->makeDB();
			break;

			case 'makeDS':
			$this->makeDS();
			break;

			case 'makeHLB':
			$this->makeHLB();
			break;

			case 'makeApp':
			$this->makeApp();
			break;

			case 'adhoc':
				$query = $_POST['query'];
				$this->adhoc($query);
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

	public function adhoc($q) {
		$pageTitle = 'Ad Hoc Query';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$r1 = Application::doQuery($q);
		echo($r1);
		//$rl = Application::loadAll();

		//include_once SYSTEM_PATH.'/view/showall.tpl';

		include_once SYSTEM_PATH.'/view/complexquery.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';

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

	public function showChanges() {
		$pageTitle = 'Recent Changes';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = configLog::loadAll();

		include_once SYSTEM_PATH.'/view/log.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makeChanges() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/makeChanges.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
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

	public function dependencyOptions() {
		$pageTitle = 'Show Dependencies Options';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/dependencyselect.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function dependentOptions() {
		$pageTitle = 'Show Dependent Objects';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/dependentselect.tpl';
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
		$rl = DockerSwarm::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showHLB() {
		$pageTitle = 'Hardware Load Balancer Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = HardwareLoadBalancer::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDatabase() {
		$pageTitle = 'Database Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Database::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showApp() {
		$pageTitle = 'Application Relation';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Application::loadAll();

		include_once SYSTEM_PATH.'/view/showall.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

//to actually get the dependencies
	public function showPhysicalServerDep($n) {
		$pageTitle = 'Physical Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loaddep($n);

		include_once SYSTEM_PATH.'/view/dependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}
	public function showVirtualServerDep($n) {
		$pageTitle = 'Virtual Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = VirtualServer::loaddep($n);

		include_once SYSTEM_PATH.'/view/dependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDSDep($n) {
		$pageTitle = 'Docker Swarm Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = DockerSwarm::loaddep($n);

		include_once SYSTEM_PATH.'/view/dependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showHLBDep($n) {
		$pageTitle = 'Hardware Load Balancer Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = HardwareLoadBalancer::loaddep($n);

		include_once SYSTEM_PATH.'/view/dependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDatabaseDep($n) {
		$pageTitle = 'Database Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Database::loaddep($n);

		include_once SYSTEM_PATH.'/view/dependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showAppDep($n) {
		$pageTitle = 'Application Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Application::loaddep($n);

		include_once SYSTEM_PATH.'/view/dependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showPhysicalServerDept($n) {
		$pageTitle = 'Physical Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loaddet($n);

		include_once SYSTEM_PATH.'/view/dependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}
	public function showVirtualServerDept($n) {
		$pageTitle = 'Virtual Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = VirtualServer::loaddet($n);

		include_once SYSTEM_PATH.'/view/dependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDSDept($n) {
		$pageTitle = 'Docker Swarm Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = DockerSwarm::loaddet($n);

		include_once SYSTEM_PATH.'/view/dependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showHLBDept($n) {
		$pageTitle = 'Hardware Load Balancer Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = HardwareLoadBalancer::loaddet($n);

		include_once SYSTEM_PATH.'/view/dependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDatabaseDept($n) {
		$pageTitle = 'Database Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Database::loaddet($n);

		include_once SYSTEM_PATH.'/view/dependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showAppDept($n) {
		$pageTitle = 'Application Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Application::loaddet($n);

		include_once SYSTEM_PATH.'/view/dependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

//to show the tuples to allow the user to choose
	public function showPhysicalServerDe() {
		$pageTitle = 'Physical Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/physicaldependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}
	public function showVirtualServerDe() {
		$pageTitle = 'Virtual Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = VirtualServer::loadAll();

		include_once SYSTEM_PATH.'/view/virtualdependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDSDe() {
		$pageTitle = 'Docker Swarm Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = DockerSwarm::loadAll();

		include_once SYSTEM_PATH.'/view/dockerswarmdependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showHLBDe() {
		$pageTitle = 'Hardware Load Balancer Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = HardwareLoadBalancer::loadAll();

		include_once SYSTEM_PATH.'/view/hlbdependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDatabaseDe() {
		$pageTitle = 'Database Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Database::loadAll();

		include_once SYSTEM_PATH.'/view/dbdependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showAppDe() {
		$pageTitle = 'Application Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Application::loadAll();

		include_once SYSTEM_PATH.'/view/appdependencies.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showPhysicalServerDet() {
		$pageTitle = 'Physical Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/physicaldependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}
	public function showVirtualServerDet() {
		$pageTitle = 'Virtual Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = VirtualServer::loadAll();

		include_once SYSTEM_PATH.'/view/virtualdependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDSDet() {
		$pageTitle = 'Docker Swarm Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = DockerSwarm::loadAll();

		include_once SYSTEM_PATH.'/view/dsdependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showHLBDet() {
		$pageTitle = 'Hardware Load Balancer Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = HardwareLoadBalancer::loadAll();

		include_once SYSTEM_PATH.'/view/hlbdependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showDatabaseDet() {
		$pageTitle = 'Database Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Database::loadAll();

		include_once SYSTEM_PATH.'/view/dbdependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function showAppDet() {
		$pageTitle = 'Application Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Application::loadAll();

		include_once SYSTEM_PATH.'/view/appdependent.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makePhysical() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::loadAll();

		include_once SYSTEM_PATH.'/view/makePhysical.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makePhysicalObj($n) {
		$pageTitle = 'Physical Server Dependencies';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = PhysicalServer::select($n);

		include_once SYSTEM_PATH.'/view/makePhysical.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makeVirtual() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = VirtualServer::loadAll();

		include_once SYSTEM_PATH.'/view/makeVirtual.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makeDB() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Database::loadAll();

		include_once SYSTEM_PATH.'/view/makeDB.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makeDS() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = DockerSwarm::loadAll();

		include_once SYSTEM_PATH.'/view/makeDS.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makeHLB() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = HardwareLoadBalancer::loadAll();

		include_once SYSTEM_PATH.'/view/makeHLB.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

	public function makeApp() {
		$pageTitle = 'Update Configuration Item';
		include_once SYSTEM_PATH.'/view/header.tpl';
		$rl = Application::loadAll();

		include_once SYSTEM_PATH.'/view/makeApp.tpl';
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
