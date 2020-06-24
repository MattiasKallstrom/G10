<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<!-- Bootstrap CSS -->
		<link href="https://fonts.googleapis.com/css?family=Raleway+Dots" rel="stylesheet" type="text/css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="static/css/style.css">
<title>adminpanel</title>

	</head>
<div class="container-fluid">

			<nav class="navbar navbar-default navbar-expand-lg navbar-light">
				<div class="navbar-header d-flex col">
					<a class="navbar-brand" href="../index.php" style="color: #ffffff;">ADMIN<b>PANEL</b></a>
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
					<span class="navbar-toggler-icon"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
					<ul class="nav navbar-nav">
						<li class="nav-item active"><a href="manage product.php" class="nav-link  text-white">PRODUCT</a></li>
						<li class="nav-item"><a href="manage order.php" class="nav-link  text-white"style = "margin-left:30px">ORDER</a></li>
						<li class="nav-item active">
							<a href="manage member.php" class="nav-link  text-white"style = "margin-right:50px;margin-left:30px">MEMBERS</a>
						</li>
						
					</ul>
					<form class="navbar-form form-inline" style="margin-bottom: -3px">
						<div class="input-group search-box">
							<input type="text" id="search" class="form-control" placeholder="Search here...">
							<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
						</div>
					</form>
					<ul class="nav navbar-nav ml-auto active" >
						<li class="nav-item dropdown">
							<a data-toggle="dropdown" class="nav-link  text-white dropdown-toggle" href="#"> Wellcome Med </a>
							<ul class="dropdown-menu"style = "margin-left:-42px;border-box:none">
								<li><a href="manage member.php" class="dropdown-item text-info"style = "margin-left:10px">PROFILE</a></li>
								<li><a href="manage product.php" class="dropdown-item text-info"style = "margin-left:10px">PRODUCT</a></li>
								<li><a href="../sign-out.php" class="dropdown-item text-info" style = "margin-left:10px">LOGOUT</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			