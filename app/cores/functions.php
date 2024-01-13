<?php

function show($data)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}

function viewsPath($view)
{

  if (file_exists("../app/views/$view.view.php")) {
    return "../app/views/$view.view.php";
  } else {
    echo "view '$view' does not exist";
  };
};


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
};

function redirect($page)
{

  header("Location: index.php?pg=" . $page);
  die;
};

function query($query, $data = array())
{

  $con = connect();
  $stmt = $con->prepare($query);
  $result = $stmt->execute($data);

  if ($result) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (is_array($rows) && count($rows) > 0) {
      return $rows;
    }
  }
  return false;
};

function allowed_columns($data, $table)
{

  if ($table == 'users') {
    $columns = [
      'username',
      'email',
      'password',
      'role',
      'image',
      'date',
    ];

    foreach ($data as $key => $value) {
      if (!in_array($key, $columns)) {
        unset($data[$key]);
      }
    }
    return $data;
  }
};

function insert($data, $table)
{
  $arr = allowed_columns($data, $table);
  $keys = array_keys($arr);

  $query = "INSERT INTO $table ";
  $query .= "(" . implode(",", $keys) . ") values ";
  $query .= "(" . implode(",", array_map(function ($key) {
    return ":$key";
  }, $keys)) . ")";

  try {
    query($query, $arr);
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
}


function validate($data, $table)
{
  $errors = [];

  if ($table == 'users') {
    //check username
    if (empty($data['username'])) {
      $errors['username'] = 'Username is required.';
    }

    //check username
    if (empty($data['email'])) {
      $errors['email'] = 'Email is required.';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Invalid Email';
    }

    //check password
    if (empty($data['password'])) {
      $errors['password'] = 'Password is required.';
    } else if ($data['password'] !== $data['repassword']) {
      $errors['repassword'] = 'Passwords do not match. Please try again.';
    } else if (strlen($data['password']) < 8) {
      $errors['password'] = 'Your password must be at least 8 characters long.';
    }
  }

  return $errors;
};

function setValue($key, $default = "")
{
  if (!empty($_POST[$key])) {
    return $_POST[$key];
  }
  return $default;
};

function authenticate($row)
{
  $_SESSION['USER'] = $row;
};

function where($data, $table)
{
 
  $keys = array_keys($data);
$query = "SELECT * FROM $table WHERE ";

  foreach ($keys as $key){
    $query .= "$key = :$key && ";
  }
  $query = trim($query,"&& ");
  return query($query,$data);


}