<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>

	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/css.css">
	<link rel="stylesheet" type="text/css" href="res/css/chucuahang.css">
	<link rel="stylesheet" type="text/css" href="res/css/admin.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div>
		<nav>
			<div class="nav-wrapper">
				<a href="index.php?action=adminquantri" class="brand-logo">Food & Drink</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.php?action=trangcanhan"><?php echo $_SESSION['username']; ?></a></li>
					<li><a href="index.php?action=dangxuat">Đăng xuất</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row allbody">
		<div class="col s2">
			<ul class="collapsible">
				<li>
			      <div class="collapsible-header"><a class="abtn" href="index.php?action=adminquantri">Tổng quan</a></div>
			    </li>
			    <li>
			      <div class="collapsible-header abtn">Tài khoản</div>
			      <div class="collapsible-body">
					<ul class="ul1 uladmin">
						<li class="li2"><a href="index.php?action=adminquantri&adminkhoa=1">Admin</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminkhoa=2">Chủ cửa hàng</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminkhoa=3">Khách hàng</a></li>
					</ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header abtn">Cửa hàng</div>
			      <div class="collapsible-body">
					<ul class="ul1 uladmin">
						<li class="li2"><a href="index.php?action=adminquantri&adminactive=1">Tất cả</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminactive=0">Đang chờ duyệt</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminloai=1">Đồ ăn</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminloai=2">Đồ uống</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminloai=3">Lẩu & nướng</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminloai=4">Nhà hàng</a></li>
						<li class="li2"><a href="index.php?action=adminquantri&adminloai=5">Khách sạn</a></li>
					</ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header">
					    <a  class="abtn" href="index.php?action=xemphanhoi" style="width: 100%;">Phản hồi
					    	<?php if(isset($_SESSION['getphanhoi'])){ ?>
					        	<span class="new badge"><?php echo $_SESSION['getphanhoi']; unset($_SESSION['getphanhoi']); ?></span>
					    	<?php } ?>
					    </a>
					</div>
			    </li>
			    <li>
			      <div class="collapsible-header"><a class="abtn" href="index.php?action=themdiadiem">Thêm cửa hàng</a></div>
			    </li>
			</ul>
		</div>
		<div class="col s10 data">
			<?php 
			if(isset($_SESSION['xemphanhoi'])){
				unset($_SESSION['xemphanhoi']);
				include 'view/admin/hienthiphanhoi.php';  
			}else 
			if(isset($_SESSION['adminkhoa'])){
				unset($_SESSION['adminkhoa']);
				include 'view/admin/tableuser.php';  
			}else 
			if(isset($_SESSION['adminloai'])||isset($_SESSION['adminactive'])){
				unset($_SESSION['adminloai']);
				unset($_SESSION['adminactive']);
				include 'view/admin/tablequanan.php'; 
			}else{
				include 'view/admin/tongquan.php';
			} ?>
		</div>
	</div>

	<div class="footer">
		<?php include 'view/footer.php'; ?>
	</div>

	<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
	<script src="res/materialize/js/js.js" type="text/javascript" charset="utf-8"></script>
	<script src="res/js/phantrang.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>