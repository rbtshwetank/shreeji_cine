<?php


session_start();
if($_SESSION['Active'] == false){
    header("location:admin_login.php");
      exit;
  }
require_once ('config.php'); 


if(isset($_POST['id']) && $_POST['id'] > 0 && !empty($_POST['id']) )
{
     $single_prod_data = $mysqli->query("select proid,single_img,mul_img from products where proid = '".$_POST['id']."' limit 1  ");


     if ($single_prod_data->num_rows == 1) 
     {
               $single_row = $single_prod_data->fetch_assoc();
               $image_url = 'img/products/backend_img/'.$single_row['single_img'];

               if (file_exists($image_url)) 
               {
                    unlink($image_url);
               }

               $mul_img = json_decode($single_row['mul_img'],true);
               if (!empty($mul_img) && is_array($mul_img)) 
               {
                    foreach ($mul_img as $key => $mul_img) 
                    {
                         $mul_image_url = 'img/products/backend_img/'.$mul_img;
                         if (file_exists($mul_image_url)) 
                         {
                              unlink($mul_image_url);
                         }
                    }
                } 

                mysqli_query($mysqli," DELETE FROM products WHERE proid = '".$_POST['id']."' limit 1    ");  
                $TargetURL = 'dash_product.php'; 
                $msg = "Product Deleted Sucessfully ";
     }         
     else
     {
          $msg = "Sorry this record not exist in our record";
          $msgclass = 'bg-danger';
     }
}
else
{
     $msg = "Please Try Again Later";
     $msgclass = 'bg-danger';
}

    echo json_encode(array('msg' => $msg, 'msgsuc' => $msgclass, 'msgfail' => $msgclass, "TargetURL" => $TargetURL));


?>