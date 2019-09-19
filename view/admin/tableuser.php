<div>
	<form method="post">
		<input style="width: 90%" type="text" name="timkiem" placeholder="Nhập ID, họ tên, email hoặc số điện thoại" autocomplete="off" required="required"/>
		<input type="submit" name="timtaikhoan" value="Tìm kiếm">
	</form>
</div>
<div class="divtable">
<table id="results">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Họ và tên</th>
			<th>Email</th>

			<th>Số điện thoại</th>
			<th>Thao tác</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row=$kq->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $row['id_user'] ?></td>
				<td><?php echo $row['username'] ?></td>
				<td><?php echo $row['hovaten'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['sdt'] ?></td>
				<td><a class="abtn" href="index.php?action=xemtaikhoan&id=<?php echo $row['id_user'] ?>">Xem</a> <?php if($row['quyen']!=1){ ?> | <a class="abtn" href="index.php?action=xoataikhoan&id=<?php echo $row['id_user'] ?>">Xoá</a> <?php } ?> </td>

			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<div id="pageNavPosition"></div>