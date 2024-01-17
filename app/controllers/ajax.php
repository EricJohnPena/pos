<?php 

defined("ABSPATH") ? "":die();

//capture ajax data
$raw_data = file_get_contents("php://input");
if(!empty($raw_data))
{

	$OBJ = json_decode($raw_data,true);
	if(is_array($OBJ))
	{
		if($OBJ['data_type'] == "search")
		{

			$productClass = new Products();
			$limit = 20;

			if(!empty($OBJ['text']))
			{
				//search
				$barcode = $OBJ['text'];
				$text = "%".$OBJ['text']."%";
				$query = "select * from products where description like :find || barcode = :barcode order by views desc limit $limit";
				$rows = $productClass->query($query,['find'=>$text,'barcode'=>$barcode]);

			}else{
				//get all
				//$limit = 10,$offset = 0,$order = "desc",$order_column = "id"
				$rows = $productClass->getAll($limit,0,'desc','views');
			}
			
			if($rows){

				foreach ($rows as $key => $row) {
					
					$rows[$key]['description'] = strtoupper($row['description']);
					$rows[$key]['image'] = $row['image'];
				}

				$info['data_type'] = "search";
				$info['data'] = $rows;
				
				echo json_encode($info);

			}

		}else
		if($OBJ['data_type'] == "checkout")
		{
echo $OBJ['data_type'];
			$data 		= $OBJ['text'];
			$receipt_no 	= get_receipt_no();
			$user_id 	= auth("id");
			$date 		= date("Y-m-d H:i:s");

			$db = new Database();

			//read from database
			foreach ($data as $row) {
				
				$arr = [];
				$arr['id'] = $row['id'];
				$query = "select * from products where id = :id limit 1";
				$check = $db->query($query,$arr);

				if(is_array($check))
				{
					$check = $check[0];

					//save to database
					$arr = [];
					$arr['barcode'] 	= $check['barcode'];
					$arr['description'] = $check['description'];
					$arr['amount'] 		= $check['amount'];
					$arr['quantity'] 		= $row['quantity'];
					$arr['total'] 		= $row['quantity'] * $check['amount'];
					$arr['receipt_no'] 	= $receipt_no;
					$arr['date'] 		= $date;
					$arr['user_id'] 	= $user_id;

					$query = "insert into sales (barcode,receipt_no,description,quantity,amount,total,date,user_id) values (:barcode,:receipt_no,:description,:quantity,:amount,:total,:date,:user_id)";
					$db->query($query,$arr);

					//add view count for this product
					$query = "update products set views = views + 1 where id = :id limit 1";
					$db->query($query,['id'=>$check['id']]);

					
				}

			}

			//barcode 	recipt_no 	description 	quantity 	amount 	total 	date 	user_id 

			$info['data_type'] = "checkout";
			$info['data'] = "items saved successfully!";
				
			echo json_encode($info);
		}

	}

}



