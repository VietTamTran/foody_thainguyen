<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>
	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/css.css">
	<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<div>
		<div class="menavbar">
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
					<ul class="right hide-on-med-and-down menu" style="max-width: 45%;">

						<form action="" method="post">
							<li class="ndtimkiem"><input type="text" name="noidungtimkiem" placeholder="Nhập tên món ăn, tên quán, địa điểm" autocomplete="off" required="required"></li>
							<li class="sbtimkiem"><input type="submit" name="timkiem" value="Tìm kiếm"></li>
						</form>
					</ul>
				</div>
			</nav>
		</div>
		<div class="allbody allbody-chitietquan" >
			<div class="row">
				<div class="col s1"></div>
				<div class="col s10">
					<div class="row">
						<div class="col s2 khampha">
							<div class="">
								<h5><b>Khám phá</b></h5>
								<div class="collection">
									<a href="index.php?action=trangchu&loai=6" class="collection-item <?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==6){ echo 'activea'; } } ?>">Dành cho tôi</a>
									<a href="index.php?action=trangchu&loai=1" class="collection-item <?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==1){ echo 'activea'; } } ?>">Đồ ăn</a>
									<a href="index.php?action=trangchu&loai=2" class="collection-item <?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==2){ echo 'activea'; } } ?>">Đồ uống</a>
									<a href="index.php?action=trangchu&loai=3" class="collection-item <?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==3){ echo 'activea'; } } ?>">Lẩu, Nướng</a>
									<a href="index.php?action=trangchu&loai=4" class="collection-item <?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==4){ echo 'activea'; } } ?>">Nhà hàng</a>
									<a href="index.php?action=trangchu&loai=5" class="collection-item <?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==5){ echo 'activea'; } } ?>">Khách sạn</a>
								</div>
							</div>
						</div>
						<div class="col s10">
							<div class="row rowmenu2">
								<div class="col s12 ">
									<div class="menu2">
										<div></div>
										<ul>
											<?php if(isset($_SESSION['loai'])){ if($_SESSION['loai']==6){ ?>
												<li class="<?php if(isset($_SESSION['kieu'])){ if($_SESSION['kieu']==1){ echo 'active1'; } } ?>"><a href="index.php">Mới nhất</a></li>
												<li class="<?php if(isset($_SESSION['kieu'])){ if($_SESSION['kieu']==2){ echo 'active1'; } } ?>"><a href="index.php?action=trangchu&kieu=2">Gần tôi</a></li>
											<?php }else{ ?>
												<li class="active1"><a href="">Mới nhất</a></li>
											<?php } } ?>
											<li style="float: right;"><a class="modal-trigger"href="<?php if(isset($_SESSION['username'])){ echo "index.php?action=chucuahang";}else{ echo '#modal1'; } ?>">Dành cho chủ cửa hàng</a>
												<div id="modal1" class="modal">
													<div class="modal-content">
														<h6>Vui lòng đăng nhập để sử dụng chức năng này</h6>
													</div>
													<div class="modal-footer">
														<a href="#!" class="modal-close waves-effect waves-green btn-flat">Trở về</a>
														<a href="index.php?action=dangnhap" class="modal-close waves-effect waves-green btn-flat">Đăng nhập</a>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row danhsach results">
								<?php if(isset($_SESSION['kieu'])&&$_SESSION['kieu']==2){ ?>
									<div class="col s12" style="margin-top: 10px;">
										<div id="map" style="height: 460px; width: 100%;"></div>
										<?php if(isset($kq)) while($row= $kq->fetch_assoc()){ ?>
											<a class="motcuahang" style="display: none;" target="_blank" href="index.php?action=chitietquanan&id_quan=<?php echo $row["id_quan"] ?>">
												<div class="col s3">
													<div class="card">
														<div class="card-image">
															<img src="res/img/<?php echo $row["anh"] ?>">
															<span class="card-title"></span>
														</div>
														<div class="card-content">
															<h6><?php echo $row["tenquan"] ?></h6>
															<p><?php echo $row["diadiem"] ?></p>
														</div>
													</div>
												</div>
											</a>
										<?php } ?>
									</div>
								<?php }else{ ?>
									<?php while($row= $kq->fetch_assoc()){ ?>
										<div class="motcuahang" style="display: none;">
											<a target="_blank" href="index.php?action=chitietquanan&id_quan=<?php echo $row["id_quan"] ?>">
												<div class="col s3">
													<div class="card">
														<div class="card-image">
															<img src="res/img/<?php echo $row["anh"] ?>">
															<span class="card-title"></span>
														</div>
														<div class="card-content">
															<?php if(isset($_POST['timkiem'])){echo '<h6>'.$row['tenmon'].'</h6> <b>'.$row["tenquan"].'</b>';}else{echo '<h6>'.$row["tenquan"].'</h6>';} ?>

															<p><?php echo $row["diadiem"] ?></p>
														</div>
													</div>
												</div>
											</a>
										</div>
									<?php } } ?>
								</div>
								<a href="#" class="btn" id="loadMore">Load More</a>
								<p class="totop"> 
									<a class="btn backtotop" href="#"  style="">top</a> 
								</p>
								
							</div>
						</div>
					</div>
					<div class="col s1"></div>
				</div>
			</div>	
		</div>
		<div class="footer">
			<?php include 'view/footer.php'; ?>
		</div>
		<script type="text/javascript" src="res/js/bandocaccuahang.js"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7a9aOxSrO-0GIn6u3GlF0JJTlc5mgV_I&callback=initMap"></script>
		<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
		<script src="res/materialize/js/js.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="res/js/loadmore.js"></script>
	</body>
	</html>