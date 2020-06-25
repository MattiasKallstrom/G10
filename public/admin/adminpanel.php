<?php
 
require('../../src/config.php');
require(SRC_PATH . 'dbconnect.php');
require_once('include/header-admin.php');


?>

<div class="content">
	<div class="container-fluid">
		<div class="row"style="margin:5px">
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
				<div class="card">
					<div class="content" style="background-color: #8e44ad">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon text-center">
									<br>
									<i class="material-icons"style="font-size:48px">&#xe8cb;</i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center text white">
									<p style="color:#FFFFFF">NEW ORDERS</p>
									<span class="number"style="color:#FFFFFF;font-size:26px"><?php echo rowCount($dbconnect,"  SELECT * FROM orders
									
								");?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							<div class="stats text-white">
								<i class="material-icons "style="float:right;margin-right: 100px;">&#xe863;</i>  Updated with every order
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
				<div class="card">
					<div class="content " style="background-color: orange">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fa fa-user" style="font-size:48px;color:#0F9D58;margin-top:20px"></i>
								</div>
							</div>
							<div class="col-sm-8 text-white">
								<div class="detail text-center"text-white>
									<p>TOTAL MEMBER</p>
									<span class="number" style="font-size:26px;"><?php echo rowCount($dbconnect,"  SELECT * FROM users
										
									");?> </span>
								</div>
							</div>
						</div>
						
						
						<div class="footer">
							<hr />
							<div class="stats text-white">
								<i style="font-size:24px" class="fa">&#xf073;</i> In this Month
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
				<div class="card">
					<div class="content" style="background-color:#F00048">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fa fa-eye" style="font-size:46px;color:blue;margin-top:22px"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center text-white">                                                <p>TOTAL ARTICLE</p>
								<span class="number " style="font-size:26px;"><?php echo rowCount($dbconnect,"  SELECT * FROM products
									
								");?></span>
							</div>
						</div>
					</div>
					<div class="footer">
						<hr />
						<div class="stats text-white">
							<i style='font-size:18px; 'class='fas'>&#xf96f;</i> In the last 24 Hour
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-3 mt-3 text-white">
			<div class="card">
				<div class="content"  style="background-color:#273A5E">
					<div class="row">
						<div class="col-sm-4">
							<div class="icon-big text-center">
								<i class="fa fa-envelope" style="font-size:48px;color:orange;margin-top:22px"></i>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="detail text-center">
								<p>SUPPORT REQUEST</p>
								<span class="number"style="font-size:26px;">75</span>
							</div>
						</div>
					</div>
					<div class="footer">
						<hr />
						<div class="stats">
							<i class="fa fa-line-chart" style="font-size:20px"></i> Active in the last 7 days
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container latest">
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default text-white">
					<div class="panel-heading"style="margin-bottom: 10px; margin-top:20px"> <i class="fa fa-users"style="color:#0CF000"></i> <h6>LATEST REGISTERD USERS</h6></div>
					<?php
					if (isset($_POST['activate']))  { 
  $result= activateUser($_SESSION['id']);
}

$users = fetchAllUsersByOrder();

					?>
					<div class="panel-body" style="border-radius: 20px">
						<?php foreach ($users as $key => $user) { ?>
						<table class="table table-striped table-hover" style="background-color:#50BBC7 " >
							 <tbody>
                    <tr style="color:#FFFFFF">
								  <td>	<?=$user['id']?></td>
									  <td><?=htmlentities($user['first_name'])?> </td>
									  <td><?=htmlentities($user['last_name'])?></td>
								  <td><?=htmlentities($user['created_at'])?></td>
								<td><a href="manage member.php" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
							
                </tbody>
            </table>
					
						
					<?php } ?>
				</tr>
			</div>

</tbody>
</table>
</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default text-white">
					<div class="panel-heading"style="margin-bottom: 10px ;margin-top:20px"  > <i class="fa fa-tag"style="color:#0CF000"></i> <h6>LATEST PRODUCTS ADDED</h6></div>
					<?php
					if (isset($_POST['activate']))  { 
  $result= activateProduct($_SESSION['id']);
}
$products = fetchAllProductsByOrder();
					?>
					<div class="panel-body"style="border-radius: 20px">
						<?php foreach ($products as $key => $product) { ?>
						
						<table class="table table-striped table-hover" style="background-color:#50BBC7 " >
							 <tbody>
                    <tr style="color:#FFFFFF">
								  <td>	<?=$product['id']?></td>
									  <td><?=htmlentities($product['title'])?> </td>
									  <td><?=htmlentities($product['price'])?> $</td>
								  <td><?=htmlentities($product['created_at'])?></td>
								<td><a href="manage product.php" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
							
                </tbody>
            </table>
					
						
					<?php } ?>
				</tr>
			</div>
</tbody>
</table>
</div>
</div>
			<div class="col-sm-10 "style="text-align:center;margin-left:80px; margin-right:50px;" >
				<div class="panel panel-default text-white">
					<div class="panel-heading"style="margin-bottom: 10px ;margin-top:30px"  > <i class="fa fa-money"style="font-size:38px;color:#0CF000"></i><br></h6>LATEST ORDER CONFIRMED</h6></div>
					<?php
					if (isset($_POST['activate']))  { 
  $result= activateOrder($_SESSION['id']);
}
$orders = fetchAllOrdersByOrder();
					?>
					<div class="panel-body" style="border-radius:20px">
						<?php foreach ($orders as $key => $order) { ?>
						
						<table class="table table-striped table-hover" style="background-color:#50BBC7 " >
				
				  
                <tbody>
                    <tr style="color:#FFFFFF">
                       
                        <td><?=$order['id']?></td>
						<td><?=htmlentities($order['billing_full_name'])?></td>
                        <td><?=htmlentities($order['total_price'])?>$</td>                        
						<td><?=htmlentities($order['billing_street'])?></td>
						<td><?=htmlentities($order['billing_city'])?></td>
						<td> <?=htmlentities($order['billing_postal_code'])?></td>
						<td><?=htmlentities($order['billing_country'])?></td>
						<td><a href="#" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
					
                </tbody>
            </table>
						
					<?php } ?>
				
			</div>
		</div>
		
		
	</div>
</div>
