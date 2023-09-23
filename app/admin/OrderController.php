<?php 
   session_start();
   include_once('../controller.php');
   $controller = new Controller();
   $orders = array (
      'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
      'user_id' => 'INT NOT NULL',
      'address' => 'VARCHAR(255)',
      'amount'    => 'FLOAT (10, 2)',
      'qty' => 'INT NOT NULL',
      'status'	=> 'BOOLEAN DEFAULT(0)',
      'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
      'updated_at' => 'TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
   );
   $controller->CreateTable('orders', $orders,',FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE NO ACTION');

   $totalAmount = 0;
   foreach($_SESSION['cart'] as $key => $item){
      $product = $controller->selectData('products','*' , array('id' => $key));
      $totalAmount+= $product[0]['sellingprice']*$item['qty'];
   }

   if(isset($_POST['placeOrderBtn'])){
      $address = $controller->mysqli_safe_string($_POST['address']);
      $city = $controller->mysqli_safe_string($_POST['city']);
      $pincode = $controller->mysqli_safe_string($_POST['pincode']);
      $payment_type = $controller->mysqli_safe_string($_POST['payment_type']);
      $payment_status = 'pending';
      if($payment_type == 'cod'):
         $payment_status = 'pending';
      endif;
      $total_amount = $totalAmount;
      $arrayData = array(
         'user_id' => $_SESSION['userId'], 
         'address' => $address, 
         'city' => $city,
         'pincode' => $pincode,
         'payment_type' => $payment_type,
         'payment_status' => $payment_status,
         'total_amount' => $total_amount,
      );
      if($address != null && $city != null && $pincode != null && $payment_type != null){
         $order = $controller->insertData('orders',$arrayData);
         if($order){
            foreach($_SESSION['cart'] as $key => $item){
               $product = $controller->selectData('products','*' , array('id' => $key));
               $amount = $product[0]['sellingprice'];
               $controller->insertData('order_details',array('order_id' => $order, 'product_id' =>$key, 'qty' => $item['qty'], 'amount' => $amount));
            }
            unset($_SESSION['cart']);
            $_SESSION['order-success'] = 'Your order have been placed successfully Thank You!';
            header('location:'.Controller::ViewPath('front/thankyou.php'));
            exit(0);
         }
      }else{
         $_SESSION['error'] = 'Please fill all required field !';
         $_SESSION['session'] = $arrayData;
         header('location:'.$_SERVER['HTTP_REFERER']);
         exit(0);
      }
   }
 ?>