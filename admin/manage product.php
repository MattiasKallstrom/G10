<?php
require('../src/config.php');
require(SRC_PATH . 'dbconnect.php');
?>

  <?php
  if (isset($_POST['deleteBtn'])) {
  try {
  $query = "
  DELETE FROM products
  WHERE id = :id;
  ";
  $stmt = $dbconnect->prepare($query);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
  } catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int) $e->getCode());
  }
  }
  // Fetch all users
  try {
  $query = "
  SELECT * FROM products
  ";
  $stmt = $dbconnect->query($query);
 
  $products = $stmt->fetchAll();
  } catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int) $e->getCode());
  }
?>
<?php include ('include/navbar1.php')?>
  <body>

    <div class="container-fluid">
 
            
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <a class="navbar-brand" href="adminpanel.php" style="color: #ffffff;">TO &nbsp;ADMIN<b>&nbsp;PANEL</b></a>
          </div>
          <div class="col-sm-6">
             <form action="create product.php" method="GET">
        <input type="submit" value="create product"class="btn btn-success">
      </form>
         </div>
        </div>
      </div>
      <div class="row">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>
              <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
                <label for="selectAll"></label>
              </span>
            </th>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Datum</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $key => $product) { ?>
          
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
            <th><?=$product['id']?></th>
            <th><?=htmlentities($product['title'])?></th>
            <th><?=htmlentities($product['description'])?></th>
            <th><?=htmlentities($product['price'])?> $</th>
            <th><?=htmlentities($product['create_at'])?></th>
            <th>

               
              </form>
              <form action="update product.php?" method="GET" >
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <input type="submit" value="Updatera "class="btn btn-info">
              </form>
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?=$product['id']?>">
                 <input type="submit"name="deleteBtn" class=" btn btn-danger"value="Delete"></a>       
              </form>
          
      


            </th>
          </tr>

          <?php } ?>
        </tbody>
      </table>
      
      <hr>
      <div class="clearfix">
                
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
  </div>
  </div>
</div>
</body>
</html>

