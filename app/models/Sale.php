<?php

class Sale extends Model{
  protected $table = 'sales';
  protected $allowed_columns = [
      'barcode',
      'receipt_no',
      'description',
      'quantity',
      'amount',
      'total',
      'date',
      'user_id',
    ];

  

public function validate($data,$id =null)
{
  $errors = [];

 
    //check description
    if (empty($data['description'])) {
      $errors['description'] = 'Sale description is required.';
    }

    
    //check quantity
$size = 4;
$max_size =$size * (1024 * 1024);
if(!$id || ($id && !empty($data['image']))){
  if (empty($data['quantity'])) {
      $errors['quantity'] = 'Sale quantity is required.';
    }

      //check amount
      if (empty($data['amount'])) {
        $errors['amount'] = 'Sale amount is required.';
      }
  
       //check image
       if (empty($data['image'])) {
        $errors['image'] = 'Sale image is required.';
      }else if (!($data['image']['type'] == "image/jpeg" || $data['image']['type'] == "image/png" || $data['image']['type'] == "image/jpg"))
      {
        $errors['image'] = 'Image format must be jpeg, png or jpg.';
      }else if ($data['image']['size'] > $max_size)
      {
        $errors['image'] = 'Image must be under 4 mb in size .';
      }
}
   
  return $errors;
}


}