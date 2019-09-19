<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>
	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/css.css">
</head>
<body>
	<div class="">
		<nav>
			<div class="nav-wrapper">
				<a href="<?php if(isset($_SESSION['quyen'])){ if($_SESSION['quyen']==1){ echo 'index.php?action=adminquantri';}else{ echo 'index.php'; } } ?>" class="brand-logo">Food & Drink</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.php?action=trangcanhan">Xin chào: <?php echo $_SESSION['username']; ?></a></li>
					<li><a href="index.php?action=dangxuat">Đăng xuất</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row">

		<div class="col s2">
		</div>
		<div class="col s8">
			<?php while($row=$kq->fetch_assoc()){ ?>
				<div style="width: 100%; height: auto;  color: #EE6E73;"><h3 style="margin-left: 5px;">Trang cá nhân</h3></div>
				
				<table>
					<tbody>
						<tr>
							<td><img class="anhdaidien" style="float: left; width: 350px;" src="res/img/<?php echo $row['anhdaidien'] ?>">
							</td>

						</tr>
					</tbody>
				</table>
				<form method="post">

					<table>
						<h6><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);} ?></h6>
						<tbody>

							<tr>
								<td><input readonly type="text" name="username" value="<?php echo $row['username'] ?>"></td>
								<td><input readonly type="text" name="hovaten" value="<?php echo $row['hovaten'] ?>"></td>
							</tr>
							<tr>
								<td><input readonly type="text" name="email" value="<?php echo $row['email'] ?>"></td>
								<td><input readonly type="text" name="sdt" value="<?php echo $row['sdt'] ?>"></td>
							</tr>
							<tr>
								<td><input readonly type="date" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>"></td>
								<td><input readonly type="text" name="ngaysinh" value="<?php if($row['gioitinh']==1){echo "Nam";}else{ echo "Nữ";} ?>" /></td>
							</tr>
						</tbody>
					</table>
					<br>
			<?php } ?>
		</div>
		</div>
		<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
		<script src="res/materialize/js/js.js" type="text/javascript" charset="utf-8"></script>
	</body>
	</html>