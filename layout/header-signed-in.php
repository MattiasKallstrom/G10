<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta charset="UTF-8">
		<title><?php echo $pageTitle; ?></title>
	</head>
<header>
	<div class="container col-xl-12">
	<?php 
						if (isset($_SESSION['user'])) {
						$loggedInUsername = htmlentities(ucfirst($_SESSION['user'])); 

						}
						 ?>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php"><img src="../images/g10.png" alt="" width="90px;"></a>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="../public/index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
					<li class="nav-item">
							<a class="nav-link" href="#">Contact</a>
						</li>
					<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								More
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">A1</a>
								<a class="dropdown-item" href="#">B1</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">C1</a>
							</div>

							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo 'Hi' .' '.substr($loggedInUsername,0,10) ; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../public/dashboard.php">Dashboard</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item " href="sign-out.php" style="color: red;">Sign Out</a>
							</div>	
							





						

						
					</ul>






					<!-- cart-------- -->
			<?php include('../public/cart.php'); ?>
		<!-- cart end----------- -->
	





	</div>
</nav>
</div>
</header>
<!-- Header end -->
