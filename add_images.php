<?php

session_start();
if($_SESSION['Active'] == false){
    header("location:admin_login.php");
      exit;
  }
require_once ('config.php'); 

  if(isset($_POST['submit']))
  {
  	if($_POST['type'] == '')
  	{
  		$msg = "Please Select Type ";
  		$msgclass = 'bg-danger';
  	}
  	else
  	{

      if ($_POST['opt'] == 'edit') {

        $single_prod_data = $mysqli->query("select imdid, type,images from images where imdid = '".$_POST['imdid']."' limit 1  ");

        if ($single_prod_data->num_rows == 1) 
        {
          $single_row = $single_prod_data->fetch_assoc();

            if (!empty($_FILES['images']['name'][0]) && is_array($_FILES['images'])) 
            {
              $mul_img = json_decode($single_row['images'],true);
              $image_names =[];
              if (!empty($mul_img) && is_array($mul_img)) {
                foreach ($mul_img as $key => $mul_img) 
                {
                  $mul_image_url = 'img/back_images/'.$mul_img;
                  if (file_exists($mul_image_url)) {
                    unlink($mul_image_url);
                  }
                }

                foreach ($_FILES['images']['tmp_name'] as $key => $image) {
                  $uploadFolder      = "img/back_images/";
                  $imageTmpName = $_FILES['images']['tmp_name'][$key];
                  $imageName = time().'_'.$_FILES['images']['name'][$key];
                  $image_names[] = $imageName ;
                  move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
                }
                mysqli_query($mysqli," UPDATE images SET images = '".json_encode($image_names,true) ."' where imdid = '".$single_row['imdid']."' limit 1     ");

              }
            }

            if (!empty($_POST['type'])) {
              mysqli_query($mysqli," UPDATE images SET type = '".$_POST['type'] ."' where imdid = '".$single_row['imdid']."' limit 1     ");
            }

              $msg = "Image Updated Sucessfully ";
              header("Location:upload_images.php");
        }
        else
        {
          $msg = "Sorry this record not exist in our record";
          $msgclass = 'bg-danger';
        }


      } else {
        $type         = clean($_POST['type']);
        $image_names =[];
        foreach ($_FILES['images']['tmp_name'] as $key => $image) {
          $uploadFolder      = "img/back_images/";
          $imageTmpName = $_FILES['images']['tmp_name'][$key];
          $imageName = time().'_'.$_FILES['images']['name'][$key];
          $image_names[] = $imageName ;
          move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
        }

        $query = "INSERT INTO images (type,images,AddedOn) VALUES ('".escape($type)."','".json_encode($image_names,true)."','".date('Y-m-d H:i:s',time())."')";

          $result = mysqli_query($mysqli,$query);

          if($result == true)
          {
            $msg = "Images Added Sucessfully ";
            header("Location:upload_images.php");
          }
          else
          {
            $msg =mysqli_error($mysqli);
            $msgclass = 'bg-danger';
          }
      }
      
  	}
  	echo $msg ;
  }

 ?>