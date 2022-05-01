<?php

session_start();
if($_SESSION['Active'] == false){
    header("location:admin_login.php");
      exit;
  }
require_once ('config.php'); 

  if(isset($_POST['submit']))
  {
  	if($_POST['name'] == '')
  	{
  		$msg = "Please Enter Product Name ";
  		$msgclass = 'bg-danger';
  	}
  	elseif($_POST['price'] < 0)
  	{
  		$msg = "Price Is Required ";
  		$msgclass = 'bg-danger';
  	}
  	elseif(empty($_POST['detail']) )
  	{
  		$msg = "Detail Is Required ";
  		$msgclass = 'bg-danger';
  	}
  	else
  	{
  		$name         = clean($_POST['name']);
  		$price        = clean($_POST['price']);
  		$detail        = clean($_POST['detail']);

  		if ($_POST['opt'] == 'edit') 
  		{

  			$single_prod_data = $mysqli->query("select proid, name,price,detail,single_img,AddedOn,mul_img from products where proid = '".$_POST['proid']."' limit 1  ");

  			if ($single_prod_data->num_rows == 1) 
  			{
  				$single_row = $single_prod_data->fetch_assoc();

  				if (!empty($_FILES['single_img']['name']) && is_array($_FILES['single_img'])) 
  				{
  					 $image_url = 'img/products/backend_img/'.$single_row['single_img'];
  					if (file_exists($image_url)) 
  					{
  						unlink($image_url);
  					}

  					$image_name   = time().'_'.$_FILES['single_img']['name'];
  					$location     = "img/products/backend_img/".$image_name;
  					$image        = $_FILES['single_img']['tmp_name'];
  					move_uploaded_file($image, $location);
  					mysqli_query($mysqli," UPDATE products SET single_img = '".$image_name ."' where proid = '".$single_row['proid']."' limit 1     ");

  				}

  				if (!empty($_FILES['mul_img']['name'][0]) && is_array($_FILES['mul_img'])) 
  				{
  					$mul_img = json_decode($single_row['mul_img'],true);
  					$image_names =[];
  					if (!empty($mul_img) && is_array($mul_img)) {
  						foreach ($mul_img as $key => $mul_img) 
  						{
  							$mul_image_url = 'img/products/backend_img/'.$mul_img;
  							if (file_exists($mul_image_url)) {
  								unlink($mul_image_url);
  							}
  						}

  						foreach ($_FILES['mul_img']['tmp_name'] as $key => $image) {
  							$uploadFolder      = "img/products/backend_img/";
  							$imageTmpName = $_FILES['mul_img']['tmp_name'][$key];
  							$imageName = time().'_'.$_FILES['mul_img']['name'][$key];
  							$image_names[] = $imageName ;
  							move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
  						}
  						mysqli_query($mysqli," UPDATE products SET mul_img = '".json_encode($image_names,true) ."' where proid = '".$single_row['proid']."' limit 1     ");

  					}
  				}

  				$query = "UPDATE products SET name = '".$name ."' , price = '".$price ."', detail = '".$detail ."'  where proid = '".$single_row['proid']."' limit 1   ";

  					$result = mysqli_query($mysqli,$query);

  					
  						$msg = "Product Updated Sucessfully ";
  						header("Location:dash_product.php");
  					
  			}
  			else
  			{
  				$msg = "Sorry this record not exist in our record";
  				$msgclass = 'bg-danger';
  			}


  		}
  		else
  		{
  			$image_name   = time().'_'.$_FILES['single_img']['name'];
  			$location     = "img/products/backend_img/".$image_name;
  			$image        = $_FILES['single_img']['tmp_name'];
  			move_uploaded_file($image, $location);
  			$image_names =[];
  			foreach ($_FILES['mul_img']['tmp_name'] as $key => $image) {
  				$uploadFolder      = "img/products/backend_img/";
  				$imageTmpName = $_FILES['mul_img']['tmp_name'][$key];
  				$imageName = time().'_'.$_FILES['mul_img']['name'][$key];
  				$image_names[] = $imageName ;
  				move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
  			}

  			$query = "INSERT INTO products (name,price,detail,single_img,mul_img,AddedOn,AddedBy) VALUES ('".escape($name)."', '".escape($price)."','".escape($detail)."' , '$image_name','".json_encode($image_names,true)."','".date('Y-m-d H:i:s',time())."',4)";

  				$result = mysqli_query($mysqli,$query);

  				if($result == true)
  				{
  					$msg = "Product Added Sucessfully ";
  					header("Location:dash_product.php");
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