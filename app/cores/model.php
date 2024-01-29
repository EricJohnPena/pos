<?php

class Model extends Database
{
  protected function get_allowed_columns($data)
  {
    if (!empty($this->allowed_columns)) {
      foreach ($data as $key => $value) {
        if (!in_array($key, $this->allowed_columns)) {
          unset($data[$key]);
        }
      }
    }
    return $data;
  }

  public function insert($data)
  {
    // Filter data based on allowed columns for the table
    $arr = $this->get_allowed_columns($data, $this->table);
    $keys = array_keys($arr);
    // Dynamically construct the SQL query for insertion
    $query = "INSERT INTO $this->table ";
    $query .= "(" . implode(",", $keys) . ") values ";
    $query .= "(" . implode(",", array_map(function ($key) {
      return ":$key";
    }, $keys)) . ")";

    try {
      // Execute the query using the Database class
      $db = new Database;
      $db->query($query, $arr);
    } catch (Exception $e) {
      // Handle any exceptions and display an error message
      echo "Error: " . $e->getMessage();
    }
  }

  public function update($id, $data)
  {
    // Filter data based on allowed columns for the table
    $arr = $this->get_allowed_columns($data, $this->table);
    $keys = array_keys($arr);

    // Dynamically construct the SQL query for update
    $query = "update $this->table set ";
    foreach ($keys as $column) {
      $query .= $column . " = :" . $column . ",";
    }
    $query = trim($query, ", ");
    $query .= " where id = :id";
    $arr['id'] = $id;

    // Execute the update query using the Database class
    $db = new Database;
    $db->query($query, $arr);
  }

  public function delete($id)
  {
    // Dynamically construct the SQL query for deletion
    $query = "delete from $this->table where id = :id limit 1 ";
    // Set the ID in the parameters array
    $arr['id'] = $id;
    // Execute the delete query using the Database class
    $db = new Database;
    $db->query($query, $arr);
  }

  public function where($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "id")
  {
    // Extract keys from the provided data for the WHERE clause
    $keys = array_keys($data);
    // Initialize the SELECT query with the specified table
    $query = "select * from $this->table where ";
    // Construct the WHERE clause based on the provided conditions
    foreach ($keys as $key) {

      $query .= "$key = :$key && ";
    }
    // Remove trailing "AND" from the WHERE clause
    $query = trim($query, "&& ");
    // Add ORDER BY, LIMIT, and OFFSET clauses to the query
    $query .= " order by $order_column $order limit $limit offset $offset";
    // Execute the query using the Database class and return the result
    $db = new Database;
    return $db->query($query, $data);
  }



  public function getAll($limit = 10, $offset = 0, $order = "desc", $order_column = "id")
  {
    // Construct the SELECT query with optional ORDER BY, LIMIT, and OFFSET clauses
    $query = "SELECT * FROM $this->table order by $order_column $order limit $limit offset $offset";
    // Execute the query using the Database class and return the result
    $db = new Database;
    return $db->query($query);
  }


  public function where_one($data)
  {
    // Extract keys from the provided data for the WHERE clause
    $keys = array_keys($data);
    // Initialize the SELECT query with the specified table
    $query = "SELECT * FROM $this->table WHERE ";
    // Construct the WHERE clause based on the provided conditions
    foreach ($keys as $key) {
      // Remove trailing "AND" from the WHERE clause
      $query .= "$key = :$key && ";
    }
    $query = trim($query, "&& ");
    // Execute the query using the Database class
    $db = new Database;

    if ($res = $db->query($query, $data)) {
      return $res['0'];
    }
    return false;
  }
}
