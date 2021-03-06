<?php

class configLog {
  // Database table name
  const DB_TABLE = 'configLog';

  // Database fields for comment
  public $name = '';
  public $admin = '';
  public $timestamp = '';

  // Returns a Comment object by ID
  public static function loadById($id) {
      // Connect to database
      $db = Db::instance();
      // Database query
      $q = sprintf("SELECT * FROM `%s` WHERE configName = '%s';", self::DB_TABLE, $id);
      //echo($q);
      // Do the query
      $result = $db->query($q);
      // If nothing found
      if($result->num_rows == 0) {
        return null;
      }

      // Get results as associative array
      $row = $result->fetch_assoc();
      // Instantiate new Life Event object
      $cm = new VirtualServer();

      // Store db results in into a Comment object
      $cm->name             = $row['configName'];
      $cm->admin            = $row['admin'];
      $cm->timestamp      = $row['timestamp'];

      // Return the comment
      return $cm;
  }

  public static function loadAll() {
    // Connect to database
    $db = Db::instance();
    // Database query
    $q = sprintf("SELECT * FROM `%s` ORDER BY `configLog`.`timestamp` DESC;",
      self::DB_TABLE
      );
    // Do the query
    $result = $db->query($q);
    // If nothing found
    if($result->num_rows == 0) {
      return null;
    }

    $physicalservers = array();
    //Turn the id's into full comments
    while($row = $result->fetch_assoc()) {
      $physicalservers[] = self::loadById($row['configName']);
    }
    //Return the comments
    return $physicalservers;
  }

  public static function insertNew($id, $name) {
    // Connect to database
    $db = Db::instance();
    // Database query
    $q = sprintf("INSERT INTO '%s' VALUES ('%s', '%s', 'Updated Admin', CURRENT_TIMESTAMP);",self::DB_TABLE, $id, $name);
    // Do the query
    $result = $db->query($q);
    //Return result
    return $result;
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
