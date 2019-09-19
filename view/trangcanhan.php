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
				<h6><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']);} ?></h6>
				<table>
					<tbody>
						<tr>
							<td><img class="anhdaidien" style="float: left; width: 350px;" src="res/img/<?php echo $row['anhdaidien'] ?>">

								<form method="post" enctype="multipart/form-data">
									<div>
										<div class="file-field input-field" style="float: left; width: 300px; margin-top: 80px; margin-left: 5px;">
											<br>
											<div class="btn">
												<span>Ảnh</span>
												<input type="file" name="file" required="required">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text" name="">
											</div>
										</div>
										<input style="width: 150px; margin-top: 125px; margin-left: 5px;" class="" type="submit" value="Tải lên" name="upanh">
									</div>
								</form>
							</td>

						</tr>
					</tbody>
				</table>
				<form method="post">

					<table>
						<tbody>

							<tr>
								<td><input type="text" name="username" autocomplete="off" value="<?php echo $row['username'] ?>" required="required"></td>
								<td><input type="text" name="hovaten" autocomplete="off" value="<?php echo $row['hovaten'] ?>" required="required"></td>
							</tr>
							<tr>
								<td><input type="text" name="email" autocomplete="off" value="<?php echo $row['email'] ?>" required="required"></td>
								<td><input type="text" name="sdt" autocomplete="off" value="<?php echo $row['sdt'] ?>" required="required"></td>
							</tr>
							<tr>
								<td><input type="date" name="ngaysinh" autocomplete="off" value="<?php echo $row['ngaysinh'] ?>" required="required"></td>
								<td>
									<label>
										<input name="gioitinh" type="radio" value="1" <?php if($row['gioitinh']==1){echo "checked";} ?> />
										<span>Nam</span>
									</label> |

									<label>
										<input name="gioitinh" type="radio" value="0" <?php if($row['gioitinh']==0){echo "checked";} ?> />
										<span>Nữ</span>
									</label>
								</td>
							</tr>
						</tbody>
					</table>
					
					<br>
					<input class="waves-effect waves-light btn btnsuatt" type="submit" name="suattcn" value="Sửa thông tin cá nhân">	
				</form>
				<button data-target="modal1" class="btn modal-trigger doimatkhau">Đổi Mật khẩu</button>
				<div id="modal1" class="modal">
					<form method="post">
						<div class="modal-content">
							<table>
								<tr>
									<td><input type="password" name="matkhaucu" placeholder="Nhập mật khẩu cũ" required="required"></td>					      		
								</tr>
								<tr>
									<td><input type="password" name="matkhaumoi" placeholder="Nhập mật khẩu mới" required="required"></td>
								</tr>
								<tr>
									<td><input type="password" name="matkhaumoi1" placeholder="Nhập lại mật khẩu mới" required="required"></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<input class="modal-close waves-effect waves-green btn-flat" type="button" name="" value="Trở lại">
							<input class="modal-close waves-effect waves-green btn-flat" type="submit" name="suamatkhau" value="Đồng ý">
						</div>
					</form>
				</div>
			<?php } ?>

		</div>
		<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
	</body>
	</html>