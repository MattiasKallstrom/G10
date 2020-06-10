<?php
require('../src/dbconnect.php');
require('../src/config.php');  
// chcekingInfo($_POST);
// exit();


if (isset($_POST['createOrderBtn'])) {

	$firstName  =  trim($_POST['firstName']);
    $lastName   =  trim($_POST['lastName']);
    $email      =  trim($_POST['email']);		
    $password   =  trim($_POST['password']);
    $phone   =  trim($_POST['phone']);
    $street     =  trim($_POST['street']);
    $city       =  trim($_POST['city']);
    $country    =  trim($_POST['country']);
    $postalCode =  trim($_POST['postalCode']);
    $totalPrice =  trim($_POST['totalPrice']);


// Check if the user already exist in our db
try {
		$query = " SELECT  * FROM users
				   WHERE email = :email
		 ";
		 $stmt = $dbconnect->prepare($query);
		 $stmt-> bindValue(':email', $email);
		 $stmt-> execute();
		 $user = $stmt->fetch(); 
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(),(int) $e->getCode());
		
	}
	if ($user) {
		$userId = $user['id'];

	} else { //else create new user, and fetch newly created userId 
try {
		$query = " INSERT INTO users (first_name,last_name,email,password,phone,street,postal_code,city,country)
		VALUES(:firstName,:lastName,:email,:password,:phone,:street,:postalCode,:city,:country);
		 ";
		 $stmt = $dbconnect->prepare($query);
		 $stmt-> bindValue(':firstName', $firstName);
		 $stmt-> bindValue(':lastName', $lastName);
		 $stmt-> bindValue(':email', $email);
		 $stmt-> bindValue(':password', $password);
		 $stmt-> bindValue(':phone', $phone);
		 $stmt-> bindValue(':street', $street);
		 $stmt-> bindValue(':city', $city);
		 $stmt-> bindValue(':country', $country);
		 $stmt-> bindValue(':postalCode', $postalCode);
		 $stmt-> execute();
		 $userId = $dbconnect->lastInsertId();
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(),(int) $e->getCode());
		
	}
}

	// create data in orders-tabel

	try {
		$query = " INSERT INTO orders (user_id,total_price,billing_full_name,billing_street,
		billing_postal_code,billing_city,billing_country)

		VALUES(:userId,:totalPrice,:fullName,:street,:city,:postalCode,:country);
		 ";
		 $stmt = $dbconnect->prepare($query);
		 $stmt-> bindValue(':userId', $userId);
		 $stmt-> bindValue(':totalPrice', $totalPrice);
		 $stmt-> bindValue(':fullName', "{$firstName} {$lastName}");
		 $stmt-> bindValue(':street', $street);
		 $stmt-> bindValue(':city', $city);
		 $stmt-> bindValue(':country', $country);
		 $stmt-> bindValue(':postalCode', $postalCode);
		 $stmt-> execute();
		 $orderId = $dbconnect->lastInsertId();
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(),(int) $e->getCode());
		
	}
	
// create order items
	foreach ($_SESSION['cartItems'] as $cartId => $cartItem) {
		try {
		$query = " INSERT INTO order_items (order_id,product_id,quantity,unit_price,product_title)
		VALUES(:orderId,:productId,:quantity,:price,:title);
		 ";
		 $stmt = $dbconnect->prepare($query);
		 $stmt-> bindValue(':orderId', $orderId);
		 $stmt-> bindValue(':productId', $cartItem['id']);
		 $stmt-> bindValue(':quantity', $cartItem['quantity']);
		 $stmt-> bindValue(':price', $cartItem['price']);
		 $stmt-> bindValue(':title', $cartItem['title']);
		  $stmt-> execute();
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(),(int) $e->getCode());
		
	}

} 
	
	header('location: order-confirmation.php');
	exit;
}
header('location: check-out.php');
	exit;









