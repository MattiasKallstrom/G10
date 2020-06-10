<?php
require('../src/dbconnect.php');
require('../src/config.php');
	
	  
      // chckingInfo($_POST);

 

$error = '';
 if (isset($_POST['logInBtn'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];


       
        $user = fetchUserByEmail($email);
		// chckingInfo($_POST);
       
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['first_name'];
            $_SESSION['id'] = $user['id'];
            // chcekingInfo($_SESSION['id']);
            redirectLocation('index.php');

        } else {
           
            $error = '<div class="alert alert-danger list-inline mx-auto col-md-3" role="alert">
  				      Incorrect login information. Please try again!
				      </div>';
        }
    }

		
 
$pageTitle='Sign In';
?>
	<?php include('../layout/header.php') ?>

<div class="container col-xl-12">
  

<form action="#" method="POST">
	


<!-- <div class="auth-content"> -->
<form action="#" method="POST">
  <h2 class="form-title d-flex justify-content-center mt-5">Sign In</h2>
   <?php echo $error;?>
 <div class="form-row justify-content-center">
    <div class="form-group col-md-3">
      <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3">
     <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password">
    <input type="submit" class="btn btn-primary" name="logInBtn" value="Sign In">
    </div>
</div>
    <p class="d-flex justify-content-center"><span class="mr-2">New User?</span>  <a href="sign-up.php"> Sign Up</a></p>
</form>
</div>


</div>











