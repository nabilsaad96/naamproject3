<?php

class Event {

  // Database table name
  const DB_TABLE = 'event';

  // Database fields for event
  public $id = 0;
  public $user_id = 0;
  public $text = '';
  public $date_created = 0;

  // Return a Event object by ID
  public static function loadById($event_id) {
      // Create db connection
      $db = Db::instance();
      // Build query
      $q = sprintf("SELECT * FROM `%s` WHERE id = %d;", self::DB_TABLE, $event_id);
      // Execute query
      $result = $db->query($q);
      // Make sure we found something
      if($result->num_rows == 0) {
        return null;
      }

      // Get results as associative array
      $row = $result->fetch_assoc();
      // Instantiate new Story object
      $event = new Event();

      // Store db results in local object
      $event->id              = $row['id'];
      $event->user_id         = $row['user_id'];
      $event->text            = $row['text'];
      $event->date_created    = $row['date_created'];

      // Return the event
      return $event;
  }


  // Return all Stories as an array
  public static function getEvents() {
    // Create db connection
    $db = Db::instance();
    // Build query
    $q = "SELECT id FROM `".self::DB_TABLE."` ORDER BY id DESC LIMIT 5;";
    // Execute query
    $result = $db->query($q);

    $events = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        $events[] = self::loadById($row['id']);
      }
    }
    //Return the events
    return $events;
  }

  // Return all Stories as an array
  public static function getPersonEvents($inputUser) {
    // Create db connection
    $db = Db::instance();
    // Build query
    $q = sprintf("SELECT id FROM `".self::DB_TABLE."` WHERE `user_id` = %d ORDER BY id DESC LIMIT 5;", $inputUser);
    // Execute query
    $result = $db->query($q);

    $events = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        $events[] = self::loadById($row['id']);
      }
    }
    //Return the events
    return $events;
  }

  public function save(){
    if($this->id == 0) {
      // Event is new and needs to be created
      return $this->insert();
    } else {
      // Event already exists and needs to be updated
      return $this->update();
    }
  }

  public function insert() {
    // Can't insert something that already has an ID
    if($this->id != 0)
      return null;

    $db = Db::instance(); // connect to db
    // build query


    $q = sprintf("INSERT INTO `%s` (`text`, `user_id`) VALUES (%s, %d);",
      self::DB_TABLE,
      $db->escape($this->text),
      $db->escape($this->user_id)
      );
    // Execute query
    $db->query($q);
    // Set the ID for the new object
    $this->id = $db->getInsertID();
    // Return the id
    return $this->id;
  }
}
