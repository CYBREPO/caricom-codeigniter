<div class="card">
	<div class="card-header">
		<h3 class="card-title"><?php echo $main_menu['title'] ?> List</h3>

		<div class="card-tools">
			<div class="input-group input-group-md" style="width: 350px;">
				<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
				
				<div class="input-group-append">
					<button type="submit" class="btn btn-default">
						<i class="fas fa-search"></i>
					</button>
				</div>
				
				<div><a class="btn btn-primary" href="<?php echo '/menu/submenu_edit/'.$main_menu['id'].'/0' ?>">Add <?php echo $main_menu['title'] ?> Menu</a></div>
			</div>
		</div>
	</div>
	<table class="table table-bordered table-sm">
		<thead>
			<tr>
				<td width="36px" class="aligncenter">Sr</td>
				<td>Title</td>
				<td>Has Submenu ?</td>
				<td>Status</td>
			</tr>
		</thead>

		<tbody>
			<?php
			$i = 1;
				foreach ($rows as $row) {
					echo '<tr>
						<td>'.$i++.'</td>
						<td>'.anchor('/menu/submenu_edit/'.$main_menu['id'].'/'.$row['id'], $row['title']).'</td>
						<td>'.$row['has_submenu'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td>Sr</td>
				<td>Title</td>
				<td>Has Submenu?</td>
				<td>Status</td>
			</tr>
		</tfoot>
	</table>
</div>


