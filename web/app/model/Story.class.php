<?php

class Story {
  // Database table name
  const DB_TABLE = 'story';

  // Database fields for this table
  public $id = 0;
  public $title = '';
  public $text = '';
  public $file_name = '';
  public $user_id = 0;
  public $date_created = 0;

  // Return a Story object by ID
  public static function loadById($story_id) {
      // Create db connection
      $db = Db::instance();
      // Build query
      $q = sprintf("SELECT * FROM `%s` WHERE id = %d;", self::DB_TABLE, $story_id);
      // Execute query
      $result = $db->query($q);
      // Make sure we found something
      if($result->num_rows == 0) {
        return null;
      }

      // Get results as associative array
      $row = $result->fetch_assoc();
      // Instantiate new Story object
      $story = new Story();

      // Store db results in local object
      $story->id              = $row['id'];
      $story->title           = $row['title'];
      $story->text            = $row['text'];
      $story->file_name       = $row['file_name'];
      $story->user_id         = $row['user_id'];
      $story->date_created    = $row['date_created'];

      // Return the story
      return $story;
  }


  // Return all Stories as an array
  public static function getStories() {
    // Create db connection
    $db = Db::instance();
    // Build query
    $q = "SELECT id FROM `".self::DB_TABLE."` ORDER BY id ASC;";
    // Execute query
    $result = $db->query($q);

    $stories = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        $stories[] = self::loadById($row['id']);
      }
    }
    //Return the stories
    return $stories;
  }

  public function save(){
    if($this->id == 0) {
      // Story is new and needs to be created
      return $this->insert();
    } else {
      // Story already exists and needs to be updated
      return $this->update();
    }
  }

  public function insert() {
    // Can't insert something that already has an ID
    if($this->id != 0)
      return null;

    $db = Db::instance(); // connect to db
    // build query


    $q = sprintf("INSERT INTO `%s` (`title`, `text`, `file_name`, `user_id`) VALUES (%s, %s, %s, %d);",
      self::DB_TABLE,
      $db->escape($this->title),
      $db->escape($this->text),
      $db->escape($this->file_name),
      $db->escape($this->user_id)
      );
    // Execute query
    $db->query($q);
    // Set the ID for the new object
    $this->id = $db->getInsertID();
    // Return the id
    return $this->id;
  }

  public function update() {
    // Can't update something without an ID
    if($this->id == 0){
      return null;
    }

    // Connect to db
    $db = Db::instance();

    // Build query
    $q = sprintf("UPDATE `%s` SET `title` = %s, `text` = %s, `file_name` = %s, `user_id` = %d, WHERE `id` = %d;",
      self::DB_TABLE,
      $db->escape($this->title),
      $db->escape($this->text),
      $db->escape($this->file_name),
      $db->escape($this->user_id),
      $db->escape($this->id)
      );

    // Execute query
    $db->query($q);
    // Return this object's ID
    return $db->id;

  }
}
