<?php

class Follower {
  const DB_TABLE = 'followers'; // database table name

  // database fields for this table
  public $id = 0;
  public $follower = '';
  public $followee = '';

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

        $user = new Follower();

        // store db results in local object
        $user->id         = $row['id'];
        $user->follower   = $row['follower'];
        $user->followee   = $row['followee'];

        return $user; // return the soldier
      }
  }

  //returns an array of all the followers
  public static function getByFollower($follower) {
    $db = Db::instance();
    $q = sprintf("SELECT id FROM `%s` WHERE follower = '%s'
      GROUP BY CONCAT(follower, followee)
      ORDER BY followee ASC;",
      self::DB_TABLE,
      $follower
    );
    //echo $q;
    $result = $db->query($q);

    $followers = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        //echo $q;
        //echo $row['id'];
        $followers[] = self::loadById($row['id']);
      }
    }
    return $followers;
  }

  public static function delete($fr, $fe) {
    $db = Db::instance(); // connect to db
    // build query
    $q = sprintf("DELETE FROM `%s` WHERE `follower` = '%s' AND `followee` = '%s';",
      self::DB_TABLE,
      $fr,
      $fe
    );
    $db->query($q); // execute query
  }
  
  //returns an array of all the followers
  public static function getByFollowee($followee) {
    $db = Db::instance();
    $q = sprintf("SELECT id FROM `%s` WHERE followee = '%s'
      GROUP BY CONCAT(follower, followee)
      ORDER BY follower ASC;",
      self::DB_TABLE,
      $followee
    );
    //echo $q;
    $result = $db->query($q);

    $followees = array();
    if($result->num_rows != 0) {
      while($row = $result->fetch_assoc()) {
        $followees[] = self::loadById($row['id']);
      }
    }
    return $followees;
  }


  public static function loadByUsername($username) {
      $db = Db::instance(); // create db connection
      // build query
      $q = sprintf("SELECT * FROM `%s` WHERE username = '%s';",
        self::DB_TABLE,
        $username
        );
      $result = $db->query($q); // execute query
      // make sure we found something
      if($result->num_rows == 0) {
        return null;
      } else {
        $row = $result->fetch_assoc(); // get results as associative array

        $user = new Follower(); // instantiate new Soldier object

        // store db results in local object
        $user->id         = $row['id'];
        $user->follower   = $row['follower'];
        $user->followee   = $row['followee'];

        return $user; // return the soldier
      }
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


    $q = sprintf("INSERT INTO `%s` (`follower`, `followee`)
    VALUES (%s, %s);",
      self::DB_TABLE,
      $db->escape($this->follower),
      $db->escape($this->followee)
      );
    echo $q;
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
      `password`  = %s,
      `email`  = %s,
      `firstName` = %s,
      `lastName` = %s,
      `birthday` = %s,
      `role` = %s,
      WHERE `username` = %s;",
      self::DB_TABLE,
      $db->escape($this->password),
      $db->escape($this->email),
      $db->escape($this->firstName),
      $db->escape($this->lastName),
      $db->escape($this->birthday),
      $db->escape($this->role),
      $db->escape($this->username)
      );
    $db->query($q); // execute query
    return $db->id; // return this object's ID

  }

}
