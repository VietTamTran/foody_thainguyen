<div>
	<form method="post">
		<input style="width: 90%;" type="text" name="timkiem" placeholder="Nhập id_quan, tên cửa hàng" autocomplete="off" required="required"/>
		<input type="submit" name="timcuahang" value="Tìm kiếm">
	</form>
</div>
<div class="divtable">
<table id="results">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên quán</th>
			<th>Chủ cửa hàng</th>
			<th>Địa điểm</th>
			<th>Loại</th>
			<th>Trạng thái</th>
			<th>Thao tác</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row=$kq->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $row['id_quan'] ?></td>
				<td><?php echo $row['tenquan'] ?></td>
				<td><?php echo $row['username'] ?></td>
				<td><?php echo $row['diadiem'] ?></td>

				<td><?php if($row['loai']==1){ echo 'Đồ ăn';}
				if($row['loai']==2){ echo 'Đồ uống';}
				if($row['loai']==3){ echo 'Lẩu & nướng';}
				if($row['loai']==4){ echo 'Nhà hàng';}
				if($row['loai']==5){ echo 'Khách sạn';} ?></td>
				<td>
					<?php if($row['kiemtra']==0){
						$kiemtra=1;
					}else{
						$kiemtra=0;
					} ?>
					<form method="post">
						<input hidden type="text" name="id" value="<?php echo $row['id_quan'] ?>">
						<input hidden type="text" name="kiemtra" value="<?php echo $kiemtra; ?>">
						<button type="submit"  name="doitrangthai"><?php if($row['kiemtra']==1){ echo "Đang mở";}else{ echo "Đang đóng";} ?></button>
					</form>
				</td>
				<td><a class="abtn" href="index.php?action=xemcuahang&id_quan=<?php echo $row['id_quan'] ?>">Xem</a> | <a class="abtn" href="index.php?action=xoacuahang&id_quan=<?php echo $row['id_quan'] ?>">Xoá</a></td>

			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<div id="pageNavPosition"></div>