<?php 
include "../classes/adminlogin.php";
?>
<?php 
	$class = new AdminLogin();
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$admin_user = $_POST['username'];
		$admin_pass = md5($_POST['password']);
		$login_check = $class->login_admin($admin_user, $admin_pass);
	}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<?php 
				if(isset($login_check)){
					echo $login_check;
				}
			?>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>