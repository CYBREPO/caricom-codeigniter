<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title"><a href="<?php echo '/menu/submenu/'.$main_menu['id'] ?>"><b><i class="fas fa-chevron-circle-left"></i></b></a> Add Menu</h3>
				</div>
				<?php echo form_open_multipart($this->uri->uri_string(), ["id" => 'MainForm']) ?>
				<?php echo form_hidden($id) ?>
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group  <?php echo (strlen(form_error('title')) > 0 ? 'has-error' : '') ?>">
									<label for="title">Title</label>
									<input type="text" name="title" class="form-control" id="title" value="<?php echo $row['title']; ?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="title">Has Submenu?</label>
									<?php echo form_dropdown('has_submenu', ['No' => 'No', 'Yes' => 'Yes'], $row['has_submenu'], 'class="form-control" id="has_submenu"')?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="title">Status</label>
									<?php echo form_dropdown('status', ['Active' => 'Active', 'Disabled' => 'Disabled'], $row['status'], 'class="form-control" id="status"')?>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="description">Description</label>
									<textarea name="description" class="form-control" id="summernote" rows="7" cols="40">
										<?php echo $row['description']; ?>
									</textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									
									<label for="title">Image</label>
									<br>
									<?php 
										if (strlen(trim($row['file'])) > 0) {
											echo '<img src="'.$row['file'].'" alt="Content Image" width="50%" height="50%">';
											echo '&nbsp;&nbsp;<a href="/menu/delfile/'.$id['id'].'/'.$main_menu['id'].'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>';
										} else {
											echo '<input class="form-control" type="file" name="userfile" size="40">';

										}
									?>
								</div>
							</div>
						</div>
						

					</div>

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">

		</div>
	</div>
	<!-- /.row -->
</div><!-- /.container-fluid -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>