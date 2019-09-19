<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>

	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/css.css">
	<link rel="stylesheet" type="text/css" href="res/css/quanlycuahang.css">
</head> 
<body>
	<div>
		<div class="menavbar">
			<?php require 'view/navbar.php'; ?>
		</div>
		<div class="allbody allbody-chitietquan">
			<?php if(isset($_SESSION['quyen']) && $_SESSION['quyen']!=1){ ?>
			<div class="guiphanhoi">
				<a id="btnphanhoi" class="waves-effect waves-light btn" href='#' data-target='dropdown1' ><i class="material-icons">message</i></a>
				<div  id="content">
					<div class="conten1">
						<div class="tap-target-content">
							<div>
								<form method="post">
									<h5>Hello!</h5>
									<p>Bạn có vấn đề gì muốn trao đổi với chúng tôi? Hãy nhập vào ô bên dưới!</p>
									<input type="text" name="noidungphanhoi" placeholder="Nhập thông tin phản hồi" autocomplete="off">
									<input style="float: right;" class="btn" type="submit" name="phanhoi" value="Gửi">
								</form>
							</div>
						</div>
					</div>
					<i class="material-icons" style="">arrow_drop_down</i>
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col s1">
				</div>
				<div class="col s10">
					<div class="row quanan">
						<?php while($row= $kq1->fetch_assoc()){ ?>
							<div class="col s5 chitietquanan">
								<img class="anhquan" src="res/img/<?php echo $row['anh'] ?>">
								<a href="#modalsuaanh" class="iconsuaanhdaidien waves-effect waves-light modal-trigger"><i class="material-icons">border_color</i></a>
							</div>
							<div class="col s7 thongtinquan">
								<h4><b><?php echo $row['tenquan'] ?></b></h4>
								<h6><b>Liên hệ:</b> <?php echo $row['sdt'] ?></h6>
								<p><?php echo $row['diadiem'] ?></p>
								<p><?php echo $row['mota']; ?></p>
								<input hidden="" id="vido" type="number" name="" value="<?php echo $row['vido'] ?>">
								<input hidden="" id="kinhdo" type="number" name="" value="<?php echo $row['kinhdo'] ?>">
							</div>
						<?php } ?>
						<div id="modalsuaanh" class="modal">
							<form method="post" action="" enctype="multipart/form-data">
								<div class="modal-content">
									<h4>Chọn ảnh</h4>
									<div class="file-field input-field">
										<br>
										<div class="btn">
											<span>Ảnh</span>
											<input type="file" name="file" required="required">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" name="">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Trở về</a>
									<input class="btn-flat" type="submit" value="Tải lên" name="doianhdaidien">
								</div>
							</form>				
							<!-- <a class="btnchiduong" href="">Tìm đường đến quán</a> -->
						</div>
					</div>
					<div class="row">
						<div class="col s2 menu-chitietquan">
							<ul class="ul1" >
								<li id="danhsachmon" class="li1"><a  href="#">Thực đơn</a></li>
								<li id="lstimg" class="li1"><a href="#">Ảnh</a></li>
								<li id="mapm" class="li1"><a href="#">Bản đồ</a></li>
								<li id="bldg" class="li1"><a href="#">Bình luận</a></li>
							</ul>
						</div>
						<div class="col s10 danhsachmon">
							<div class="danhsachmon1">
								<h4 class="titlethucdon" style="">&#160;&#160;Thực đơn</h4>
								<div class="scrolll" style="">
								
								<?php $dem=0;  while($row= $kq2->fetch_assoc()){ $dem++; ?>
									<div class="row thucdon">
										<div class="col s3 divanhmon">
											<img class="anhmon" src="res/img/<?php echo $row['anh'] ?>">
										</div>
										<div class=" col s9">
											<div class="row">
												<div class="col s9">
													<h5><?php echo $row['tenmon'] ?></h5>
													<p><?php echo $row['mota'] ?></p>
												</div>
												<div class="col s2">
													<h6 class="giatien"><?php echo number_format($row['giatien']) ?> đ</h6>
												</div>
												<div class="col s1">
													<form method="post">
														<input hidden type="text" name="id_monan" value="<?php echo $row['id_monan'] ?>">
														<button style="margin-top: 20px; border-radius: 5px;" type="submit" name="xoathucdon" onclick="return confirm('Bạn có muốn xoá thực đơn không')"><i class="material-icons">clear</i></button>
													</form></div>
												</div>
											</div>
										</div>
									<?php } ?>
									<?php if($dem==0){ echo '<div class="row thucdon"><p>Chưa cập nhật thực đơn</p><br/></div>'; } ?>
									</div>
									<div class="row thucdon">
										<br/>
										<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Thêm thực đơn</a>
										<p></p>
										<div id="modal1" class="modal">
											<form method="post" enctype="multipart/form-data">
												<div class="modal-content">
													<div class="row">
														<div class="col s3">
															<div class="file-field input-field" style="float: left; margin-left: 10px;">
																<div class="btn">
																	<span>Ảnh</span>
																	<input type="file" name="file">
																</div>
																<div class="file-path-wrapper" style="float: left;">
																	<input style="width: 120px; " class="file-path validate" type="text" name="">
																</div>
															</div>
														</div>
														<div class=" col s9">
															<div class="row">
																<div class="col s10">
																	<input type="text" name="tenmon" placeholder="Nhập tên món" autocomplete="off" required="required">
																	<input type="text" name="mota" placeholder="Nhập mô tả" autocomplete="off">
																</div>
																<div class="col s2">
																	<input type="number" name="giatien" placeholder="Nhập giá" autocomplete="off" required="required"> 
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Trở về</a>
													<!-- <input class="btn-flat" type="button" name="" value="Trở về"> -->
													<input class="btn-flat" type="submit" name="themthucdon" value="Tải lên">
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="row lstimg">
									<h4 class="titlethucdon" style="">&#160;Ảnh</h4>
									<div class="scrolll" style="">
									<?php while($row= $kq4->fetch_assoc()){ ?>
										<div class="col s3 itemimg">
											<img class="img materialboxed" src="res/img/<?php echo $row['name'] ?>" alt="">
										</div>
									<?php } ?>
									</div>
									<div class="col s3 themimg">
										<div class="itemimg">
											<a class="waves-effect waves-light modal-trigger" href="#modal2">thêm mới</a>
											<div id="modal2" class="modal">
												<form method="post" action="" enctype="multipart/form-data">
													<div class="modal-content">
														<h4>Chọn ảnh</h4>
														<div class="file-field input-field">
															<br>
															<div class="btn">
																<span>Ảnh</span>
																<input type="file" name="file" required="required">
															</div>
															<div class="file-path-wrapper">
																<input class="file-path validate" type="text" name="">
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Trở về</a>
														<input class="btn-flat" type="submit" value="Tải lên" name="upanh">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div> 
								<div id="map" style="height: 460px; width: 100%; margin-top: 20px;">
									<!-- <a style="position: absolute; left: 10px; bottom: 10px; z-index: 8;" href="#modaldoivitri" class="iconsuaanhdaidien waves-effect waves-light modal-trigger"><i class="material-icons">border_color</i></a>
									<div id="modaldoivitri" class="modal">
										<form method="post" action="" enctype="multipart/form-data">
											<div class="modal-content">
												<h4>Chọn vị trí</h4>
												<div class="file-field input-field">

												</div>
											</div>
											<div class="modal-footer">
												<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Trở về</a>
												<input class="btn-flat" type="submit" value="Tải lên" name="upanh">
											</div>
										</form>
									</div> -->
								</div>
								<div class="row bldg">
									<div class="col s8 lstbinhluan" style="height: 499px;">
										<h4 class="titlebinhluan" style=""> Bình luận</h4>
										<div id="scroll" class="scroll">
											<table id="tblbinhluan">
												<?php while($row= $kq3->fetch_assoc()){ ?>
													<tr class="collection">
													<td class="tdbinhluan">
														<p>Tên : <b> <?php echo $row['username'] ?> </b> | Thời gian : <b> <?php echo $row['ngay'] ?> </b></p>
														<p>Nội dung: <?php echo $row['noidung'] ?></p> 
													</td>
												</tr>
												<?php } ?>
											</table>
										</div>	
									</div>
									<div class=" col s4 lstdanhgia">
										<h4 class="titlebinhluan" style="">Đánh giá</h4>
										<div>
										<ul>
											<li>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<span class="sldanhgia">(<?php echo $tv; ?>)</span>
											</li>
											<li>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<span class="sldanhgia">(<?php echo $tot; ?>)</span>
											</li>
											<li>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<span class="sldanhgia">(<?php echo $kha; ?>)</span>
											</li>
											<li>
												<i class="material-icons i-star">star</i>
												<i class="material-icons i-star">star</i>
												<span class="sldanhgia">(<?php echo $tb; ?>)</span>
											</li>
											<li>
												<i class="material-icons i-star">star</i>
												<span class="sldanhgia">(<?php echo $kem; ?>)</span>
											</li>
										</ul>
									</div>
									</div>
								</div>
							</div>
							

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col s1">
			
		</div>
	</div>
	<div class="footer">
		<?php include 'view/footer.php'; ?>
	</div>
</div>	
</div>
<script type="text/javascript" src="res/js/hienthivitrilenbando.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7a9aOxSrO-0GIn6u3GlF0JJTlc5mgV_I&callback=initMap">
</script>
<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
<script src="res/materialize/js/js.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="res/js/clicktoscroll.js"></script>
</body>
</html>