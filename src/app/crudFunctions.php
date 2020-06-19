<?php 
function fetchUserBySessionId($sessionId){
	global $dbconnect;
try {
        $query = "
            SELECT * FROM users
             WHERE id = :id
        ";

        $stmt = $dbconnect->prepare($query);
         $stmt->bindvalue(':id', $sessionId);
         $stmt->execute(); 
        $user = $stmt->fetch();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
return $user;
}

function fetchProductById($productId) {
    global $dbconnect;

    try {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':id', $productId);                                                   
        $stmt->execute();
        $product = $stmt->fetch();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

return $product;
}

function fetchUserById($id){
	global $dbconnect;
	try {
        $query = "
            SELECT * FROM users
            WHERE id = :id
        ";

        $stmt = $dbconnect->prepare($query);
        $stmt->bindvalue(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
   return $user;
}

 function fetchUserByEmail($email){
        	global $dbconnect;
        	 try {
            $query = "
                SELECT * FROM users
                WHERE email = :email;
            ";

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute(); 
            $user = $stmt->fetch();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $user;
        }
// Adding User 
function addUser($userData){
		global $dbconnect;
	try {
		$query= "INSERT INTO users (first_name,last_name,email,password,phone,street,postal_code,city,country)
		VALUES(:first_name,:last_name,:email,:password,:phone,:street,:postal_code,:city,:country);

		";
		$stmt=$dbconnect->prepare($query);
		$stmt-> bindValue(':first_name',$userData['first_name']);
		$stmt-> bindValue(':last_name',$userData['last_name']);
		$stmt-> bindValue(':email',$userData['email']);
		$stmt-> bindValue(':password',password_hash($userData['password'], PASSWORD_DEFAULT));
		$stmt-> bindValue(':phone',$userData['phone']);
		$stmt-> bindValue(':street',$userData['street']);
		$stmt-> bindValue(':postal_code',$userData['postal_code']);
		$stmt-> bindValue(':city',$userData['city']);
		$stmt-> bindValue(':country',$userData['country']);
		$result = $stmt->execute();
		
		
	} catch(\PDOException $e) {
	        throw new \PDOException($e->getMessage(), (int) $e->getCode());
		
	}
	return $result;
}

function updateProduct($productData){
	global $dbconnect;
try {
		$query = "  UPDATE products
                    SET title = :title, description = :description, price = :price, img_url = :img_url
                    WHERE id = :id
		";
		$stmt = $dbconnect->prepare($query);
		$stmt->bindvalue(':title',$productData['title']);
		$stmt->bindvalue(':description',$productData['description']);
		$stmt->bindvalue(':price',$productData['price']);
		$stmt->bindvalue(':img_url',$productData['img_url']);
		$stmt->bindvalue(':id', $productData['id']);
		$result = $stmt->execute();
		
	} catch (\PDOException $e) {
throw new \PDOException($e->getMessage(), (int) $e->getCode());
		
	}
                
	return $result;
}


function updateUser($userData){
	global $dbconnect;
try {
		$query = "  UPDATE users
                    SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, street = :street, postal_code = :postal_code, city = :city, country = :country
                    WHERE id = :id
		";
		$stmt = $dbconnect->prepare($query);
		$stmt->bindvalue(':first_name',$userData['first_name']);
		$stmt->bindvalue(':last_name',$userData['last_name']);
		$stmt->bindvalue(':email',$userData['email']);
		$stmt->bindvalue(':phone',$userData['phone']);
		$stmt->bindvalue(':street',$userData['street']);
		$stmt->bindvalue(':postal_code',$userData['postal_code']);
		$stmt->bindvalue(':city',$userData['city']);
		$stmt->bindvalue(':country',$userData['country']);
		$stmt->bindvalue(':id', $userData['id']);
		$result = $stmt->execute();
		
	} catch (\PDOException $e) {
throw new \PDOException($e->getMessage(), (int) $e->getCode());
		
	}
                
	return $result;
}
function deleteUser($sessionId){
global $dbconnect;

try {
	$query = "DELETE FROM users
WHERE id = :id;
	";
	$stmt = $dbconnect->prepare($query);
	$stmt->bindValue(':id',$sessionId);
	$result = $stmt->execute();
	
} catch (\PDOException $e) {
	throw new \PDOException($e->getMessage(),(int) $e->getCode());
	
}
return $result;
}

function fetchAllUsers() {
		
		global $dbconnect;

		try {
		    $query = "
		        SELECT * FROM users
		    ";

		    $stmt = $dbconnect->query($query);
		   
		    $users = $stmt->fetchAll();
		} catch (\PDOException $e) {
		    throw new \PDOException($e->getMessage(), (int) $e->getCode());
		}

		return $users;
	}
function fetchAllUsersByOrder() {
		
		global $dbconnect;

		try {
		    $query = "
		       SELECT * FROM users ORDER BY id DESC LIMIT 3";
		  

		    $stmt = $dbconnect->query($query);
		   
		    $users = $stmt->fetchAll();
		} catch (\PDOException $e) {
		    throw new \PDOException($e->getMessage(), (int) $e->getCode());
		}

		return $users;
	}
function fetchAllProducts() {
		
		global $dbconnect;
try {
					$query = "
					
					SELECT * FROM products";
					$stmt = $dbconnect->query($query);
					
					$products = $stmt->fetchAll();
					} catch (\PDOException $e) {
					throw new \PDOException($e->getMessage(), (int) $e->getCode());
					}

		return $products;
	}
	function fetchAllProductsByOrder() {
		
		global $dbconnect;
try {
					$query = "
					
					SELECT * FROM products ORDER BY id DESC LIMIT 3";
					$stmt = $dbconnect->query($query);
					
					$products = $stmt->fetchAll();
					} catch (\PDOException $e) {
					throw new \PDOException($e->getMessage(), (int) $e->getCode());
					}

		return $products;
	}

	function deleteProduct($Id){
global $dbconnect;

try {
	$query = "DELETE FROM products
WHERE id = :id;
	";
	$stmt = $dbconnect->prepare($query);
	$stmt->bindValue(':id',$Id);
	$result = $stmt->execute();
	
} catch (\PDOException $e) {
	throw new \PDOException($e->getMessage(),(int) $e->getCode());
	
}
return $result;
}
function deleteUserById($Id){
global $dbconnect;

try {
	$query = "DELETE FROM users
WHERE id = :id;
	";
	$stmt = $dbconnect->prepare($query);
	$stmt->bindValue(':id',$Id);
	$result = $stmt->execute();
	
} catch (\PDOException $e) {
	throw new \PDOException($e->getMessage(),(int) $e->getCode());
	
}
return $result;
}
function rowCount($dbconnect,$query){
	$stmt = $dbconnect->prepare($query);
	$stmt->execute();
	return $stmt->rowCount();
}
 


 ?>