<nav class="navbar1">
	<div class="nav-wrapper navbar">
		<div class="logo">
			<a href="<?php if(isset($_SESSION['quyen'])){ if($_SESSION['quyen']==1){ echo 'index.php?action=adminquantri';}else{ echo 'index.php'; } } ?>" class="brand-logo">Food & Drink</a>
		</div>
		<ul class="right">
			<a href=""></a>
			<?php if(isset($_SESSION['username'])){ ?>
			<li><a href="index.php?action=trangcanhan"><?php echo $_SESSION['username']; ?></a></li>
			<li><a href="index.php?action=dangxuat">Đăng xuất</a></li>
			<?php }else{ ?>
			<li><a href="index.php?action=dangky">Đăng ký</a></li>
			<li><a href="index.php?action=dangnhap">Đăng nhập</a></li>
			<?php } ?>
		</ul>
	</div>
</nav>