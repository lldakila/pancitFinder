<script type="text/javascript">
	function checkForm(form){
	 if(!(form.txtpass.value != "" && form.txtpass.value == form.txtrepass.value)) {
	 	alert("Error: Please check that you've entered and confirmed your password!");
      	form.txtpass.focus();
      	return false;
	 }
	 return true;
	}
	
</script>

<div class="container">
	<!-- <h2>User Registration</h2> -->
	<br><br>
	<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
	<div class="panel-heading">User Registration</div>
	<div class="panel-body">
	<?php echo validation_errors(); ?>
	<form class="form-signin" action="<?php echo base_url('User/verify');?>" method="post" onsubmit="return checkForm(this);">
		<label for="txtfname">First Name</label>
		<input type="text" name="txtfname" id="txtfname" class="form-control" placeholder="First Name" required autofocus>
		<label for="txtlname">Last Name</label>
		<input type="text" name="txtlname" id="txtlname" class="form-control" placeholder="Last Name" required>
		<label for="txtemail">Email</label>
		<input type="email" name="txtemail" id="txtemail" class="form-control" placeholder="Email" required>
		<label for="txtuser" >Username</label>
        <input type="" name="txtuser" id="txtuser" class="form-control" placeholder="Username" required>
        <label for="txtpass" >Password</label>
        <input type="password" name="txtpass" id="txtpass" class="form-control" placeholder="Password" required>
        <label for="txtrepass" >Re-type Password</label>
        <input type="password" name="txtrepass" id="txtrepass" class="form-control" placeholder="Re-type Password" required>
        <br>
        <button class="btn btn-lg btn-primary" type="submit">Register</button>
	</form>
	</div>
	</div>
	</div>

</div>