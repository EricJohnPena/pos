<?php

class Products extends Model{
  protected $table = 'products';
  protected $allowed_columns = [
      'barcode',
      'user_id',
      'description',
      'quantity',
      'amount',
      'image',
      'date',
      'views',
    ];

  

public function validate($data)
{
  $errors = [];

 
    //check description
    if (empty($data['description'])) {
      $errors['description'] = 'Product description is required.';
    }

    
    //check quantity
$size = 4;
$max_size =$size * (1024 * 1024);

    if (empty($data['quantity'])) {
      $errors['quantity'] = 'Product quantity is required.';
    }

      //check amount
      if (empty($data['amount'])) {
        $errors['amount'] = 'Product amount is required.';
      }
  
       //check image
       if (empty($data['image'])) {
        $errors['image'] = 'Product image is required.';
      }else if (!($data['image']['type'] == "image/jpeg" || $data['image']['type'] == "image/png" || $data['image']['type'] == "image/jpg"))
      {
        $errors['image'] = 'Image format must be jpeg, png or jpg.';
      }else if ($data['image']['size'] > $max_size)
      {
        $errors['image'] = 'Image must be under 4 mb in size .';
      }
  

    
  

  return $errors;
}

public function generate_barcode(){
return rand(1000, 9999999999);

}

public function generate_filename($ext = "jpg"){

  return hash("sha1", rand(1000, 999999999))."_".rand(1000,9999).".".$ext;
}


}