<?php

class QuickInfo {
  const DB_TABLE = 'quick_info'; // database table name

  // database fields for this table
  public $id = 0;
  public $details = null;
  public $personID = 0;

  // return a Life Event object by ID
  public static function loadById($id) {
      $db = Db::instance(); // create db connection
      // build query
      $q = sprintf("SELECT * FROM `%s` WHERE id = %d;",
        self::DB_TABLE,
        $id
        );
      $result = $db->query($q); // execute query
      // make sure we found something
      if($result->num_rows == 0) {
        return null;
      } else {
        $row = $result->fetch_assoc(); // get results as associative array

        $le = new QuickInfo(); // instantiate new Life Event object

        // store db results in local object
        $le->id           = $row['id'];
        $le->details      = $row['details'];
        $le->personID     = $row['personID'];

        return $le; // return the life event
      }
  }

  // return all life events attached to a soldier
  public static function getByPersonId($personID) {
    $db = Db::instance();
    $q = sprintf("SELECT le.id AS LifeEventID FROM `%s` le
      INNER JOIN `%s` s ON
      le.personID = s.id
      WHERE le.personID = %d
      ORDER BY le.personID ASC ",
      self::DB_TABLE,
      Person::DB_TABLE,
      $personID
      );
    //echo $q;
    $result = $db->query($q);

    $events = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        $events[] = self::loadById($row['LifeEventID']);
      }
    }
    return $events;
  }

  public function save(){
    if($this->id == 0) {
      return $this->insert(); // object is new and needs to be created
    } else {
      return $this->update(); // object already exists and needs to be updated
    }
  }

  public function insert() {
    if($this->id != 0)
      return null; // can't insert something that already has an ID

    $db = Db::instance(); // connect to db
    // build query
    $q = sprintf("INSERT INTO `%s` (`details`, `personID`)
    VALUES (%s, %d);",
      self::DB_TABLE,
      $db->escape($this->details),
      $db->escape($this->personID)
      );
    //echo $q;
    $db->query($q); // execute query
    $this->id = $db->getInsertID(); // set the ID for the new object
    return $this->id;
  }

  public function update() {

  }

}
