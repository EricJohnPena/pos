<?php


class Database
{

  private
  function connect()
  {
      // Database credentials and connection details
    $db = 'pos_db';
    $user = "root";
    $password = '';
    $driver = 'mysql';
    $host = 'localhost';


    try {
          // Attempt to create a PDO connection
      $con = new PDO("$driver:host=$host;dbname=$db", $user, $password);
    } catch (PDOException $e) {
          // Handle any PDO exceptions and display an error message
      echo $e->getMessage();
    }
      // Return the PDO connection object if successful, or false on failure
    return $con;
  }

  public function query($query, $data = array())
  {
    // Establish a database connection
    $con = $this->connect();
    // Prepare and execute the SQL query with the provided parameters
    $stmt = $con->prepare($query);
    $result = $stmt->execute($data);
    // Check if the query execution was successful
    if ($result) {
      // Fetch the result set as an associative array
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // Return the result set if it contains at least one row
      if (is_array($rows) && count($rows) > 0) {
        return $rows;
      }
    }
    // Return false if no results are found or if the query execution fails
    return false;
  }
};
