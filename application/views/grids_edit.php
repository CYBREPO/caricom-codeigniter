<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title"><a href="/admin/grids"><b><i class="fas fa-chevron-circle-left"></i></b></a> Add Slider</h3>
				</div>
				<?php echo form_open_multipart('/admin/'.$this->uri->uri_string(), ["id" => 'MainForm']) ?>
				<?php echo form_hidden($id) ?>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group  <?php echo (strlen(form_error('title')) > 0 ? 'has-error' : '') ?>">
									<label for="title">Grids Title</label>
									<input type="text" name="title" class="form-control" id="title" placeholder="Enter Grids Title" value="<?php echo $row['title']; ?>">
								</div>
							</div>
							<div class="col-md-2">
                                <div class="form-group">
                                    <label for="title">Grids Button Text</label>
                                    <input type="text" name="btn_text_one" class="form-control" id="btn_text_one" placeholder="Button Text" value="<?php echo $row['btn_text_one']; ?>">
								</div>
							</div>
							<div class="col-md-2">
                                <div class="form-group">
                                    <label for="title">Grids Button Url</label>
                                    <input type="text" name="btn_url_one" class="form-control" id="btn_url_one" placeholder="Button URL" value="<?php echo $row['btn_url_one']; ?>">
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
										echo '&nbsp;&nbsp;<a href="/admin/grids/delfile/'.$id['id'].'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>';
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
</script>gr