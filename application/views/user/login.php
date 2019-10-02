<div class="container">
	<div class="col-md-4 col-md-offset-4">
         <form class="form-signin" action="<?php echo base_url('User/login_verify');?>" method="post">

           <h2 class="form-signin-heading">Please sign in</h2>
           <!-- <?php// echo $this->session->flashdata('msg');?> -->
           <label for="txtuser" >Username</label>
           <input type="" name="txtuser" id="txtuser" class="form-control" placeholder="Username" required autofocus>
           <label for="txtpass" >Password</label>
           <input type="password" name="txtpass" id="txtpass" class="form-control" placeholder="Password" required>
           <span style="color:red;"><em><?php echo validation_errors(); ?></em></span> 
           <!-- <div class="checkbox">
             <label>
               <input type="checkbox" value="remember-me"> Remember me
             </label>
           </div> -->
           <br>
           <button class="btn btn-primary" type="submit">Sign in</button>
           <a href="<?php echo base_url('register'); ?>" name="btnReg" id="btnReg" class="btn btn-default">Register</a>
         </form>
    </div>
</div>