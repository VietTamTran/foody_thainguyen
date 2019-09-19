<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>
	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
</head>
<body>
	<div class="" >
		<nav style=" background-color: white;">
			<div class="nav-wrapper">
				<a style="color: black;" href="index.php" class="brand-logo">Food & Drink</a>
			</div>
		</nav>
	</div>
	<div class="row">

		<div class="col s2">
			
		</div>
		<div class="col s8">
				<form method="post">
					<div style="width: 100%; height: auto;  color: #EE6E73;"><h3 style="margin-left: 5px;">Đăng ký tài khoản</h3></div>
					<h6 style="color: red;"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);} ?></h6>
					<table>
						<tbody>
							<tr>
								<td><input type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off" required="required"></td>
								<td><input type="text" name="hovaten" placeholder="Nhập họ và tên" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td><input type="password" name="password1" placeholder ="Nhập mật khẩu" autocomplete="off" required="required"></td>
								<td><input type="password" name="password2" placeholder="Nhập lại mật khẩu" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td><input type="email" name="email" placeholder ="Nhập email" autocomplete="off" required="required"></td>
								<td><input type="number" name="sodienthoai" placeholder="Nhập số điện thoại " autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td><input type="date" name="birthday" ></td>
								<td>
									<label>
								        <input name="gioitinh" type="radio" value="1" checked="" />
								        <span>Nam</span>
								      </label> |
								   
								      <label>
								        <input name="gioitinh" type="radio" value="0" />
								        <span>Nữ</span>
								      </label>
								</td>
							</tr>
						</tbody>
					</table>
					<br>
					<input class="btn" style="margin-left: 42%;" type="submit" name="btndangky" value="Thêm tài khoản">	
				</form>
			</div>
		</div>


	</div>
</body>
</html>