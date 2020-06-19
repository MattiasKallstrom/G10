<?php
require('../src/config.php');
require(SRC_PATH . 'dbconnect.php');
?>


  <?php
  
  
if (isset($_POST['delete'])) { 
 // $result = deleteUser($_SESSION['id']);}
  try {
      $query = "
          DELETE FROM users
          WHERE id = :id;
      ";

      $stmt = $dbconnect->prepare($query);
      $stmt->bindValue(':id', $_POST['id']);
      $stmt->execute();
  } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int) $e->getCode());
  }
}



$users = fetchAllUsers();


?>
<?php include ('include/navbar1.php')?>
  <body>
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <a class="navbar-brand" href="adminpanel.php" style="color: #ffffff;">TO &nbsp;ADMIN<b>PANEL</b></a>
          </div>
          <div class="col-sm-6">
             <form action="create member.php" method="GET">
        <input type="submit" value="CREATE USER"class="btn btn-success">
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
            <th>USERNAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>CITY</th>
            <th>DATUM</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $key => $user) { ?>
          
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
            <th><?=$user['id']?></th>
            <th><?=htmlentities($user['first_name'])?></th>
            <th><?=htmlentities($user['last_name'])?></th>
            <th><?=htmlentities($user['email'])?></th>
            <th><?=htmlentities($user['city'])?></th>
            <th><?=htmlentities($user['register_date'])?></th>
            <th>

               
              </form>
              <form action="update members.php?" method="GET" >
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <input type="submit" value="Updatera"class="btn btn-info">
              </form>
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                 <input type="submit"name="delete" class="btn btn-danger"value="Delete"></a>				
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

