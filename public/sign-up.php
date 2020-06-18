		<?php 
		require('../src/config.php');
		require('../src/dbconnect.php');
		$pageTitle='Join Us';

		$first_name ='';
		$last_name ='';
		$email = '';
		$phone = '';
		$postal_code = '';
		$street='';
		$city = '';
		$country = '';
		$error = '';
		$message='';
		if (isset($_POST['registerBtn'])) {
		$first_name = trim($_POST['first_name']);
		$last_name = trim($_POST['last_name']);
		$email = trim($_POST['email']);
		$phone = trim($_POST['phone']);
		$street = trim($_POST['street']);
		$postal_code = trim($_POST['postal_code']);
		$city = trim($_POST['city']);
		$country = trim($_POST['country']);
		$password = trim($_POST['password']);
		$confPassword = trim($_POST['confPassword']);
		if (empty($first_name)) {
		$error .= "<li>First Name is requierd!</li>";
		}
		if (empty($last_name)) {
		$error .= "<li>Last Name is requierd!</li>";
		}

		if (empty($email)) {
		$error .= "<li>Email is requierd!</li>";
		}
		if (empty($phone)) {
				 $error .= "<li>Phone is requierd!</li>";
			}
		if (empty($street)) {
				 $error .= "<li>Street is requierd!</li>";
			}
		if (empty($postal_code)) {
				 $error .= "<li>Postal Code is requierd!</li>";
			}

		if (empty($city)) {
				 $error .= "<li>City is requierd!</li>";
			}
		if (empty($country)) {
				 $error .= "<li>Country is requierd!</li>";
			}
		if (empty($password)) {
		$error .= "<li>Password is requierd!</li>";
		if (empty($confPassword)) {
		$error .= "<li>Confirm Password is requierd!</li>";
		}
		}
		if (!empty($password) && strlen($password) < 6) {
		$error .= "<li>Password can't be less than six charactares!</li>";
		}
		if ($password !== $confPassword) {
		$error .= "<li>Password doesn't match!</li>";

		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error .= "<li>Invalid email</li>";
		}

		if ($error) {
		$error = "<ul class='alert alert-danger list-inline mx-auto  col-md-8 '>{$error}</ul>";
		}   if (empty($error)) {
			$userData = [
		'first_name' => $first_name,
		'last_name' => $last_name,
		'email'    => $email,
		'password' => $password,
		'phone'    => $phone,
		'street' => $street,
		'postal_code'    => $postal_code,
		'city' => $city,
		'country' => $country,
		];
		$result = addUser($userData);

		if ($result) {
	
		$message=
		'<div class="alert alert-success list-inline mx-auto col-md-8" role="alert">
 			You have registered successfully!
			</div>';

		}else{
		
		$message = '<div class="alert alert-danger list-inline mx-auto col-md-8 " role="alert">
  				      Registration failed. Please try again later!
				      </div>';


		
}

		
		}
		}
		?>






	<?php include('../layout/header.php') ?>
<div class="container col-xl-12">
	<div class="form-row justify-content-center">
    <div class="form-group col-md-8">
		<h2 class="form-title d-flex justify-content-center mt-5">Sign Up</h2>
		
	</div>
</div>
<form action="#" method="POST" >
	<?php echo $error;?>
	<?php echo $message;?>

  <div class="form-row justify-content-center">
    <div class="form-group col-md-4">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first_name" class="form-control" id="inputEmail4" 
      value="<?=htmlentities($first_name)?>" placeholder="John" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Last Name</label>
      <input type="text" name="last_name" class="form-control" id="inputPassword4" 
      value="<?=htmlentities($last_name)?>" placeholder="Doe">
    </div>
</div>
<div class="form-row justify-content-center">
  <div class="form-group col-md-4">
    <label for="inputAddress">Email</label>
    <input type="text" name="email" class="form-control" id="inputAddress" placeholder="example@domain.com" 
    value="<?=htmlentities($email)?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Phone</label>
    <input type="tel" name="phone" class="form-control" id="inputAddress2" placeholder="0700-00-00-00" 
    value="<?=htmlentities($phone)?>">
  </div>
</div>

  <div class="form-row justify-content-center">
<div class="form-group col-md-4">
      <label for="inputEmail4">Password</label>
      <input type="password" name="password" class="form-control"  >
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" name="confPassword" class="form-control">
    </div>
  </div>

<div class="form-row justify-content-center">
<div class="form-group col-md-4">
      <label for="inputEmail4">City</label>
      <input type="text" name="city" class="form-control" id="inputEmail4" 
      value="<?=htmlentities($city)?>" placeholder="Stockholm">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Country</label>
      <input type="text" name="country" class="form-control" id="inputPassword4" 
      value="<?=htmlentities($country)?>" placeholder="Stockholm">
    </div>
  </div>

	
  <div class="form-row justify-content-center">
    <div class="form-group col-md-4">
      <label for="inputCity">Street</label>
      <input type="text" name="street" class="form-control" id="inputCity" 
      value="<?=htmlentities($street)?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputZip">Postal Code</label>
      <input type="text" name="postal_code" class="form-control" id="inputZip" 
      value="<?=htmlentities($street)?>">
    </div>
  </div>
 <div class="form-row justify-content-center">
    <div class="form-group col-md-8">
    	<input type="submit" name="registerBtn" class=" btn btn-primary" value="Sign Up">
  
</div>
</div>

  
  
  	  
  
</div>
<p class="d-flex justify-content-center"><span class="mr-2">Already User?</span>  <a href="../public/sign-in.php"> Sign In</a></p>
</form>

	
</div>















