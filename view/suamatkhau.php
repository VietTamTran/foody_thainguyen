<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>
	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
</head>
<body>
	<div class="">
		<nav>
			<div class="nav-wrapper">
				<a href="index.php" class="brand-logo">Quản lý chi tiêu</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.php?action=trangcanhan">Xin chào: <?php echo $_SESSION['username']; ?></a></li>
					<li><a href="index.php?action=dangxuat">Đăng xuất</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row">

		<div class="col s4">
			
		</div>
		<div class="col s4">
				<form method="post">
					<div style="width: 100%; height: auto;  color: #EE6E73;"><h3 style="margin-left: 5px;">Sửa mật khẩu</h3></div>
					<h6><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);} ?></h6>
					<table>
						<tbody>
							<tr>
								<td><input type="password" name="matkhau" placeholder="Mật khẩu cũ" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td><input type="password" name="matkhau1" placeholder="Mật khẩu mới" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td><input type="password" name="matkhau2" placeholder="Nhập lại mật khẩu mới" autocomplete="off" required="required"></td>
							</tr>
						</tbody>
					</table>
					<br>
					<input class="waves-effect waves-light btn" type="submit" name="suamk" value="Đổi mật khẩu">	
				</form>
			</div>
		</div>


	</div>
</body>
</html>