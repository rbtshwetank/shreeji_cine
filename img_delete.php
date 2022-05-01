<?php


session_start();
if($_SESSION['Active'] == false){
    header("location:admin_login.php");
      exit;
  }
require_once ('config.php'); 


if(isset($_POST['id']) && $_POST['id'] > 0 && !empty($_POST['id']) )
{
     $single_prod_data = $mysqli->query("select * from images where imdid = '".$_POST['id']."' limit 1  ");


     if ($single_prod_data->num_rows == 1) 
     {
               $single_row = $single_prod_data->fetch_assoc();

               $mul_img = json_decode($single_row['images'],true);
               if (!empty($mul_img) && is_array($mul_img)) 
               {
                    foreach ($mul_img as $key => $mul_img) 
                    {
                         $mul_image_url = 'img/back_images/'.$mul_img;
                         if (file_exists($mul_image_url)) 
                         {
                              unlink($mul_image_url);
                         }
                    }
                } 

                mysqli_query($mysqli," DELETE FROM images WHERE imdid = '".$_POST['id']."' limit 1    ");  
                $TargetURL = 'upload_images.php'; 
                $msg = "Image Deleted Sucessfully ";
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