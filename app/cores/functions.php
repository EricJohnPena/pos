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

function redirect($page)
{

  header("Location: index.php?pg=" . $page);
  die;
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

function auth($column)
{
  if (!empty($_SESSION['USER'][$column])) {
    return $_SESSION['USER'][$column];
  }
  return 'Unknown';
}

function get_receipt_no()
{
	$num = 1;

	$db = new Database();
	$rows = $db->query("select receipt_no from sales order by id desc limit 1");

	if(is_array($rows))
	{
		$num = (int)$rows[0]['receipt_no'] + 1;
    var_dump($num);
	}

	return $num;
}

function get_date($date)
{
	return date("jS M, Y",strtotime($date));
}

function get_user_by_id($id)
{
	$user = new User();
	return $user->where_one(['id'=>$id]);
}

function generate_daily_data($records)
{
	$arr = [];

	for ($i=0; $i < 24; $i++) { 
		
		if(!isset($arr[$i])){
		
			$arr[$i] = 0;
		}

		foreach ($records as $row) {
			
			$hour = date('H',strtotime($row['date']));
			if($hour == $i){

				$arr[$i] += $row['total'];
			}
		}
	}

	return $arr;
	
}

function generate_monthly_data($records)
{
	$arr = [];
	$total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

	for ($i=1; $i <= $total_days; $i++) { 
		
		if(!isset($arr[$i])){
		
			$arr[$i] = 0;
		}

		foreach ($records as $row) {
			
			$day = date('d',strtotime($row['date']));
			if($day == $i){

				$arr[$i] += $row['total'];
			}
		}
	}

	return $arr;
}

function generate_yearly_data($records)
{
	$arr = [];
	$months = ['0','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

	for ($i=1; $i <= 12; $i++) { 
		
		if(!isset($arr[$months[$i]])){
		
			$arr[$months[$i]] = 0;
		}

		foreach ($records as $row) {
			
			$month = date('m',strtotime($row['date']));
			if($month == $i){

				$arr[$months[$i]] += $row['total'];
			}
		}
	}

	return $arr;

}