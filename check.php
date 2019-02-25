<?php
public function orderProduct($id){
      $session_id = session_id();
      $query = "SELECT * FROM tbl_cart where session_id='$session_id'";      
      $result = $this->db->select($query);
       
       if ($result) {
         while ($data = $result->fetch_assoc()){
               $productId = $data['product_id'];
               $productName = $data['product_name'];
               $quantity = $data['quantity'];
               $price = $data['price'];
               $image = $data['image'];

          $query = "INSERT INTO 
                 tbl_order(session_id,productId,productName,quantity,price,image) 
                 VALUES('$id','$productId','$productName','$quantity','$price','$image')";

               $inserted_rows = $this->db->insert($query);
            }
             if ($inserted_rows) {
                    $msg =  "<script> alert('Your order has done successfully'); </script>"; 
                    return $msg;
                   } 
                   else{
                     $msg= "<span style='color:red; font-size:18px;'>Sorry try again </span>";
                      return $msg;
                   }
       }
   }