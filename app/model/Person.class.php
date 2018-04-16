<?php

class Person {
  const DB_TABLE = 'royalty'; // database table name

  // database fields for this table
  public $id = 0;
  public $first_name = '';
  public $last_name = '';
  public $file_name = null;
  public $info_small = null;
  public $info_large = null;
  public $quick_info = null;




  // return a Soldier object by ID
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

        $person = new Person(); // instantiate new Soldier object

        // store db results in local object
        $person->id           = $row['id'];
        $person->first_name   = $row['fname_ortitle'];
        $person->last_name    = $row['last_name'];
        $person->file_name    = $row['file_name'];
        $person->info_small   = $row['info_small'];
        $person->info_large   = $row['info_large'];
        $person->quick_info   = $row['quick_info'];

        return $person; // return the soldier
      }
  }
  

  // return all Soldiers as an array
  public static function getPerson() {
    $db = Db::instance();
    $q = "SELECT id FROM `".self::DB_TABLE."` ORDER BY id ASC;";
    $result = $db->query($q);

    $people = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        $people[] = self::loadById($row['id']);
      }
    }
    return $people;
  }

  public function save(){
    if($this->id == 0) {
      return $this->insert(); // soldier is new and needs to be created
    } else {
      return $this->update(); // soldier already exists and needs to be updated
    }
  }

  public function insert() {
    if($this->id != 0)
      return null; // can't insert something that already has an ID

    $db = Db::instance(); // connect to db
    // build query


    $q = sprintf("INSERT INTO `%s` (`fname_ortitle`, `last_name`, `info_small`, `info_large`)
    VALUES (%s, %s, %s, %s);",
      self::DB_TABLE,
      $db->escape($this->first_name),
      $db->escape($this->last_name),
      //$db->escape($this->file_name),
      $db->escape($this->info_small),
      $db->escape($this->info_large)
      );
    //echo $q;
    $db->query($q); // execute query
    $this->id = $db->getInsertID(); // set the ID for the new object
    return $this->id;
  }

  public function update() {
    if($this->id == 0)
      return null; // can't update something without an ID

    $db = Db::instance(); // connect to db


    // build query
    $q = sprintf("UPDATE `%s` SET
      `fname_ortitle` = %s,
      `last_name`  = %s,
      `file_name`  = %s,
      `info_small` = %s,
      `info_large` = %s,
      WHERE `id` = %d;",
      self::DB_TABLE,
      $db->escape($this->first_name),
      $db->escape($this->last_name),
      $db->escape($this->file_name),
      $db->escape($this->info_small),
      $db->escape($this->info_large),
      $db->escape($this->id)
      );
    $db->query($q); // execute query
    return $db->id; // return this object's ID
  }

}
