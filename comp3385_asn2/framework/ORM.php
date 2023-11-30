<?php
//object relational mapping

namespace framework;
use AllowDynamicProperties;
use PDO;
#[AllowDynamicProperties] class ORM
{

  //data object
  private $data = [];
  public function __construct($host, $dbname, $username, $password)
  {
    //create PDO connection
    try {
      $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  //find all records in a table
  public function findAll($table)
  {
    //prepare and execute query
    $query = $this->db->prepare("SELECT * FROM $table");
    //bing id to query
    $query->bindParam(':id', $id);

    //run query
    $query->execute();

    //return result
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  //save data to a table
  public function save($table, $data)
  {
    //extract keys from data array
    $columns = implode(', ', array_keys($data));

    //create placeholders for values
    $placeholders = ':' . implode(', :', array_keys($data));

    //query string
    $query = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");

    //bind values to query
    foreach ($data as $key => $value) {
      $query->bindValue(":$key", $value);
    }

    return $query->execute();
  }

  //find username and password pair in a table
  public function findUser($table, $email, $password)
  {
    //echo "$email $password <br>";
    //hash password
    //$hashedPass = password_hash($password, PASSWORD_DEFAULT);
    //echo $password . '<br>';
    //prepare and execute query
    $query = $this->db->prepare("SELECT * FROM $table WHERE email = :email");
    //bing id to query
    $query->bindParam(':email', $email);
    // $query->bindParam(':password', $password);

    //run query
    $query->execute();

    //var_dump($query->rowCount());
    //if no result, return false
    if (!$query->rowCount()) {
      return false;
    }
    //check password
    $user = $query->fetch(PDO::FETCH_ASSOC);
    //echo $user['password'] . '<br>';
    if (password_verify($password, $user['password'])) {
      return $user;
    } else {
      return false;
    }

  }

  // Additional CRUD methods if only there was time

}
