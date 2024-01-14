<?php

class Model extends Database
{
  protected function get_allowed_columns($data)
  {
  if(!empty($this->allowed_columns)){
      foreach ($data as $key => $value) {
        if (!in_array($key, $this->allowed_columns)) {
          unset($data[$key]);
        }
      } }
      return $data;
 
  }

  public function insert($data)
  {
    $arr = $this->get_allowed_columns($data, $this->table);
    $keys = array_keys($arr);
  
    $query = "INSERT INTO $this->table ";
    $query .= "(" . implode(",", $keys) . ") values ";
    $query .= "(" . implode(",", array_map(function ($key) {
      return ":$key";
    }, $keys)) . ")";
  
    try {
      $db = new Database;
      $db->query($query, $arr);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function where($data)
{

  $keys = array_keys($data);
  $query = "SELECT * FROM $this->table WHERE ";

  foreach ($keys as $key) {
    $query .= "$key = :$key && ";
  }
  $query = trim($query, "&& ");
  $db = new Database;
  
  return $db->query($query, $data);
}
}
