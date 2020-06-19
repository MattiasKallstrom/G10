<?php
 
require('../src/config.php');
require(SRC_PATH . 'dbconnect.php');
include('include/header-admin.php')
?>

<div class="content">
	<div class="container-fluid">
		<div class="row">
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
									<span class="number"style="color:#FFFFFF;font-size:26px">6,267</span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							<div class="stats text-white">
								<i class="material-icons "style="float:right;margin-right: 100px;">&#xe863;</i>  Updated every 30 min
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
				<div class="content"  style="background-color:#50BBC7 ">
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
				<div class="panel panel-default">
					<div class="panel-heading"style="margin-bottom: 20px"> <i class="fa fa-users"style="color:#0CF000"></i> <h6>LATEST REGISTERD USERS</h6></div>
					<?php
					if (isset($_POST['activate']))  { 
  $result= activateUser($_SESSION['id']);
}

$users = fetchAllUsersByOrder();

					?>
					<div class="panel-body" style="border-radius: 20px">
						<?php foreach ($users as $key => $user) { ?>
						<div class="card" style="background-color:#50BBC7 ;border-radius: 0px" >
							<ul class=" list-group-flush">
								<li class="group-item"style="color:#FFFFFF">
									
									<?=$user['id']?>&nbsp;&nbsp;
									<?=htmlentities($user['first_name'])?> &nbsp;&nbsp;
									<?=htmlentities($user['last_name'])?> &nbsp;&nbsp;
								<?=htmlentities($user['register_date'])?></li>
								<br>
								
							</ul>
						</div>
						
					<?php } ?></div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"style="margin-bottom: 20px" > <i class="fa fa-tag"style="color:#0CF000"></i> <h6>LATEST PRODUCTS ADDED</h6></div>
					<?php
					if (isset($_POST['activate']))  { 
  $result= activateProduct($_SESSION['id']);
}
$products = fetchAllProductsByOrder();
					?>
					<div class="panel-body"style="border-radius: 20px">
						<?php foreach ($products as $key => $product) { ?>
						
						<div class="card" style="background-color:#50BBC7 ;border-radius: 0px" >
							<ul class="group-flush">
								<li class="group-item"style="color:#FFFFFF">
									<?=$product['id']?>&nbsp;&nbsp;&nbsp;&nbsp;
									<?=htmlentities($product['title'])?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?=htmlentities($product['register_date'])?></li><br>
								
							</ul>
						</div>
						
					<?php } ?></div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>
