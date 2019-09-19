<!DOCTYPE html>
<html>
<head>
	<title>Food&Drink</title>

	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/css.css">
</head>
<body>
	<div>
		<div class="menavbar">
			<?php require 'view/navbar.php'; ?>
		</div>
		<div class="allbody allbody-chitietquan" style="">
			<?php if(isset($_SESSION['id_user'])){ ?>
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
				<div class="col s1"></div>
				<div class="col s10">
					<div class="row quanan">
						<?php while($row= $kq1->fetch_assoc()){ ?>
							<div class="col s5 chitietquanan">
								<img  class="anhquan" src="res/img/<?php echo $row['anh'] ?>">
							</div>
							<div class="col s7 thongtinquan">
								<h4><b><?php echo $row['tenquan'] ?></b></h4>
								<h6><b>Liên hệ:</b> <?php echo $row['sdt'] ?></h6>
								<p><?php echo $row['diadiem'] ?></p>
								<p><?php echo $row['mota']; ?></p>
								<input hidden="" id="vido" type="number" name="" value="<?php echo $row['vido'] ?>">
								<input hidden="" id="kinhdo" type="number" name="" value="<?php echo $row['kinhdo'] ?>">
							</div>
						<?php $vido=$row['vido']; $kinhdo=$row['kinhdo'];} ?>
						<!-- <div>
							<a class="btnchiduong" href="">Tìm đường đến quán</a>
						</div> -->
					</div>
					<div class="row">
						<div class="col s2 menu-chitietquan" style=" ">
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
												<div class="col s10">
													<h5><?php echo $row['tenmon'] ?></h5>
													<p><?php echo $row['mota'] ?></p>
												</div>
												<div class="col s2">
													<h6 class="giatien"><?php echo number_format($row['giatien']) ?> đ</h6>
												</div>
											</div>


										</div>
									</div>
								<?php } ?>
								<?php if($dem==0){ echo '<p style="margin: 10px;">Chưa cập nhật thực đơn</p>'; } ?>
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
										<a class="waves-effect waves-light modal-trigger" href="#modal1">thêm mới</a>
										<div id="modal1" class="modal">
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
							<div class="bando">
								<h4 class="titlethucdon">Bản đồ</h4>
								<div id="map" style="height: 460px; width: 100%;"></div>
								<a class="linkmap" target="_blank" href="https://www.google.com/maps/place/<?php echo $vido.','.$kinhdo; ?>">Đi đến địa điểm này</a>
							</div>
							<div class="row bldg">
								<div class="col s8 lstbinhluan">
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
										<?php if(isset($_SESSION['username'])){ ?>
										<form method="post">
											<input type="text" name="noidung" placeholder="Viết bình luận.." autocomplete="off" required="required">
											<input class="btn" type="submit" name="cmt" value="Bình luận">
										</form>
										<?php }else{ ?>
											<br>
											<h6>Bạn cần <a href="index.php?action=dangnhap">đăng nhâp</a> để bình luận.</h6>
										<?php } ?>
								</div>
								<div class=" col s3 lstdanhgia">
									<h4 class="titlebinhluan" style="">Đánh giá</h4>
									<div class="stars">
										<?php if(isset($_SESSION['username'])){ ?>
											<form method="post" style="height: 30px;">
												<div style="width: 72%; float: left;"> 
												<label>
													<input id="a1" required="required" class="a-star a-star1" type="radio" name="sao" value="5">
													<i id="s1" class="material-icons a-star">star</i>
												</label>
												<label>
													<input id="a2" required="required" class="a-star a-star2" type="radio" name="sao" value="4">
													<i id="s2" class="material-icons a-star">star</i>
												</label>
												<label>
													<input id="a3" required="required" class="a-star a-star3" type="radio" name="sao" value="3">
													<i id="s3" class="material-icons a-star">star</i>
												</label>
												<label>
													<input id="a4" required="required" class="a-star a-star4" type="radio" name="sao" value="2">
													<i id="s4" class="material-icons a-star">star</i>
												</label>
												<label>
													<input id="a5" required="required" class="a-star a-star5" type="radio" name="sao" value="1">
													<i id="s5" class="material-icons a-star">star</i>
												</label>
											</div>
												<label class="labelbtndanhgia">
													<input class="btndanhgia" type="submit" value="Đánh giá" name="danhgia">
												</label>
											</form>
											<script type="text/javascript">
												// $(document).ready(function () {
												// 	var a = [$('#a1'),];
												// });
												//console.log('123');
													
													
											</script>
										<?php }else{ ?>
											<p>Bạn chưa <a href="index.php?action=dangnhap">đăng nhập</a></p>
										<?php } ?>
									</div>
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
									<!-- <table>
										<tbody>
											<tr>
												<td class="tv">Tuyệt vời</td>
												<td class="tv"><?php echo $tv; ?></td>
											</tr>
											<tr>
												<td class="kha">Khá tốt</td>
												<td class="kha"><?php echo $kha; ?></td>
											</tr>
											<tr>
												<td class="tb">Trung bình</td>
												<td class="tb"><?php echo $tb; ?></td>
											</tr>
											<tr>
												<td class="kem">Kém</td>
												<td class="kem"><?php echo $kem; ?></td>
											</tr>
										</tbody>
									</table> -->
									<!-- <input <?php if(!isset($_SESSION['username'])) echo"disabled"; ?> class="btndanhgia btn modal-trigger" type="button" data-target="modal2" value="Đánh giá">
									<div id="modal2" class="modal">
										<form method="post">
											<div class="modal-content">
												<h4 class="star">Đánh giá</h4>
												<ul>
													<li class="lidanhgia" style="">
														<label>
															<input class="star" class="with-gap" name="valdanhgia" type="radio" value="4" />
															<span class="star">Kém</span>
														</label>
													</li>
													<li class="lidanhgia">
														<label>
															<input class="star" class="with-gap" name="valdanhgia" type="radio" value="3" />
															<span class="star">Trung bình</span>
														</label>
													</li>
													<li class="lidanhgia">
														<label>
															<input class="star" class="with-gap" name="valdanhgia" type="radio" value="2" />
															<span class="star">Khá tốt</span>
														</label>
													</li>
													<li class="lidanhgia">
														<label>
															<input class="star" class="with-gap" name="valdanhgia" type="radio" value="1" />
															<span class="star">Tuyệt vời</span>
														</label>
													</li>
												</ul>
											</div>
											<div class="modal-footer">
												<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Trở về</a>
												<input class="btn-flat" type="submit" value="Đánh giá" name="danhgia">
											</div>
										</form>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col s1"></div>
	<div class="footer">
		<?php include 'view/footer.php'; ?>
	</div>
	<script type="text/javascript" src="res/js/hienthivitrilenbando.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7a9aOxSrO-0GIn6u3GlF0JJTlc5mgV_I&callback=initMap">
	</script>
	<script type="text/javascript" src="res/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="res/materialize/js/materialize.min.js"></script>
	<script src="res/materialize/js/js.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="res/js/clicktoscroll.js"></script>
	<?php if(isset($_SESSION['id_user'])){ ?>
		<script type="text/javascript" src="res/js/stylestar.js"></script>
	<?php } ?>
</body>
</html>