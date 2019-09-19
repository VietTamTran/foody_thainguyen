<div class="row">
	<div class="col s4 ngang">
		<div class="container container1 con1" style="">
			<i class="material-icons icon1" style="">account_circle</i>
			<div class="txt1" style="">
				<p class="p1" style="">Quản trị viên</p>
				<p><?php if(isset($_SESSION['getalladmin'])){ echo $_SESSION['getalladmin']; } ?></p>
			</div>
		</div>
		
	</div>
	<div class="col s4 ngang">
		<div class="container container1 con2" style="">
			<i class="material-icons icon1" style="">account_circle</i>
			<div class="txt1" style="">
				<p class="p1" style="">Chủ cửa hàng</p>
				<p><?php if(isset($_SESSION['getallchucuahang'])){ echo $_SESSION['getallchucuahang']; } ?></p>
			</div>
		</div>
		
	</div>
	<div class="col s4 ngang">
		<div class="container container1 con3" style="">
			<i class="material-icons icon1" style="">account_circle</i>
			<div class="txt1" style="">
				<p class="p1" style="">Khách hàng</p>
				<p><?php if(isset($_SESSION['getallkhachhang'])){ echo $_SESSION['getallkhachhang']; } ?></p>
			</div>
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col s4 ngang">
		<div class="container container1 con4" style="">
			<i class="material-icons icon1" style="">location_on</i>
			<div class="txt1" style="">
				<h4 style="">Địa điểm</h4>
				<p><?php if(isset($_SESSION['getalldiadiem'])){ echo $_SESSION['getalldiadiem']; } ?></p>
			</div>
		</div>
		
	</div>
	<div class="col s4 ngang">
		<div class="container container1 con5" style="">
			<i class="material-icons icon1" style="">star_half</i>
			<div class="txt1" style="">
				<h4 style="">Đánh giá</h4>
				<p><?php if(isset($_SESSION['getalldanhgia'])){ echo $_SESSION['getalldanhgia']; } ?></p>
			</div>
		</div>
		
	</div>
	<div class="col s4 ngang">
		<div class="container container1 con6" style="">
			<i class="material-icons icon1" style="">photo_library</i>
			<div class="txt1" style="">
				<h4 style="">Ảnh</h4>
				<p><?php if(isset($_SESSION['getallimg'])){ echo $_SESSION['getallimg']; } ?></p>
			</div>
		</div>
		
	</div>
</div>
<br>