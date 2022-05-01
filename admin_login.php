<?php 
  ob_start();
session_start();
include 'header.php';
require_once ('config.php'); 
if($_SESSION['Active'] == true){
    header("location:dash_product.php");
      exit;
  }
?>
<section class="page-header page-header-classic page-header-sm">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<span class="page-header-title-border visible" style="width: 131.859px;"></span><h1 data-title-border="">Admin Login</h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end">
									<li><a href="#">Home</a></li>
									<li class="active">Admin Login</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

                <div class="container py-4">

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
        <?php
        if(isset($_POST['Submit'])){
             $pass = sha1($_POST['Password']);
            $result = $mysqli->query("select uid, username,password from user where username = '".$_POST['Username']."' and password = '".$pass."' limit 1 ");
            if($result->num_rows == 1 ) {
                $row = $result->fetch_assoc();
                $_SESSION['Username'] = $row['username'];
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['Active'] = true;
                $redirect_url = $base_url.'/dash_product.php'; 
                 header("Location:".$redirect_url);
                exit;
            } else {
                ?>
                &nbsp;
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Incorrect information.
                </div>
                <?php
            }
        }
        ?>
        <h2 class="font-weight-bold text-5 mb-0">Admin Login</h2>
        <form action="" id="frmSignIn" method="post" name="Login_Form" class="needs-validation" novalidate="novalidate">
            <div class="row">
                <div class="form-group col">
                    <label class="form-label text-color-dark text-3">Username <span class="text-color-danger">*</span></label>
                    <input type="text" value="" name="Username" class="form-control form-control-lg text-4" required="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
                    <input type="password" value="" name="Password" class="form-control form-control-lg text-4" required="">
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="form-group col-md-auto">
                    <!-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
                    </div> -->
                </div>
                <!-- <div class="form-group col-md-auto">
                    <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Forgot Password?</a>
                </div> -->
            </div>
            <div class="row">
                <div class="form-group col">
  <!--                   <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button> -->
                    <input type="Submit" name="Submit" value="Login" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading..." />
                    <!-- <div class="divider">
                        <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
                    </div> -->
                 <!--    <a href="dash_product.php" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Check the Dashboard</a> -->
                </div>
            </div>
        </form>


    </div>

</div>

</div>

<?php include 'footer.php';?>