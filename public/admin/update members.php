<?php
 
require('../../src/config.php');
require(SRC_PATH . 'dbconnect.php');
$first_name ='';
$last_name ='';
$email     = '';
$phone = '';
$postal_code = '';
$street='';
$city = '';
$country = '';
$error     = '';
$msg       = '';
if (isset($_POST['register'])) {
$first_name        = trim($_POST['first_name']);
$last_name        = trim($_POST['last_name']);
$email           = trim($_POST['email']);
$phone = trim($_POST['phone']);
$street = trim($_POST['street']);
$postal_code = trim($_POST['postal_code']);
$city = trim($_POST['city']);
$country = trim($_POST['country']);
$password        = trim($_POST['password']);
$confirmPassword = trim($_POST['confirmPassword']);
if (empty($first_name)) {
$error .= "<li>first_name is required</li>";
}
if (empty($last_name)) {
$error .= "<li>lasst_name is required</li>";
}
if (empty($email)) {
$error .= "<li>Email is required</li>";
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
$error .= "<li>password is required</li>";
}
if (!empty($password) && strlen($password) < 6) {
$error .= "<li>
The password must not be less than 6 characters long</li>";
}
if ($confirmPassword !== $password) {
$error .= "<li>
The confirmed password does not match</li>";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error .= "<li>
Invalid email</li>";
}
if ($error) {
$msg = "<ul class='error_msg'>{$error}</ul>";
}
if ($error) {
$msg = "<ul class='error_msg'>{$error}</ul>";
}
if (empty($error)) {
$userData = [
'first_name' => $first_name,
'last_name' => $last_name,
'password' => $password,
'email'    => $email,
'password' => $password,
'phone'    => $phone,
'street' => $street,
'postal_code'    => $postal_code,
'city' => $city,
'country' => $country,
'id'       => $_GET['id'],
];
  $result = updateUser($userData);
if ($result) {
$msg = '<div class="success_msg">
User Updated</div>';
} else {
$msg = '<div class="error_msg">Uppdateringen av användaren misslyckades. Var snäll och försök igen senare!</div>';
}
}
}

$user = fetchUserById($_GET['id']);
?>
<?php require('include/navbar.php')?>
<body>
<div class="modal-dialog">
<div class="modal-content">
    <form method="POST" action="#">
        <div class="modal-header">
            <a class="navbar-brand" href="manage member.php"  >To &nbsp;Manage&nbsp;<b>Member</b></a>
            <legend> UPDATE MEMBER
                
                <?=$msg?>
            </legend>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="input1" >First_name:</label> <br>
                        
                        <input type="text"  class="form-control"name="first_name" value="<?=htmlentities($user['first_name'])?>">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="input1" >last_name:</label> <br>
                        
                        <input type="text"  class="form-control"name="last_name" value="<?=htmlentities($user['last_name'])?>">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <div class="form-group">
                        <label for="input2">Email:</label> <br>
                        <input type="text"  class="form-control" name="email" value="<?=htmlentities($user['email'])?>">
                    </div>
                    <div class="form-group">
                        <label for="input2">Password:</label> <br>
                        <input type="password"  class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label >Confirm Password:</label> <br>
                        <input type="password"  class="form-control" name="confirmPassword">
                    </div>
              </div>
                
                <div class="form-group col-md-4">
                    <label >Phone</label>
                    <input type="tel" name="phone" class="form-control" placeholder="phone"
                    value="<?=htmlentities($phone)?>">
                </div>
               
                    <div class="form-group col-md-4">
                        <label >City</label>
                        <input type="text" name="city" class="form-control"
                        value="<?=htmlentities($city)?>" placeholder="Stockholm">
                    </div>
                    <div class="form-group col-md-4">
                        <label >Country</label>
                        <input type="text" name="country" class="form-control"
                        value="<?=htmlentities($country)?>" placeholder="Stockholm">
                    </div>
                
                
               
                    <div class="form-group col-md-6">
                        <label>Street</label>
                        <input type="text" name="street" class="form-control"
                        value="<?=htmlentities($street)?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="input">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control"
                        value="<?=htmlentities($street)?>">
                    </div>
               
           
            <div class="form-group">
                <button type="submit" style="float:right"class="btn btn-info " name="register" value="update">UPDATE</button>
            </div>
        </div>
</div>
    </form>
    
</div>
</div>
</body>
</html>