<?php
$tab = $_GET['tab'] ?? 'dashboard';


if ($tab == "products") {
  $productClass = new Products();
  $products = $productClass->query("select * from products order by id desc");
} else
if ($tab == "sales") {
	
	$section = $_GET['s'] ?? 'table';
	$startdate = $_GET['start'] ?? null;
	$enddate = $_GET['end'] ?? null;


	$saleClass = new Sale();
	
	$limit = $_GET['limit'] ?? 20;
	$limit = (int)$limit;
	$limit = $limit < 1 ? 10 : $limit;

	$pager = new Pager($limit);
	$offset = $pager->offset;

	$query = "select * from sales order by id desc limit $limit offset $offset";

	//get today's sales total
	$year = date("Y");
	$month = date("m");
	$day = date("d");

	$query_total = "SELECT sum(total) as total
	FROM sales
	WHERE date >= CURDATE();
	";

 		$styear = date("Y",strtotime($startdate));
 		$stmonth = date("m",strtotime($startdate));
 		$stday = date("d",strtotime($startdate));

		 $endyear = date("Y",strtotime($enddate));
 		$endmonth = date("m",strtotime($enddate));
 		$endday = date("d",strtotime($enddate));


	//if both start and end are set
 	if($startdate && $enddate)
 	{
 		
 		$query = "SELECT * FROM sales
		 WHERE date  BETWEEN '$styear-$stmonth-$stday 00:00:00' AND '$endyear-$endmonth-$endday 00:00:00'
		 ORDER BY id DESC
		 LIMIT $limit OFFSET $offset;
		 ";
 	
 	
 	}else

	//if only start date is set
 	if($startdate && !$enddate)
 	{

 		
 		$query = "SELECT * FROM sales WHERE day(date) = $stday && month(date) = $stmonth && year(date) = $styear order by id desc limit $limit offset $offset";
	}
	$sales = $saleClass->query($query);
	$st = $saleClass->query($query_total);
	
	$sales_total = 0;
	if($st){
		$sales_total = $st[0]['total'] ?? 0;
	}

	if($section == 'graph')
	{
		//read graph data
		$db = new Database();

		//query todays records
		$today = date('Y-m-d');
		$query = "SELECT total,date FROM sales WHERE DATE(date) = '$today' ";
		$today_records = $db->query($query);

		//query this months records
		$thismonth = date('m');
		$thisyear = date('Y');

		$query = "SELECT total,date FROM sales WHERE month(date) = '$thismonth' && year(date) = '$thisyear'";
		$thismonth_records = $db->query($query);

		//query this years records
		$query = "SELECT total,date FROM sales WHERE year(date) = '$thisyear'";
		$thisyear_records = $db->query($query);

	}

}else
if($tab == "users")
{

	$limit = 10;
	$pager = new Pager($limit);
	$offset = $pager->offset;

	$userClass = new User();
	$users = $userClass->query("select * from users order by id desc limit $limit offset $offset");
}else
if($tab == "dashboard")
{

	$db = new Database();
	$query = "select count(id) as total from users";

	$myusers = $db->query($query);
	$total_users = $myusers[0]['total'];

	$query = "select count(id) as total from products";

	$myproducts = $db->query($query);
	$total_products = $myproducts[0]['total'];

	$query = "select sum(total) as total from sales";

	$mysales = $db->query($query);
	$total_sales = $mysales[0]['total'];

	
}


if (Auth::access('admin')) {
  require viewsPath('admin/admin');
} else {
  Auth::setMessage("You don't have access to this page.");
  require viewsPath('auth/denied');
}
