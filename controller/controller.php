<?php  
	require 'model/model.php';
	class controller
	{
		public $model;
		public function __construct()
		{
			$this->model= new database();
		}//khỏi tạo

		//điều hướng cho trang chủ.
		public function trangchu(){
		 // 	echo $lat=$_POST['lat'];		
			// echo $lng=$_POST['lng'];
			//var_dump($lat); die();
			if(isset($_SESSION['lat'], $_SESSION['lng'])){
				$lat=$_SESSION['lat'];
				$lng=$_SESSION['lng'];
				//var_dump($lat); die();
				unset($_SESSION['lat'], $_SESSION['lng']);
			}
			if(isset($_SESSION['username'])&&$_SESSION['quyen']==1){
				$this->adminquantri();
			}else{
				$loai=6;
				$_SESSION['kieu']=1;
				if(isset($_GET['loai'])){
					$loai=$_GET['loai'];
				}
				if($loai==1){
					$loai=1;
					$_SESSION['loai']=$loai;
					$kq=$this->model->getquanan($loai);
					include 'view/khachhang/trangchu.php';
				}else
				if($loai==2){
					$loai=2;
					$_SESSION['loai']=$loai;
					$kq=$this->model->getquanan($loai);
					include 'view/khachhang/trangchu.php';
				}else
				if($loai==3){
					$loai=3;
					$_SESSION['loai']=$loai;
					$kq=$this->model->getquanan($loai);
					include 'view/khachhang/trangchu.php';
				}else
				if($loai==4){
					$loai=4;
					$_SESSION['loai']=$loai;
					$kq=$this->model->getquanan($loai);
					include 'view/khachhang/trangchu.php';
				}else
				if($loai==5){
					$loai=5;
					$_SESSION['loai']=$loai;
					$kq=$this->model->getquanan($loai);
					include 'view/khachhang/trangchu.php';
				}else
				if(isset($_POST['timkiem'])){
					$noidungtimkiem=$_POST['noidungtimkiem'];
					//var_dump($noidungtimkiem); die();
					$kq= $this->model->timkiem($noidungtimkiem);
					$loai=6;
					$_SESSION['loai']=$loai;
					include 'view/khachhang/trangchu.php';
				}else
				if(isset($_GET['kieu'])&&$_GET['kieu']==2){
					$loai=6;
					$_SESSION['kieu']=2;
					$kiemtra=1;
					if (isset($lat, $lng)) {
						$kq=$this->model->getdiadiemchomap1($kiemtra, $lat, $lng);
					}
					include 'view/khachhang/trangchu.php';
				}
				else{
					if($loai==6){
						$loai=6;
						$_SESSION['loai']=$loai;
						$kiemtra=1;
						$kq=$this->model->khgetalldiadiem($kiemtra);
						include 'view/khachhang/trangchu.php';
					}

				}
			}
		}

		//lấy thống tin các của hàng ở gần vị trí ng dùng.
		public function ajax(){
			echo $lat=$_POST['lat'];		
			echo $lng=$_POST['lng'];
			$_SESSION['lat']=$lat;
			$_SESSION['lng']=$lng;
			$kiemtra=1;
			$kq=$this->model->getdiadiemchomap($kiemtra, $lat, $lng);
		}

		//điều hướng trang chi tiết cửa hàng cho người dùng là khách hàng.
		public function chitietquanan(){
			$id_quan=$_GET["id_quan"];
			if(isset($_POST['phanhoi'])){
				if(isset($_SESSION['username'])){
					$noidung=$_POST['noidungphanhoi'];
					$id_user=$_SESSION['id_user'];
					$kq=$this->model->phanhoi($id_quan, $id_user, $noidung);
					header("location: index.php?action=chitietquanan&id_quan=$id_quan");
				}else{
					echo "Bạn chưa đăng nhập";
				}
			}else
			if(isset($_POST['danhgia'])){
				if(isset($_SESSION['username'])){
					$danhgia=$_POST['sao'];
					$id_user=$_SESSION['id_user'];
					$kq=$this->model->kiemtradanhgia($id_quan,$id_user);
					//var_dump($id_quan); die();
					if($kq->num_rows>0){
						while ($row= $kq->fetch_array()) {
							$id_danhgia=$row['id_danhgia'];
						}
						$this->model->suadanhgia($id_danhgia, $danhgia);
						header("location: index.php?action=chitietquanan&id_quan=$id_quan");
					}else{
						$this->model->themdanhgia($id_quan, $danhgia, $id_user);
						header("location: index.php?action=chitietquanan&id_quan=$id_quan");
					}
				}else{
					echo "Bạn chưa đăng nhập";
				}
			}else
			if(isset($_POST['cmt'])){
				if(isset($_SESSION['username'])){
					$noidung=$_POST['noidung'];
					$username=$_SESSION['username'];
					$ngay=date('Y-m-d');
					//var_dump($ngay); die();
					$this->model->thembinhluan($id_quan, $noidung, $username, $ngay);
					header("location: index.php?action=chitietquanan&id_quan=$id_quan");
					
				}else{
					echo "Bạn chưa đăng nhập";
				}
			}else
			if(isset($_POST['upanh'])){
				//var_dump($_FILES); die();
				if($_FILES["file"]["name"]!=NULL){
					if($_FILES["file"]["type"]=="image/jpeg"||$_FILES["file"]["type"]=="image/png"){
						$size=round($_FILES["file"]["size"]/1024 , 2);
						
						if($size>10240){
							echo "file quá nang";
						}else{
							$path = "res/img/"; // file luu vào thu muc chua file upload
							$tmp_name = $_FILES['file']['tmp_name'];
							$name1 = $_FILES['file']['name'];
							$name1=md5($name1);
							if($_FILES["file"]["type"]=="image/jpeg"){
								$type='.jpeg';
							}else{
								$type='.png';
							}
							$name=$name1.$type; 
							// Upload file
							move_uploaded_file($tmp_name,$path.$name);
							//echo "string";
							
							$this->model->themanhquan($id_quan,$name);
							header("location: index.php?action=chitietquanan&id_quan=$id_quan");
						}
					}else {
						$_SESSION['error']="File không hợp lệ!";
						header("location: index.php?action=chitietquanan&id_quan=$id_quan");
					}
				}else{
					$_SESSION['error']="Vui lòng chọn File!";
					header("location: index.php?action=chitietquanan&id_quan=$id_quan");
				}
			}else{
				// $id_quan=$_GET["id_quan"];
				$kq1=$this->model->getthongtinquanan($id_quan);
				$kq2=$this->model->getmonan($id_quan);
				$kq3=$this->model->getcmt($id_quan);
				$kq4=$this->model->getimg($id_quan);
				$danhgia=$this->model->getdanhgia($id_quan);
				$tv=0; $tot=0; $kha=0; $tb=0; $kem=0;
				while ($row= $danhgia->fetch_assoc()) {
					//var_dump($row['danhgia']); die();
					if($row['danhgia']==1){
						$tv= $tv+1;
					}else if($row['danhgia']==2){
						$tot= $tot+1;
					}else if($row['danhgia']==3){
						$kha= $kha+1;
					}else if($row['danhgia']==4){
						$tb= $tb+1;
					}else if($row['danhgia']==5){
						$kem= $kem+1;
					}
				}
				
				include 'view/khachhang/chitietquanan.php';
			}
			
		}

		// public function danhgia(){
		// 	if(isset($_SESSION['username'])){
		// 			$danhgia=$_GET['sao'];
		// 			$id_user=$_SESSION['id_user'];
		// 			$kq=$this->model->kiemtradanhgia($id_quan,$id_user);
		// 			if($kq->num_rows>0){
		// 				while ($row= $kq->fetch_array()) {
		// 					$id_danhgia=$row['id_danhgia'];
		// 				}
		// 				$this->model->suadanhgia($id_danhgia, $danhgia);
		// 				header("location: index.php?action=chitietquanan&id_quan=$id_quan");
		// 			}else{
		// 				$this->model->themdanhgia($id_quan, $danhgia, $id_user);
		// 				header("location: index.php?action=chitietquanan&id_quan=$id_quan");
		// 			}
		// 		}else{
		// 			echo "Bạn chưa đăng nhập";
		// 		}
		// }

		//đăng nhập
		public function dangnhap(){
			if(isset($_POST['dangnhap'])){
				$username=$_POST['username'];
				$password=md5($_POST['password']);
				//var_dump($password); die();
				if($this->model->dangnhap($username, $password)){
					if($_SESSION['quyen']==1){
						header('location: index.php?action=adminquantri');
					}else if($_SESSION['quyen']==2){
						header('location: index.php');
					}
					else{
						header('location: index.php');
					}
				}else{
					$_SESSION['error']="Tên tài khoản hoặc mật khẩu chưa chính xác";
				}
			}
			include 'view/dangnhap.php';
		}

		//điều hướng trang cá nhân.
		public function trangcanhan(){
			$id_user= $_SESSION['id_user'];
			$username= $_SESSION['username'];
			if(isset($_SESSION['username'])){
				if(isset($_POST['upanh'])){
					if($_FILES["file"]["name"]!=NULL){
						if($_FILES["file"]["type"]=="image/jpeg"||$_FILES["file"]["type"]=="image/png"){
							$size=round($_FILES["file"]["size"]/1024 , 2);
							
							if($size>10240){
								echo "file quá nang";
							}else{
								$path = "res/img/"; // file luu vào thu muc chua file upload
								$tmp_name = $_FILES['file']['tmp_name'];
								$name1 = $_FILES['file']['name'];
								$name1=md5($name1);
								if($_FILES["file"]["type"]=="image/jpeg"){
									$type='.jpeg';
								}else{
									$type='.png';
								}
								$name=$name1.$type;
								// Upload file
								move_uploaded_file($tmp_name,$path.$name);
								//echo "string";
								//var_dump($name); die();
								$this->model->themanhdaidien($id_user, $name);
								header("location: index.php?action=trangcanhan");
							}
						}else {
							$_SESSION['error']="File không hợp lệ!";
							header("location: index.php?action=trangcanhan");
							//echo "file duoc chon khong hop le";
						}
					}else{
						//echo "vui long chon file";
						$_SESSION['error']="Vui lòng chọn File!";
						header("location: index.php?action=trangcanhan");
					}
				}
				if(isset($_POST['suamatkhau'])){
					$password=$_POST['matkhaucu'];
					$matkhaumoi=$_POST['matkhaumoi'];
					$matkhaumoi1=$_POST['matkhaumoi1'];
					//var_dump($password);var_dump($matkhaumoi);var_dump($matkhaumoi1); die();
					if($matkhaumoi1 == $matkhaumoi){
						$password=md5($password);
						if($this->model->dangnhap($username, $password)){
							$matkhaumoi= md5($matkhaumoi);
							$this->model->suamatkhau($id_user, $matkhaumoi);
							$_SESSION['error']='Đổi mật khẩu thành công!';
							header("location: index.php?action=trangcanhan");
						}else{
							$_SESSION['error']='Mật khẩu không đúng!';
						}
					}else{
						$_SESSION['error']='Mật khẩu mơi không hợp lệ!';
					}
				}
				if(isset($_POST['suattcn'])){
					$username=$_POST['username'];
					$hovaten=$_POST['hovaten'];
					$email=$_POST['email'];
					$sdt=$_POST['sdt'];
					$ngaysinh=$_POST['ngaysinh'];
					$gioitinh=$_POST['gioitinh'];
					//var_dump($email);die();
					$this->model->suathongtincanhan($id_user, $username, $hovaten, $email, $sdt, $ngaysinh, $gioitinh);
					header("location: index.php?action=trangcanhan");
				}else{
					
					$kq=$this->model->trangcanhan($id_user);
					include 'view/trangcanhan.php';
				}
			}else{
				header("location: index.php");
			}
		}

		//điều hướng cho trang admin.
		public function adminquantri(){
			if(isset($_SESSION['username'])&&$_SESSION['quyen']==1){
				$adminactive=1;
				$adminloai=1;
				$adminkhoa=1;
				if(isset($_POST['timtaikhoan'])){
					$_SESSION['adminkhoa']=$adminkhoa;
					$timkiem=$_POST['timkiem'];
					$kq =$this->model->timtaikhoan($timkiem);
					include 'view/admin/quantri.php';
				}else
				if(isset($_POST['timcuahang'])){
					$_SESSION['adminloai']=$adminloai;
					$timkiem=$_POST['timkiem'];
					$kq =$this->model->timcuahang($timkiem);
					include 'view/admin/quantri.php';
				}else
				if(isset($_POST['doitrangthai'])){
					$id_quan=$_POST['id'];
					$kiemtra=$_POST['kiemtra'];
					//var_dump($kiemtra);die();
					$this->model->doitrangthai($id_quan, $kiemtra);
					header('location: index.php?action=adminquantri&adminactive=0');
				}else
				if(isset($_GET['adminloai'])){
					$adminloai=$_GET['adminloai'];
					if($adminloai==1){
						$_SESSION['adminloai']=$adminloai;
						$kq=$this->model->getquanan($adminloai);
						include 'view/admin/quantri.php';
					}
					if($adminloai==2){
						$_SESSION['adminloai']=$adminloai;
						$kq=$this->model->getquanan($adminloai);
						include 'view/admin/quantri.php';
					}
					if($adminloai==3){
						$_SESSION['adminloai']=$adminloai;
						$kq=$this->model->getquanan($adminloai);
						include 'view/admin/quantri.php';
					}
					if($adminloai==4){
						$_SESSION['adminloai']=$adminloai;
						$kq=$this->model->getquanan($adminloai);
						include 'view/admin/quantri.php';
					}
					if($adminloai==5){
						$_SESSION['adminloai']=$adminloai;
						$kq=$this->model->getquanan($adminloai);
						include 'view/admin/quantri.php';
					}
					if($adminloai==6){
						$adminloai=6;
						$_SESSION['adminloai']=$adminloai;
						$kq=$this->model->getquanan($adminloai);
						include 'view/admin/quantri.php';
					}
					
				}else
				if(isset($_GET['adminkhoa'])){
					if($_GET['adminkhoa']==1){
						$adminkhoa=$_GET['adminkhoa'];
						$_SESSION['adminkhoa']=$adminkhoa;
						//var_dump('hahahahahhaahahha'); die();
						$kq =$this->model->getalladmin();
						include 'view/admin/quantri.php';
					}
					if($_GET['adminkhoa']==2){
						$adminkhoa=$_GET['adminkhoa'];
						$_SESSION['adminkhoa']=$adminkhoa;
						$kq=$this->model->getallchucuahang();
						include 'view/admin/quantri.php';
					}
					if($_GET['adminkhoa']==3){
						$adminkhoa=$_GET['adminkhoa'];
						$_SESSION['adminkhoa']=$adminkhoa;
						$kq=$this->model->getallkhachhang();
						include 'view/admin/quantri.php';
					}
				}else
				if(isset($_GET['adminactive'])){
					$adminactive=$_GET['adminactive'];
					if($adminactive==0){
						$_SESSION['adminactive']=$adminactive;
						$kq= $this->model->getallquanan($adminactive);
						include 'view/admin/quantri.php';
					}	
					if($adminactive==1){
						$_SESSION['adminactive']=$adminactive;
						$kq= $this->model->getalldiadiem();
						include 'view/admin/quantri.php';
					}	
				}else{
					$kq1=$this->model->getalladmin();
					if($kq1->num_rows>0){
						$_SESSION['getalladmin']=$kq1->num_rows;
					}else{
						$_SESSION['getalladmin']=0;
					}
					$kq2=$this->model->getallchucuahang();
					if($kq2->num_rows>0){
						$_SESSION['getallchucuahang']=$kq2->num_rows;
					}else{
						$_SESSION['getallchucuahang']=0;
					}
					$kq3=$this->model->getallkhachhang();
					if($kq3->num_rows>0){
						$_SESSION['getallkhachhang']=$kq3->num_rows;
					}else{
						$_SESSION['getallkhachhang']=0;
					}
					$kq4=$this->model->getalldiadiem();
					if($kq4->num_rows>0){
						$_SESSION['getalldiadiem']=$kq4->num_rows;
					}else{
						$_SESSION['getalldiadiem']=0;
					}
					$kq5=$this->model->getalldanhgia();
					if($kq5->num_rows>0){
						$_SESSION['getalldanhgia']=$kq5->num_rows;
					}else{
						$_SESSION['getalldanhgia']=0;
					}
					$kq6=$this->model->getallimg();
					if($kq6->num_rows>0){
						$_SESSION['getallimg']=$kq6->num_rows;
					}else{
						$_SESSION['getallimg']=0;
					}
					$ktphanhoi=0;
					$kq7=$this->model->ktphanhoi($ktphanhoi);
					if($kq7->num_rows>0){
						$_SESSION['getphanhoi']=$kq7->num_rows;
					}
					include 'view/admin/quantri.php';
				}
			}else{
				header("location: index.php");
			}
		}

		//admin xem phản hồi.
		public function xemphanhoi(){
			if(isset($_SESSION['username'])&&$_SESSION['quyen']==1){
				$_SESSION['xemphanhoi']='xemphanhoi';
				$kq= $this->model->getphanhoi();
				$this->model->danhdaudaxemphanhoi();
				include 'view/admin/quantri.php';
			}else{
				header("location: index.php");
			}
		}

		//xoa phan hoi
		public function xoaphanhoi(){
			if(isset($_SESSION['username'])&&$_SESSION['quyen']==1){
				$id_phanhoi=$_GET['id_phanhoi'];
				$this->model->xoaphanhoi($id_phanhoi);
				$this->xemphanhoi();
			}else{
				header("location: index.php");
			}
		}

		//điều hướng cho chủ cửa hàng quản lý cửa hàng của mình.
		public function chucuahang(){
			$id_user=$_SESSION['id_user'];
			$kiemtra=0;
			$kq= $this->model->cchgetthongtinquan($id_user);
			if($kq->num_rows>0){
				while ($row=$kq->fetch_array()) {
					$_SESSION['id_quan']=$row['id_quan'];
				}
				$this->xemcuahang();
			}else{
				if(isset($_POST['btnguidangky'])){
					$tencuahang=$_POST['tencuahang'];
					$diachi=$_POST['diachi'];
					$mota=$_POST['mota'];
					$loai=$_POST['loai'];
					$email=$_POST['email'];
					$sodienthoai=$_POST['sodienthoai'];
					$anh="1.jpg";
					$vido=$_POST['vido'];
					$kinhdo=$_POST['kinhdo'];
					$check=0;
					//var_dump($vido, $kinhdo); die();
					$this->model->dangkychucuahang($tencuahang, $diachi, $mota, $loai, $email, $sodienthoai, $anh, $vido, $kinhdo, $check, $id_user);
					$kq= $this->model->cchgetthongtinquan($id_user);
					while ($row=$kq->fetch_array()) {
						$_SESSION['id_quan']=$row['id_quan'];

					}
					//var_dump($_SESSION['id_user']); die();
					$this->xemcuahang();
				}else{
					include 'view/chucuahang/dangkychucuahang.php';
				}
				
			}

		}

		//điều hướng cho chủ cửa hàng quản lý cửa hàng của mình
		public function xemcuahang(){
			if(isset($_SESSION['id_quan'])){
				$id_quan=$_SESSION['id_quan'];
			}else if(isset($_GET['id_quan'])){
				$id_quan=$_GET["id_quan"];
			}
			// var_dump($_SESSION['quyen']); die();
			// if(isset($_POST['cmt'])){
			// 	if(isset($_SESSION['username'])){
			// 		$noidung=$_POST['noidung'];
			// 		$username=$_SESSION['username'];
			// 		$ngay=date('Y-m-d');
			// 		//var_dump($ngay); die();
			// 		$this->model->thembinhluan($id_quan, $noidung, $username, $ngay);
			// 		header("location: index.php?action=xemcuahang&id_quan=$id_quan");
					
			// 	}else{
			// 		echo "sadfasdf";
			// 	}
			// }else 

			if(isset($_POST['phanhoi'])){
				if(isset($_SESSION['username'])){
					$noidung=$_POST['noidungphanhoi'];
					$id_user=$_SESSION['id_user'];
					$kq=$this->model->phanhoi($id_quan, $id_user, $noidung);
					header("location: index.php?action=chitietquanan&id_quan=$id_quan");
				}else{
					echo "Bạn chưa đăng nhập";
				}
			}

			if(isset($_POST['themthucdon'])){
				$tenmon=$_POST['tenmon'];
				$mota=$_POST['mota'];
				$giatien=$_POST['giatien'];
				//var_dump($tenmon); die();
				if($_FILES["file"]["name"]!=NULL){
					if($_FILES["file"]["type"]=="image/jpeg"||$_FILES["file"]["type"]=="image/png"){
						$size=round($_FILES["file"]["size"]/1024 , 2);
						if($size>10240){
							echo "file quá nang";
						}else{
							$path = "res/img/"; // file luu vào thu muc chua file upload
							$tmp_name = $_FILES['file']['tmp_name'];
							$name1 = $_FILES['file']['name'];
							$name1=md5($name1);
							if($_FILES["file"]["type"]=="image/jpeg"){
								$type='.jpeg';
							}else{
								$type='.png';
							}
							$name=$name1.$type;
							//var_dump($name); die();
							// $type = $_FILES['file']['type']; 
							// $size = $_FILES['file']['size']; 
							// Upload file
							move_uploaded_file($tmp_name,$path.$name);
							//echo "string";
							
							$this->model->themthucdon($id_quan, $name, $tenmon, $mota, $giatien);
							header("location: index.php?action=xemcuahang&id_quan=$id_quan");
						}
					}else {
						$_SESSION['error']="File không hợp lệ!";
						header("location: index.php?action=xemcuahang&id_quan=$id_quan");
						//echo "file duoc chon khong hop le";
					}
				}else{
					//echo "vui long chon file";
					$_SESSION['error']="Vui lòng chọn File!";
					//var_dump($tenmon); die();
					header("location: index.php?action=xemcuahang&id_quan=$id_quan");
				}
			}

			if(isset($_POST['xoathucdon'])){
				$id_monan=$_POST['id_monan'];
				$kq=$this->model->thongtinthucdoncanxoa($id_monan);
				while ($row= $kq->fetch_array()) {
					$tenanh=$row['anh'];
				}
				if(unlink("res/img/$tenanh")){
			        echo "Đã xoá";
			    }else{
			        echo "Chưa xoá";
			    }
				$this->model->xoathucdon($id_monan);
				
				header("location: index.php?action=xemcuahang&id_quan=$id_quan");
			}

			if(isset($_POST['upanh'])){
				//var_dump($_FILES); die();
				if($_FILES["file"]["name"]!=NULL){
					if($_FILES["file"]["type"]=="image/jpeg"||$_FILES["file"]["type"]=="image/png"){
						$size=round($_FILES["file"]["size"]/1024 , 2);
						
						if($size>10240){
							echo "file quá nang";
						}else{
							$path = "res/img/"; // file luu vào thu muc chua file upload
							$tmp_name = $_FILES['file']['tmp_name'];
							$name1 = $_FILES['file']['name'];
							$name1=md5($name1);
							if($_FILES["file"]["type"]=="image/jpeg"){
								$type='.jpeg';
							}else{
								$type='.png';
							}
							$name=$name1.$type;
							// Upload file
							move_uploaded_file($tmp_name,$path.$name);
							//echo "string";
							
							$this->model->themanhquan($id_quan,$name);
							header("location: index.php?action=xemcuahang&id_quan=$id_quan");
						}
					}else {
						$_SESSION['error']="File không hợp lệ!";
						header("location: index.php?action=xemcuahang&id_quan=$id_quan");
						//echo "file duoc chon khong hop le";
					}
				}else{
					//echo "vui long chon file";
					$_SESSION['error']="Vui lòng chọn File!";
					header("location: index.php?action=xemcuahang&id_quan=$id_quan");
				}
			}

			if(isset($_POST['doianhdaidien'])){
				if($_FILES["file"]["name"]!=NULL){
					if($_FILES["file"]["type"]=="image/jpeg"||$_FILES["file"]["type"]=="image/png"){
						$size=round($_FILES["file"]["size"]/1024 , 2);
						
						if($size>10240){
							echo "file quá nang";
						}else{
							$path = "res/img/"; // file luu vào thu muc chua file upload
							$tmp_name = $_FILES['file']['tmp_name'];
							$name1 = $_FILES['file']['name'];
							$name1=md5($name1);
							if($_FILES["file"]["type"]=="image/jpeg"){
								$type='.jpeg';
							}else{
								$type='.png';
							}
							$name=$name1.$type;
							// Upload file
							move_uploaded_file($tmp_name,$path.$name);
							//echo "string";
							//var_dump($name); die();
							$this->model->doianhquan($id_quan, $name);
							
							header("location: index.php?action=xemcuahang&id_quan=$id_quan");
						}
					}else {
						$_SESSION['error']="File không hợp lệ!";
						header("location: index.php?action=xemcuahang&id_quan=$id_quan");
						//echo "file duoc chon khong hop le";
					}
				}else{
					//echo "vui long chon file";
					$_SESSION['error']="Vui lòng chọn File!";
					header("location: index.php?action=xemcuahang&id_quan=$id_quan");
				}
			}else{
				$kq1=$this->model->getthongtinquanan($id_quan);
				$kq2=$this->model->getmonan($id_quan);
				$kq3=$this->model->getcmt($id_quan);
				$kq4=$this->model->getimg($id_quan);
				$danhgia=$this->model->getdanhgia($id_quan);
				$tv=0; $tot=0; $kha=0; $tb=0; $kem=0;
				while ($row= $danhgia->fetch_assoc()) {
					if($row['danhgia']==1){
						$tv= $tv+1;
					}if($row['danhgia']==2){
						$tot= $tot+1;
					}else if($row['danhgia']==3){
						$kha= $kha+1;
					}else if($row['danhgia']==4){
						$tb= $tb+1;
					}else if($row['danhgia']==5){
						$kem= $kem+1;
					}
				}
				include 'view/chucuahang/quanlycuahang.php';
			}
		}

		//admin xoá cửa hàng.
		public function xoacuahang(){
			if(isset($_SESSION['username'])&&$_SESSION['quyen']==1){
				$id_quan=$_GET['id_quan'];
				$this->model->kiemtracuahang($id_quan);
				$this->model->xoacuahang($id_quan);
				header('location: index.php?action=adminquantri');
			}else{
				header('location: index.php');
			}
		}

		//admin xem thông tin của 1 tài khoản.
		public function xemtaikhoan(){
			$id_user=$_GET['id'];
			$kq=$this->model->trangcanhan($id_user);
			include 'view/admin/thongtintaikhoan.php';
		}

		//admin xoá 1 tài khoản.
		public function xoataikhoan(){
			if(isset($_SESSION['username'])&&$_SESSION['quyen']==1){
				$id_user=$_GET['id'];
				//var_dump($id_user); die();
				$this->model->xoataikhoan($id_user);
				header('location: index.php?action=adminquantri');
			}else{
				header('location: index.php');
			}
		}

		//admin thêm 1 địa điểm mới.
		public function themdiadiem(){
			if(isset($_POST['btnguidangky'])){
				$id_user=$_SESSION['id_user'];
				$tencuahang=$_POST['tencuahang'];
				$diachi=$_POST['diachi'];
				$mota=$_POST['mota'];
				$loai=$_POST['loai'];
				$email=$_POST['email'];
				$sodienthoai=$_POST['sodienthoai'];
				$anh='1.jpg';
				$vido=$_POST['vido'];
				$kinhdo=$_POST['kinhdo'];
				$check='0';
				$this->model->dangkychucuahang($tencuahang, $diachi, $mota, $loai, $email, $sodienthoai, $anh, $vido, $kinhdo,$check, $id_user);
				header('location: index.php?action=adminquantri');
			}else{
				require 'view/admin/themcuahang.php';
			}
		}

		//người dùng đăng ký làm thành viên.
		public function dangky(){
			if(isset($_POST['btndangky'])){
				$username=$_POST['username'];
				$hovaten=$_POST['hovaten'];
				$password1=$_POST['password1'];
				$password2=$_POST['password2'];
				$email=$_POST['email'];
				$sodienthoai=$_POST['sodienthoai'];
				$ngaysinh=$_POST['birthday'];
				$gioitinh=$_POST['gioitinh'];
				$anhdaidien='a.jpg';
				$quyen='3';
				if($username==''||$password1==''||$password2==''||$email==''||$sodienthoai==''||$ngaysinh==''||$gioitinh==''){
					$_SESSION['error']="Bạn không được để trống!";
					header('location: index.php?action=dangky');
				}else{
					if($password1==$password2){
						if($this->model->checkuser($username)){
							$_SESSION['error']="Tên tài khoản đã tồn tại!";
							header('location: index.php?action=dangky');
						}else{
							$password1=md5($password1);
							$this->model->dangky($username, $hovaten, $password1, $email, $sodienthoai, $ngaysinh, $gioitinh, $anhdaidien, $quyen);
							header('location: index.php?action=dangnhap');
						}
					}else{
						$_SESSION['error']="Mật khẩu không khớp!";
						header('location: index.php?action=dangky');
					}
				}
				
			}else{
				include 'view/dangky.php';
			}
		}

		//Đăng xuất.
		public function dangxuat(){
			session_destroy();
			header('location: index.php');
		}

	}
	?>