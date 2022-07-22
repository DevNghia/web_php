<?php
// gọi file adminlogin
include '../classes/adminlogin.php';
?>
<?php
// gọi class adminlogin
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);

	$login_check = $class->login_admin($adminUser, $adminPass); // hàm check User and Pass khi submit lên

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
				<h1>ĐĂNG NHẬP ADMIN</h1>
				<span><?php
						if (isset($login_check)) {
							echo $login_check;
						}
						?> </span>
				<div>
					<input type="text" placeholder="Nhập tên User" required="" name="adminUser" />
				</div>
				<div>
					<input type="password" placeholder="Nhập Password" required="" name="adminPass" />
				</div>
				<div>
					<input type="submit" value="Đăng Nhập" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#"></a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>