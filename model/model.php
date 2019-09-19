<?php  
	
	class database
	{
		public $conn;
		//Hàm kết nối.
		public function __construct()
		{
			$this->conn = new mysqli("localhost", "root", "", "foody_thainguyen") or die("Loi ket noi");
			$this->conn->set_charset("UTF8");
		}

		//Lấy ID của quán ăn
		public function getidquan($id_user){
			$sql= "SELECT * FROM quanan WHERE id_user=$id_user";
			
			$kq=$this->conn->query($sql);
			while($row=$kq->fetch_array()){
				$_SESSION['id_quan']=$row['id_quan'];
			}

			//var_dump($kq->num_rows); die();
			if($kq->num_rows>0){
				
				return true;
			}else{
				return false;
			}
		}

		//Lấy thông tin quán ăn.
		public function getthongtinquanan($id_quan){
			$sql= "SELECT * FROM quanan WHERE id_quan=$id_quan";
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//Lấy thông tin các món ăn của 1 quán.
		public function getmonan($id_quan){
			$sql= "SELECT * FROM monan WHERE id_quan=$id_quan";
			$kq= $this->conn->query($sql);
			//var_dump($sql); die();	
			return $kq;
		}

		//lấy cmt của 1 quán.
		public function getcmt($id_quan){
			$sql= "SELECT * FROM binhluan WHERE id_quan=$id_quan";
			$kq= $this->conn->query($sql);
			//var_dump($sql); die();	
			return $kq;
		}

		//lấy ảnh của 1 quán.
		public function getimg($id_quan){
			$sql= "SELECT * FROM img WHERE id_quan=$id_quan";
			$kq= $this->conn->query($sql);
			//var_dump($sql); die();	
			return $kq;
		}

		//lấy đánh giá của 1 quán.
		public function getdanhgia($id_quan){
			$sql= "SELECT * FROM danhgia WHERE id_quan='$id_quan'";
			$kq= $this->conn->query($sql);
			//var_dump($sql); die();	
			return $kq;
		}

		//Đăng nhập.
		public function dangnhap($username, $password){
			$sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			while($row=$kq->fetch_array()){
				$_SESSION['id_user']=$row['id_user'];
				$_SESSION['username']=$row['username'];
				//var_dump($_SESSION['id_user']); die();
				$_SESSION['quyen']=$row['quyen'];
			}


			if($kq->num_rows>0){
				
				return true;
			}else{
				return false;
			}
		}

		//Thay ảnh đại diện của 1 user.
		public function themanhdaidien($id_user, $name){
			$sql="UPDATE `user` SET `anhdaidien`='$name' WHERE id_user=$id_user";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);

		}

		//Thêm ảnh vào danh sách ảnh của 1 quán ăn
		public function themanhquan($id_quan ,$name){
			$sql="INSERT INTO `img`( `name`, `id_quan`) VALUES ('$name','$id_quan')";
			$kq=$this->conn->query($sql);
		}

		//Thêm 1 thực đơn vào danh sách thực đơn của 1 quán ăn.
		public function themthucdon($id_quan, $name, $tenmon, $mota, $giatien){
			$sql="INSERT INTO `monan`(`id_quan`, `tenmon`, `giatien`, `mota`, `anh`) VALUES ('$id_quan','$tenmon','$giatien','$mota','$name')";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
		}

		//Thêm bình luận về 1 quán ăn.
		public function thembinhluan($id_quan, $noidung, $username, $ngay){
			$sql="INSERT INTO `binhluan`(`id_quan`, `username`, `noidung`, `ngay`) VALUES ('$id_quan','$username','$noidung','$ngay')";
			$kq=$this->conn->query($sql);
		}

		//Đăng ký làm chủ cửa hàng.
		public function dangkychucuahang($tencuahang, $diachi, $mota, $loai, $email, $sodienthoai, $anh, $vido, $kinhdo,$check, $id_user){
			$sql="INSERT INTO `quanan`(`tenquan`, `diadiem`, `mota`, `loai`, `email`, `sdt`, `anh`, `vido`, `kinhdo`, `kiemtra`, `id_user`) VALUES ('$tencuahang','$diachi','$mota','$loai','$email','$sodienthoai','$anh','$vido','$kinhdo','$check','$id_user')";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
		}

		//Thay đổi trạng thái của cửa hàng(Đóng, Mở)
		public function doitrangthai($id_quan, $kiemtra){
			$sql="UPDATE `quanan` SET `kiemtra`='$kiemtra' WHERE id_quan=$id_quan";
			$this->conn->query($sql);
			$sql1="SELECT user.*, quanan.* FROM user, quanan WHERE id_quan=$id_quan AND user.id_user=quanan.id_user";
			
			$kq=$this->conn->query($sql1);
			while ($row=$kq->fetch_array()) {
				
				if($row['quyen']==1){
					$quyen=1;
					$id_user=$row['id_user'];
				}else{
					$quyen=2;
					$id_user=$row['id_user'];
				}
				
			}
			$sql2="UPDATE `user` SET `quyen`='$quyen' WHERE id_user=$id_user";
			//var_dump($sql2); die();
			$kq=$this->conn->query($sql2);
			//var_dump($sql); die();
			
		}

		//Lấy ra thông tin cá nhân của 1 user.
		public function trangcanhan($id_user){
			$sql="SELECT * FROM user WHERE id_user='$id_user'";
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//usre sửa thông tin cá nhân của mình
		public function suathongtincanhan($id_user, $username, $hovaten, $email, $sdt, $ngaysinh, $gioitinh){
			$sql="UPDATE `user` SET `username`='$username',`hovaten`='$hovaten',`ngaysinh`='$ngaysinh',`gioitinh`='$gioitinh',`email`='$email',`sdt`='$sdt' WHERE `id_user`= $id_user";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
		}

		//user sửa mật khẩu của mình.
		public function suamatkhau($id_user, $matkhaumoi){
			$sql="UPDATE `user` SET `password`='$matkhaumoi' WHERE `id_user`= $id_user";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
		}

		//Quản trị viên(Admin) Xoá một tài khoản có trong hệ thống.
		public function xoataikhoan($id_user){
			$sql="SELECT * FROM user WHERE id_user=$id_user";
			$kq= $this->conn->query($sql);
			while($row=$kq->fetch_array()){
				$quyen=$row['quyen'];
			}
			if($quyen==3){
				$sql1 = "DELETE FROM `danhgia` WHERE id_user=$id_user";
				$sql2 = "DELETE FROM `user` WHERE id_user=$id_user";
				$this->conn->query($sql1);
				$this->conn->query($sql2);
			}else{
				$sql="SELECT * FROM `quanan` WHERE id_user=$id_user";
				$kq1=$this->conn->query($sql);
				while($row=$kq1->fetch_array()){
					$id_quan=$row['id_quan'];
				}
				$sql1="DELETE FROM `img` WHERE id_quan=$id_quan";
				$sql2="DELETE FROM `danhgia` WHERE id_quan=$id_quan";
				$sql3="DELETE FROM `monan` WHERE id_quan=$id_quan";
				$sql4="DELETE FROM `binhluan` WHERE id_quan=$id_quan";
				$sql5="DELETE FROM `quanan` WHERE id_quan=$id_quan";
				$sql6="DELETE FROM `user` WHERE id_user=$id_user";
				//var_dump($id_quan); die();
				$this->conn->query($sql1);
				$this->conn->query($sql2);
				$this->conn->query($sql3);
				$this->conn->query($sql4);
				$this->conn->query($sql5);
				$this->conn->query($sql6);
			}
		}
		
		//Thay đổi quyền của user sau khi xoá cửa hàng của user làm quản trị viên cửa hàng.
		public function kiemtracuahang($id_quan){
			$sql="SELECT quanan.*, user.* FROM quanan, user WHERE quanan.id_user=user.id_user AND id_quan=$id_quan";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			while ($row= $kq->fetch_array()) {
				if($row['quyen']==2){
					$id_user=$row['id_user'];
					//var_dump($id_user); die();
					$sql="UPDATE `user` SET `quyen`='3' WHERE id_user=$id_user";
					$kq=$this->conn->query($sql);
				}
			}
		}

		//Admin Xoá một cửa hàng có trong hệ thống.
		public function xoacuahang($id_quan){
			$sql1="DELETE FROM `img` WHERE id_quan=$id_quan";
			$sql2="DELETE FROM `danhgia` WHERE id_quan=$id_quan";
			$sql3="DELETE FROM `monan` WHERE id_quan=$id_quan";
			$sql4="DELETE FROM `binhluan` WHERE id_quan=$id_quan";
			$sql5="DELETE FROM `quanan` WHERE id_quan=$id_quan";
			$this->conn->query($sql1);
			$this->conn->query($sql2);
			$this->conn->query($sql3);
			$this->conn->query($sql4);
			$this->conn->query($sql5);
		}

		//Lấy tên ảnh của thực đơn để xoá ảnh của thực đơn có trong csdl.
		public function thongtinthucdoncanxoa($id_monan){
			$sql="SELECT * FROM `monan` WHERE id_monan=$id_monan";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Xoá thực đơn của 1 cửa hàng.
		public function xoathucdon($id_monan){
			$sql="DELETE FROM `monan` WHERE id_monan=$id_monan";
			//var_dump($sql); die();
			$this->conn->query($sql);
		}

		//Lưu phản hồi của khách hàng và chủ cửa hàng gửi đến admin.
		public function phanhoi($id_quan, $id_user, $noidung){
			$sql="INSERT INTO `phanhoi`(`id_user`, `id_quan`, `noidung`, `kiemtra`) VALUES ('$id_user','$id_quan','$noidung','0')";
			//var_dump($sql); die();
			$this->conn->query($sql);
		}

		//Đổi ảnh đại diện của 1 quán ăn.
		public function doianhquan($id_quan, $name){
			$sql="UPDATE `quanan` SET `anh`='$name' WHERE id_quan=$id_quan";
			$this->conn->query($sql);
		}

		//kiểm tra xem user của khách hàng mới đăng ký đã tồn tại hay chưa.
		public function checkuser($username){
			$sql="SELECT * FROM user WHERE username='$username'";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);

			if($kq->num_rows>0){
				return true;
			}else{
				return false;
			}
		}

		//một user đăng ký tài khoản mới.
		public function dangky($username, $name, $password1, $email, $sodienthoai, $ngaysinh, $gioitinh, $anhdaidien, $quyen){
			$sql="INSERT INTO `user`(`username`, `password`, `hovaten`, `ngaysinh`, `gioitinh`, `email`, `sdt`, `anhdaidien`, `quyen`) VALUES ('$username','$password1','$name','$ngaysinh','$gioitinh','$email','$sodienthoai','$anhdaidien','$quyen')";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
		}

		//Lấy ra tất cả admin để admin thống kê.
		public function getalladmin(){
			$sql="SELECT * FROM user WHERE quyen=1";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả chủ cửa hàng để admin thống kê.
		public function getallchucuahang(){
			$sql="SELECT * FROM user WHERE quyen=2";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả khách hàng để admin thống kê.
		public function getallkhachhang(){
			$sql="SELECT * FROM user WHERE quyen=3";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả địa điểm để admin thống kê.
		public function getalldiadiem(){
			$sql="SELECT * FROM quanan, user WHERE quanan.id_user=user.id_user";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả đánh giá để admin thống kê.
		public function getalldanhgia(){
			$sql="SELECT * FROM danhgia";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả ảnh để admin thống kê.
		public function getallimg(){
			$sql="SELECT * FROM img";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả các quán ăn đang hoạt động trên hệ thống.
		public function getallquanan($adminactive){
			$sql="SELECT * FROM quanan, user WHERE quanan.id_user=user.id_user AND kiemtra =$adminactive";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return$kq;
		}

		//Lấy ra tất cả các quán ăn theo loại cho admin.
		public function admingetquanan($adminloai){
			$sql= "SELECT * FROM quanan, user WHERE quanan.id_user=user.id_user AND loai=$adminloai AND kiemtra=1";
			//var_dump($sql);die();
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả các quán ăn theo loại cho khách hàng.
		public function getquanan($loai){
			$sql= "SELECT * FROM quanan, user WHERE quanan.id_user=user.id_user AND loai=$loai AND kiemtra=1";
			// $sql= "SELECT * FROM  quanan WHERE  loai=$loai AND kiemtra=1";
			//var_dump($sql);die();
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//Lấy ra tất cả các cửa hàng đề xuất cho khách hàng.
		public function khgetalldiadiem($kiemtra){
			$sql= "SELECT * FROM quanan WHERE  kiemtra=$kiemtra ORDER BY id_quan DESC";
			//var_dump($sql);die();
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//Lấy ra các cửa hàng ở gần vị trí của khách hàng.
		public function getdiadiemchomap($kiemtra, $lat, $lng){
			$sql = "SELECT *, ( 6371 * acos( cos( radians(" . $this->conn->real_escape_string($lat) . ") ) * cos( radians( vido ) ) * cos( radians( kinhdo ) - radians(" . $this->conn->real_escape_string($lng) . ") ) + sin( radians(" . $this->conn->real_escape_string($lat) . ") ) * sin( radians( vido ) ) ) ) AS distance FROM quanan HAVING distance < 1 AND kiemtra=$kiemtra";
			// $sql= "SELECT * FROM quanan WHERE  kiemtra=$kiemtra";
			//var_dump($sql); 
			$kq= $this->conn->query($sql);

				//lưu các vị trí lấy được vào 1 file XML
				$dom = new DOMDocument("1.0","UTF-8");
				$node = $dom->createElement("markers");
				$parnode = $dom->appendChild($node);
				while ($row =$kq->fetch_assoc()){
				  // Add to XML document node
				  $node = $dom->createElement("marker");
				  $newnode = $parnode->appendChild($node);
				  $newnode->setAttribute("id",$row['id_quan']);
				  $newnode->setAttribute("name",$row['tenquan']);
				  $newnode->setAttribute("address", $row['diadiem']);
				  $newnode->setAttribute("lat", $row['vido']);
				  $newnode->setAttribute("lng", $row['kinhdo']);
				  $newnode->setAttribute("type", $row['loai']);
				}
				// $test= $dom->saveXML();
				// echo(htmlspecialchars($test));
				$dom->save('res/DOM/DOMquanan.xml'); //Lưu vào file. 
			// $sql= "SELECT * FROM quanan WHERE  kiemtra=$kiemtra";
			// var_dump($sql);die();
			// $kq= $this->conn->query($sql);
			// return $kq;
		}

		public function getdiadiemchomap1($kiemtra, $lat, $lng){
			$sql = "SELECT *, ( 6371 * acos( cos( radians(" . $this->conn->real_escape_string($lat) . ") ) * cos( radians( vido ) ) * cos( radians( kinhdo ) - radians(" . $this->conn->real_escape_string($lng) . ") ) + sin( radians(" . $this->conn->real_escape_string($lat) . ") ) * sin( radians( vido ) ) ) ) AS distance FROM quanan HAVING distance < 1 AND kiemtra=$kiemtra";
			// $sql= "SELECT * FROM quanan WHERE  kiemtra=$kiemtra";
			//var_dump($sql); 
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//chủ cửa hàng lấy thông tin quán mình sở hữu.
		public function cchgetthongtinquan($id_user){
			$sql= "SELECT * FROM quanan WHERE id_user=$id_user";
			
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//khách hàng tìm kiếm.
		public function timkiem($noidungtimkiem){
			$sql = "SELECT quanan.*, monan.* FROM quanan, monan WHERE quanan.id_quan=monan.id_quan AND (tenquan LIKE '%$noidungtimkiem%' OR diadiem LIKE '%$noidungtimkiem%' OR tenmon LIKE '%$noidungtimkiem%') ORDER BY tenquan";
			//var_dump($sql); die();
			$kq = $this->conn->query($sql);
			
			//var_dump($kq);die();
			return $kq;
		}
		// public function timkiem($noidungtimkiem){
		// 	$sql1 = "SELECT * FROM quanan WHERE (tenquan LIKE '%$noidungtimkiem%' OR diadiem LIKE '%$noidungtimkiem%') ORDER BY tenquan";
		// 	//var_dump($sql); die();
		// 	$kq1 = $this->conn->query($sql1);
		// 	$sql2 = "SELECT * FROM monan WHERE (tenmon LIKE '%$noidungtimkiem%') ORDER BY tenmon";
		// 	//var_dump($sql); die();
		// 	$kq2 = $this->conn->query($sql2);
		// 	//var_dump($kq1); die();
		// 	$kq3;
		// 	while ($row=$kq1->fetch_array()) {
		// 		// var_dump($row);die();
		// 		$kq3[]= $row;
		// 	}

		// 	while ($row=$kq2->fetch_array()) {
		// 		// var_dump($row);die();
		// 		$kq3[]= $row;
		// 	}
			
		// 	//var_dump($kq3[0]);

		// 	return $kq3;
		// }

		//kiểm tra xem 1 user đã đánh giá cho 1 cửa hàng nào đó chưa.
		public function kiemtradanhgia($id_quan,$id_user){
			$sql="SELECT * FROM danhgia WHERE id_user='$id_user' AND id_quan='$id_quan'";
			//var_dump($sql); die();
			$kq=$this->conn->query($sql);
			return $kq;
		}

		//Nếu một user đã đánh giá cho cửa hàng này thì sửa đánh giá cho user đó.
		public function suadanhgia($id_danhgia, $danhgia){
			$sql="UPDATE `danhgia` SET `danhgia`='$danhgia' WHERE id_danhgia=$id_danhgia";
			//var_dump($sql); die();
			$this->conn->query($sql);
		}

		//để user đánh giá cho một cửa hàng mà user chưa từng đánh giá.
		public function themdanhgia($id_quan, $danhgia, $id_user){
			$sql="INSERT INTO `danhgia`( `id_user`, `id_quan`, `danhgia`) VALUES ('$id_user','$id_quan','$danhgia')";
			//var_dump($sql); die();
			$this->conn->query($sql);
		}

		//admin kiểm tra xem có phản hồi mới nào chưa đọc hay không.
		public function ktphanhoi($ktphanhoi){
			$sql="SELECT * FROM phanhoi WHERE kiemtra=$ktphanhoi";
			//var_dump($sql); die();
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//lấy ra các phản hồi từ khách hàng và chủ cửa hàng.
		public function getphanhoi(){
			$sql="SELECT * FROM phanhoi";
			//var_dump($sql); die();
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//đánh dấu là admin đã xem phản hồi này.
		public function danhdaudaxemphanhoi(){
			$sql="UPDATE `phanhoi` SET `kiemtra`='1'";
			//var_dump($sql); die();
			$this->conn->query($sql);
		}

		public function xoaphanhoi($id_phanhoi){
			$sql="DELETE FROM `phanhoi` WHERE `id_phanhoi`='$id_phanhoi'";
			//var_dump($sql); die();
			$this->conn->query($sql);
		}

		//admin tìm kiếm tài khoản có trong hệ thống.
		public function timtaikhoan($timkiem){
			$sql="SELECT * FROM user WHERE id_user like '$timkiem' OR hovaten like '%$timkiem%' OR email like '$timkiem' OR sdt like '$timkiem' OR username like '$timkiem'";
			//var_dump($sql); die();
			$kq= $this->conn->query($sql);
			return $kq;
		}

		//admin tìm cửa hàng có trong hệ thống.
		public function timcuahang($timkiem){
			$sql="SELECT quanan.*, user.username FROM quanan, user WHERE user.id_user=quanan.id_user AND (id_quan like '$timkiem' OR tenquan like '%$timkiem%')";
			//var_dump($sql); die();
			$kq= $this->conn->query($sql);
			return $kq;
		}
	}
?>