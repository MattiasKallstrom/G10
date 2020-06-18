
<?php 
require('../src/config.php');
require('../src/dbconnect.php');
require('delete-product.php');
require('create.php');
//require('upload.php');
error_reporting(-1);


if(!isset($_SESSION['user'])){
    require_once("../layout/header.php");
}else{  
    require_once("../layout/header-signed-in.php");
}




$stmt = $dbconnect->prepare("SELECT * FROM products ORDER BY id DESC");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':img_url', $img_url);
 
?>

      <h2>All posts</h2> 
      

      <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['id']); ?></td>
            <td><?php echo htmlspecialchars($product['title']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td><?php echo htmlspecialchars($product['img_url']); ?></td>
            <td>
              <a href="edit.php?edit=<?php echo $product['id'] ?>" name="edit">Edit</a>
              <a onclick href="admin.php?delete=<?php echo  $product['id']?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

<body>
      <div id="content">
        <article class="border">
        <form action="admin.php" method="post">    
            <p>
                <label for="input1">Create a new product:</label><br>

                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>"placeholder="Title">
                <br>

                <label for="content">Description</label>
                <textarea type="text" name="description" value="<?php echo $description; ?>" rows="5" cols="40" placeholder="Content"></textarea>
                <br>

                <label for="author">Price</label>
                <input type="number" name="price" value="<?php echo $price; ?>" placeholder="price">
                <br>

                <label for ="image"> Select an image to upload:</label>
                <input type="file" name="img_url" id="fileToUpload">
                <br>
            
                <input type ="submit" name="submit" value="Submit">
            
            </p>
        </form>

        <?php
require_once("../layout/footer.php")
?>           

            <hr>
        </article>
    </div>
   
</body>