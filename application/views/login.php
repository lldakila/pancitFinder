<div class="container">
       <div class="col-md-4 col-md-offset-4">
         <form class="form-signin" action="<?php echo base_url('Login/verify');?>" method="post">

           <h2 class="form-signin-heading">Please sign in</h2>
          <?php// echo $this->session->flashdata('msg'); ?> 
           <label for="txtuser" >Username</label>
           <input type="" name="txtuser" id="txtuser" class="form-control" placeholder="Username" required autofocus>
           <label for="txtpass" >Password</label>
           <input type="password" name="txtpass" id="txtpass" class="form-control" placeholder="Password" required>
           <?php echo validation_errors(); ?> 
           <div class="checkbox">
             <label>
               <input type="checkbox" value="remember-me"> Remember me
             </label>
           </div>
           <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
         </form>
       </div>
       </div> <!-- /container -->