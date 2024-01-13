<?php


class Database{

 private
  function connect()
  {
    $db = 'pos_db';
    $user = "root";
    $password = '';
    $driver = 'mysql';
    $host = 'localhost';
  
  
    try {
      $con = new PDO("$driver:host=$host;dbname=$db", $user, $password);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $con;
  }

  public function query($query, $data = array())
{

  $con = $this->connect();
  $stmt = $con->prepare($query);
  $result = $stmt->execute($data);

  if ($result) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (is_array($rows) && count($rows) > 0) {
      return $rows;
    }
  }
  return false;
}

};

