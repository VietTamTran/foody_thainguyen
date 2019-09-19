<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>

	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/css.css">
	<link rel="stylesheet" type="text/css" href="res/css/chucuahang.css">
</head>
<body>
	<div class="dkchucuahang">
		<div>
			<?php require 'view/navbar.php'; ?>
		</div>
		<div class="container fromdkchucuahang">
			<div class="noidung">
				<h5><b>Đăng ký làm chủ cửa hàng ngay</b></h5>
				<p>Để của hàng của bạn chưa có trên Food & Drink? Chia sẻ với cộng đồng ngay nào!</p>
				<form method="post">	
					<div class="row">
						<h6 class="title"><b>Thông tin cơ bản</b></h6>
						<table class="tblthongtin">
							<tr>
								<td>Tên cửa hàng: <span>*</span></td>
								<td><input  id="name"  type="text" name="tencuahang" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td>Địa chỉ: <span>*</span></td>
								<td><input id="address" type="text" name="diachi" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td>Mô tả: <span>*</span></td>
								<td><input type="text" name="mota" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td>Loại: <span>*</span></td>
								<td><select id="type" style="display: block;" name="loai">
									<option value="1">Đồ ăn</option>
									<option value="2">Đồ uống</option>
									<option value="3">Lẩu, nướng</option>
									<option value="4">Nhà hàng</option>
									<option value="5">Khách sạn</option>
								</select></td>
							</tr>
							<tr>
								<td>Email: <span>*</span></td>
								<td><input type="email" name="email" autocomplete="off" required="required"></td>
							</tr>
							<tr>
								<td>Số điện thoại: <span>*</span></td>
								<td><input type="text" name="sodienthoai" autocomplete="off" required="required"></td>
							</tr>	
							<tr>
								
							</tr>
						</table>
						<div>
							<div id="map" style="height: 460px; width: 100%;"></div>
						</div>
						<input id="vido" type="text" name="vido" autocomplete="off" required="required">
						<input id="kinhdo" type="text" name="kinhdo" autocomplete="off" required="required">
						<br>
						Chọn vị trí của cửa hàng ở bản đồ bên trên để đăng ký cửa hàng!
					</div>
					<input class="btn btnguidangky" type="submit" name="btnguidangky" value="Gửi đăng ký" onclick='saveData()'>
				</form>
				
			</div>
		</div>
		<br/>
	</div>

	<div class="footer">
		<?php include 'view/footer.php'; ?>
	</div>
	<script type="text/javascript" src="res/js/mapthemvitri.js"></script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7a9aOxSrO-0GIn6u3GlF0JJTlc5mgV_I&callback=initMap">
</script>
<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>

</body>
</html>