<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Food&Drink</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<form action="" method="post">
		<div class="row" style="margin-top: 5%;">
			<div class="col s12 m4 offset-m4" >
				<div class="card">
					<div class="card-action teal light-1 white-text">
						<h3><a href="index.php"><i class="material-icons" style="font-size: 30px;">reply</i></a>Đăng nhập</h3>
						<h6 style="color: red;" ><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);} ?></h6>
					</div>
					<div class="card-content">
						<div class="form-field">
							<label for="username">Tài khoản:</label>
							<input type="text" value="" name="username" autocomplete="off" required="required">
						</div>
						<div class="form-field">
							<label for="password">Mật khẩu:</label>
							<input type="password" value="" name="password" required="required">
						</div>
						<div class="form-field">
							<button class="btn-large waves-effect waves-drak" style="width: 100%" type="submit" name="dangnhap">Đăng nhập</button>
						</div>
						<div class="form-field">
							<br>
							<p  style="text-align: center;"><a href="">Quên mật khẩu! </a> Bạn chưa có tài khoản? <a href="index.php?action=dangky">Đăng ký</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>