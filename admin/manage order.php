<?php
require('../src/config.php');
require(SRC_PATH . 'dbconnect.php');
?>


  <?php
  
  
if (isset($_POST['delete'])) { 
 // $result = deleteUser($_SESSION['id']);}
  try {
      $query = "
          DELETE FROM orders
          WHERE id = :id;
      ";

      $stmt = $dbconnect->prepare($query);
      $stmt->bindValue(':id', $_POST['id']);
      $stmt->execute();
  } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int) $e->getCode());
  }
}



$orders = fetchAllOrders();


?>
<?php include ('include/navbar1.php')?>
  <body>
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <a class="navbar-brand" href="adminpanel.php" style="color: #ffffff">TO &nbsp;ADMIN<b>PANEL</b></a>
          </div>
           <div class="col-sm-6">
           
        <h4 style="color: #00ff00"><b>ORDERS<b>&nbsp;COMFIRMED<b></h4>
     
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
            <th>Full Name</th>
            <th>Price</th>
            <th>Street</th>
            <th>Postal Code</th>
            <th>City</th>
            <th>Country</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $key => $order) { ?>
          
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
            <th><?=$order['id']?></th>
            <th><?=htmlentities($order['billing_full_name'])?></th>
            <th><?=htmlentities($order['total_price'])?> $</th>
            <th><?=htmlentities($order['billing_street'])?></th>
            <th><?=htmlentities($order['billing_city'])?></th>
            <th><?=htmlentities($order['billing_postal_code'])?></th>
            <th><?=htmlentities($order['billing_country'])?></th>
            <th>

               
              </form>
              <form action="order.php?" method="GET" >
                <input type="hidden" name="id" value="<?=$order['id']?>">
               
              </form>
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?=$order['id']?>">
               				
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

