<?php

require('../../src/config.php');
require(SRC_PATH . 'dbconnect.php');
$first_name ='';
$last_name ='';
$email = '';
$phone = '';
$postal_code = '';
$street='';
$city = '';
$country = '';
$error = '';
$msg       = '';
if (isset($_POST['register'])) {
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$street = trim($_POST['street']);
$postal_code = trim($_POST['postal_code']);
$city = trim($_POST['city']);
$country = trim($_POST['country']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirmPassword']);
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
if ($password !== $confirmPassword) {
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
$msg = '<div class="success_msg">New User Created</div>';
} else {
$msg = '<div class="error_msg">"Invalid user name or password, Try again"!</div>';
}
}
}
?>
<?php require('include/navbar.php')?>
<body>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="#">
            <div class="modal-header">
                <a class="navbar-brand" href="manage member.php"  >To&nbsp;Manage<b>&nbsp;Member</b></a>
                <legend> CREATE NEW MEMBER
                    
                    <?=$msg?>
                </legend>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="first_name"   class="text-input"value="<?=htmlentities($first_name)?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="last_name"   class="text-input"value="<?=htmlentities($last_name)?>">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-10">
                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Email Adress"name="email"  class="text-input" value="<?=htmlentities($email)?>">
                            
                        </div></div>
                        
                        <div class="form-group col-md-10">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" >
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword"  class="text-input">
                            </div>
                        </div>
                    
                    
                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="phone"
                        value="<?=htmlentities($phone)?>">
                    </div>
                    
                        <div class="form-group col-md-4">
                            <label >City</label>
                            <input type="text" name="city" class="form-control"
                            value="<?=htmlentities($city)?>" placeholder="city">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Country</label>
                            <input type="text" name="country" class="form-control"
                            value="<?=htmlentities($country)?>" placeholder="country">
                        </div>
                    
                    
                    
                        <div class="form-group col-md-6">
                            <label >Street</label>
                            <input type="text" name="street" class="form-control"
                            value="<?=htmlentities($street)?>">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Postal Code</label>
                            <input type="text" name="postal_code" class="form-control"
                            value="<?=htmlentities($street)?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <button style= "float:right"type="submit" class="btn btn-success" name="register" value="Skapa">Create</button>
                    </div>
                   </div>

                </form>
            </div>
        </div>
    </body>
</html>