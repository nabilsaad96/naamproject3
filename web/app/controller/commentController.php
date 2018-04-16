<?php

include_once '../global.php';

// Get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a CommentController and route it
$cc = new CommentController();
$cc->route($action);

class CommentController {

	// Route us to the appropriate class method for this action
	public function route($action) {

    // Comments can only be used if logged in
    if(!isset($_SESSION['username'])) {
      header('Location: '.BASE_URL); exit();
    }

    switch($action) {

			case 'addCommentProcess':
        $story_id = $_GET['story_id'];
        $this->addCommentProcess($story_id);
        break;

			case 'deleteCommentProcess':
			  $story_id = $_GET['story_id'];
				$this->deleteCommentProcess($story_id);
				break;

		}
	}

	//Add a comment
	public function addCommentProcess($story_id) {
		//Add to event to database
		$event = new Event();
		$event->text = 'Added a comment. -> '.(Story::loadById($story_id)->title);
		$event->user_id = $_SESSION['user_id'];
		$event->save();

		// Get the comment
		$comment = $_POST['comment'];
		//Check the comment for language
		$comment = apiController::getProfanity($comment);
		// Setup comment object
		$cm = new Comment();
    $cm->user_id = $_SESSION['user_id'];
    $cm->story_id = $story_id;
		$cm->comment = $comment;
		//Save into database
		$cm->save();

		// Check if save was valid
		if($cm->id != 0) {
			$json = array('success' => 'success');
		} else {
			$json = array('error' => 'Could not save comment.');
		}

		// Let client know it's Ajax
		header('Content-Type: application/json');
		// Print the JSON
		echo json_encode($json);
	}

	//Remove a comment
	public function deleteCommentProcess($story_id) {
		//Add to event to database
		$event = new Event();
		$event->text = 'Deleted a comment. -> '.(Story::loadById($story_id)->title);
		$event->user_id = $_SESSION['user_id'];
		$event->save();

		// The unique comment id
    $idCM = $_POST['idCM'];
    //Check that it is valid request
    $comment = Comment::loadById($idCM);
    if ($_SESSION['role'] == 2 || $comment->user_id == $_SESSION['user_id']){
      // Call comment's delete
		  $cmS = Comment::deleteById($idCM);
      // Check result
		  if($cmS == 1) {
		       $json = array('success' => 'success');
		  } else {
			     $json = array('error' => 'Could not delete comment.');
		  }
      // Let client know it's Ajax
		  header('Content-Type: application/json');
      // Print the JSON
      echo json_encode($json);
    }
	}
}
