<?php

include_once '../global.php';

// Get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a StoryController and route it
$sc = new StoryController();
$sc->route($action);

class StoryController {

	// route us to the appropriate class method for this action
	public function route($action) {

		switch($action) {

			//A page the displays a single story
			case 'viewStory':
				$id = $_GET['id'];
				$this->viewStory($id);
				break;

			//A page that displays all of the stories
			case 'viewStories':
				$this->viewStories();
				break;

			//A page that allows for adding a single story
			case 'addStory':

				//Must be logged in
				if(!isset($_SESSION['username'])) {
					header('Location: '.BASE_URL); exit();
				}

				$this->addStory();
				break;

			//A process that allows for adding a single story
			case 'addStoryProcess':

				//Must be logged in
				if(!isset($_SESSION['username'])) {
					header('Location: '.BASE_URL); exit();
				}

				$this->addStoryProcess();
				break;

			//Edits a story, is posted from single story page
			case 'editStoryProcess':

				//Must be logged in
				if(!isset($_SESSION['username'])) {
					header('Location: '.BASE_URL); exit();
				}

				$id = $_GET['id'];
				$this->editStoryProcess($id);
				break;

			//Deletes a story page
			case 'deleteStoryProcess':

				//Must be logged in
				if(!isset($_SESSION['username'])) {
					header('Location: '.BASE_URL); exit();
				}

				$id = $_GET['id'];
				$this->deleteStoryProcess($id);
				break;

		}
	}

  //A page the displays a single story
	public function viewStory($id) {
		//Page start
		$pageTitle = 'Chaplain Story';
		include_once SYSTEM_PATH.'/view/header.tpl';
		//Get story for page
		$story = Story::loadById($id);
		//Stop if story_id doesn't exist.
		if($story == null) {
		 die('Invalid story ID');
		}
    //Get comments for story
		$comments = Comment::getByStoryId($id);
		//Load rest of page
		include_once SYSTEM_PATH.'/view/specificPerson.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';

  }

	//A page that displays all of the stories
	public function viewStories() {
		$stories = Story::getStories();
		$pageTitle = 'Chaplain Stories';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/familyTree.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

  //A page that allows for adding a single story
	public function addStory() {
		$pageTitle = 'Add A Story';
		include_once SYSTEM_PATH.'/view/header.tpl';
		include_once SYSTEM_PATH.'/view/createMember.tpl';
		include_once SYSTEM_PATH.'/view/footer.tpl';
	}

  //A process that allows for adding a single story
	public function addStoryProcess() {
		// Get POST variables
		$title 	 = $_POST['title'];
		$text    = $_POST['text'];
		$user_id = $_SESSION['user_id'];

		//Add to event to database
		$event = new Event();
		$event->text = 'Added a story! -> '.$title;
		$event->user_id = $_SESSION['user_id'];
		$event->save();

		//Load Page

		// Title and text are reqired
		if(empty($title) || empty($text)) {
			header('Location: '.BASE_URL.'/createMember'); exit();
		}

		//Setup new story object
		$story = new Story();
		$story->title = $title;
		$story->text = $text;
		$story->user_id = $user_id;

		//Save story into the DB
		$story_id = $story->save();
		header('Location: '.BASE_URL.'/stories/view/'.$story_id); exit();
	}

	//Edits a story, is posted from single story page
	public function editStoryProcess($story_id) {
		//Add to event to database
		$event = new Event();
		$story = Story::loadById($story_id);
		$title = $story->title;
		$event->text = 'Edited a story. -> '.$title;
		$event->user_id = $_SESSION['user_id'];
		$event->save();

		//Load Page

		// Only text is post on edit
		$text = $_POST['text'];
		// Connect to db
		$db = Db::instance();
		// Build query
		$q = sprintf("UPDATE %s SET `text` = '%s' WHERE `id` = %d;", Story::DB_TABLE, $text, $story_id);
		//Execute query
		$db->query($q);

		header('Location: '.BASE_URL.'/stories/view/'.$story_id); exit();

	}

	//Deletes a story page
	public function deleteStoryProcess($story_id) {
		//Add to event to database
		$event = new Event();
		$event->text = 'Deleted a story. -> '.Story::loadById($story_id)->title;
		$event->user_id = $_SESSION['user_id'];
		$event->save();

		//Load Page

		// Connect to db
    $db = Db::instance();
    // Build query
    $q = sprintf("DELETE FROM %s WHERE id = %d;", Story::DB_TABLE, $story_id);
    // Execute query
    $db->query($q);

		header('Location: '.BASE_URL.'/stories/'); exit();

	}
}
