<div class="card">
	<div class="card-header">
		<h3 class="card-title">Slider List</h3>

		<div class="card-tools">
			<div class="input-group input-group-md" style="width: 350px;">
				<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
				
				<div class="input-group-append">
					<button type="submit" class="btn btn-default">
						<i class="fas fa-search"></i>
					</button>
				</div>
				
				<div><a class="btn btn-primary" href="/slider/edit/0">Add Slider</a></div>
			</div>
		</div>
	</div>
	<table class="table table-bordered table-sm">
		<thead>
			<tr>
				<td width="36px" class="aligncenter">Sr</td>
				<td>Title</td>
				<td>Description</td>
				<td>Status</td>
			</tr>
		</thead>

		<tbody>
			<?php
			$i = 1;
				foreach ($rows as $row) {
					echo '<tr>
						<td>'.$i++.'</td>
						<td>'.anchor('slider/edit/'.$row['id'], $row['title']).'</td>
						<td>'.$row['description'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td>Sr</td>
				<td>Title</td>
				<td>Description </td>
				<td>Status</td>
			</tr>
		</tfoot>
	</table>
</div>


