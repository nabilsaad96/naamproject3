<?php

class PhysicalServer {
  // Database table name
  const DB_TABLE = 'PhysicalServer';

  // Database fields for comment
  public $name = '';
  public $SAN = '';
  public $admin = '';
  public $backupAdmin = '';

  // Returns a Comment object by ID
  public static function loadById($id) {
      // Connect to database
      $db = Db::instance();
      // Database query
      $q = sprintf("SELECT * FROM `%s` WHERE name = %s;", self::DB_TABLE, $id);
      // Do the query
      $result = $db->query($q);
      // If nothing found
      if($result->num_rows == 0) {
        return null;
      }

      // Get results as associative array
      $row = $result->fetch_assoc();
      // Instantiate new Life Event object
      $cm = new PhysicalServer();

      // Store db results in into a Comment object
      $cm->name             = $row['name'];
      $cm->SAN              = $row['SAN'];
      $cm->admin            = $row['admin'];
      $cm->$backupAdmin     = $row['backupAdmin'];
      // Return the comment
      return $cm;
  }

  // Return all comments attached to a story
  public static function getByStoryId($story_id) {
    // Connect to database
    $db = Db::instance();
    // Database query
    $q = sprintf("SELECT cm.id AS CommentID FROM `%s` cm
      INNER JOIN `%s` p ON
      cm.story_id = p.id
      WHERE cm.story_id = %d
      ORDER BY cm.date_created DESC ",
      self::DB_TABLE,
      Story::DB_TABLE,
      $story_id
      );
    // Do the query
    $result = $db->query($q);
    // If nothing found
    if($result->num_rows == 0) {
      return null;
    }

    $comments = array();
    //Turn the id's into full comments
    while($row = $result->fetch_assoc()) {
      $comments[] = self::loadById($row['CommentID']);
    }

    //Return the comments
    return $comments;
  }

  public static function loadAll() {
    // Connect to database
    $db = Db::instance();
    // Database query
    $q = sprintf("SELECT * FROM `%s`;",
      self::DB_TABLE
      );
      echo($q);
    // Do the query
    $result = $db->query($q);
    // If nothing found
    if($result->num_rows == 0) {
      return null;
    }

    $physicalservers = array();
    //Turn the id's into full comments
    while($row = $result->fetch_assoc()) {
      $physicalservers[] = self::loadById($row['CommentID']);
    }

    //Return the comments
    return $physicalservers;
  }


  //Chooses to add or update depending on ID (new id is 0)
  public function save(){
    if($this->id == 0) {
      // Object is new and needs to be created
      return $this->insert();
    }
  }

  public function insert() {
    // Can't insert something that already has an ID
    if($this->id != 0){
      return null;
    }
    // Connect to db
    $db = Db::instance();

    // Build query
    $q = sprintf("INSERT INTO `%s` (`user_id`, `story_id`, `comment`) VALUES (%d, %d, %s);", self::DB_TABLE, $db->escape($this->user_id), $db->escape($this->story_id), $db->escape($this->comment));

    // Execute query
    $db->query($q);

    // Set the ID for the new object
    $this->id = $db->getInsertID();
    return $this->id;
  }

  public static function deleteById($idCM) {
      $db = Db::instance(); // create db connection
      // build query
      $q = sprintf("DELETE FROM `%s` WHERE id = %d;", self::DB_TABLE, $idCM);
      $result = $db->query($q); // execute query
      return $result;
  }
}
