<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
<div class="col-md-8">
	<!-- general form elements -->
	<div class="card card-primary">
<form id="quickForm" action="<?php echo base_url('IFA_user_save'); ?>" method="post" enctype="multipart/form-data">
	<div class="card-body">
		<div class="form-group">
			<label for="exampleInputUsername">Username</label>
			<input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Enter Username">
		</div>
		<div class="form-group">
			<label for="exampleInputDesignation">Designation</label>
			<input type="text" name="designation" class="form-control" id="exampleInputDesignation" placeholder="Enter Designation">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="exampleInputLocation">Location</label>
			<input type="text" name="location" class="form-control" id="exampleInputLocation" placeholder="Enter Location">
		</div>
		<div class="form-group">
			<label for="exampleInputFile">File input</label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="exampleInputFile">
					<label class="custom-file-label" for="exampleInputFile">Choose file</label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text">Upload</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputFirstname">Firstname</label>
			<input type="text" name="first_name" class="form-control" id="exampleInputFirstname" placeholder="Enter Firstname">
		</div>
		<div class="form-group">
			<label for="exampleInputLastname">Lastname</label>
			<input type="text" name="last_name" class="form-control" id="exampleInputLastname" placeholder="Enter Lastname">
		</div>

		<div class="form-group mb-0">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
				<label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

	</div>
</div>
		</div>
	</div>
</section>

<!-- Page specific script -->


<script src="<?php echo base_url('assets/admin/');?>plugins/jquery-validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url('assets/admin/');?>plugins/jquery-validation/additional-methods.min.js"></script>

<script src="<?php echo base_url('assets/admin/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?php echo base_url('assets/admin/');?>plugins/jquery/jquery.min.js"></script>

<script>
	$(function () {

		$('#quickForm').validate({
			rules: {
				username: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 10
				},
				designation: {
					required: true,
					minlength: 5
				},
				location: {
					required: true,
					minlength: 5
				},
				file: {
					required: true
				},
				first_name: {
					required: true,
					minlength: 5
				},
				terms: {
					required: true
				},
			},
			messages: {
				username: {
					required: "Please enter username",
					minlength: "Your username must be at least 5 characters long"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 10 characters long"
				},
				designation: {
					required: "Please enter designation",
					minlength: "Your designation must be at least 5 characters long"
				},
				location: {
					required: "Please enter location",
					minlength: "Your location must be at least 5 characters long"
				},
				first_name: {
					required: "Please enter firstname",
					minlength: "Your firstname must be at least 5 characters long"
				},
				terms: "Please accept our terms"
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>
