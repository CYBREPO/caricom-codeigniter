<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title">Add Menu</h3>
				</div>
				<?php echo form_open($this->uri->uri_string(), ["id" => 'MainForm']) ?>
					<div class="card-body">
						<div class="form-group">
							<label for="title">Menu Title</label>
							<input type="text" name="title" class="form-control" id="title" placeholder="Enter menu" value="<?php echo $row['title']; ?>">
						</div>
						
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" class="form-control" id="summernote" rows="7" cols="40">
								<?php echo $row['description']; ?>
							</textarea>
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