<div class="divtable divtablephanhoi">
<table id="results">
	<thead>
		<tr>
			<th>ID</th>
			<th>ID_user</th>
			<th>ID_quan</th>
			<th>Nội dung</th>
			<th style="width: 7%;">Thao tác</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($row=$kq->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $row['id_phanhoi'] ?></td>
				<td><?php echo $row['id_user'] ?></td>
				<td><?php echo $row['id_quan'] ?></td>
				<td><?php echo $row['noidung'] ?></td>
				<td><a href="index.php?action=xoaphanhoi&id_phanhoi=<?php echo $row['id_phanhoi'] ?>">Xoá</a> </td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<div id="pageNavPosition"></div>