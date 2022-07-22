<?php
include 'inc/header.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
	$insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
	$login_Customers = $cs->login_customers($_POST);
}
?>
<div class="main">
	<div class="content">

		<div class="login_panel">
			<?php
			if (isset($login_Customers)) {
				echo $login_Customers;
			}

			?>
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<form action="" method="POST">
				<input type="text" name="email" class="field" placeholder="Enter Email.....">
				<input type="password" name="password" class="field" placeholder="Enter Password.....">


				<p class=" note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
				<div class="buttons">
					<div><input type="submit" name="login" class="grey" value="Sign in"></div>
				</div>
			</form>
		</div>

		<div class="register_account">
			<h3>Register New Account</h3>
			<?php
			if (isset($insertCustomers)) {
				echo $insertCustomers;
			}

			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Enter Name...">
								</div>

								<div>
									<input type="text" name="city" placeholder="Enter City...">
								</div>

								<div>
									<input type="text" name="zipcode" placeholder="Enter Zip-Code...">
								</div>
								<div>
									<input type="text" name="email" placeholder="Enter Email...">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Enter Address...">
								</div>
								<div>
									<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Select a Country</option>
										<option value="VN">Vietnam</option>
										<option value="US">America</option>
										<option value="ENG">England</option>

									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="Enter Phone...">
								</div>

								<div>
									<input type="text" name="password" placeholder="Enter Password...">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><input type="submit" name="submit" class="grey" value="Create Account"></div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php
include 'inc/footer.php'
?>