<style>
  .navbar{
    margin-bottom: 0;
    border-radius: 0;
  }
</style>
<?php //echo validation_errors(); ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">PF</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" action="<?php echo base_url('Pancit/spancit'); ?>" method="GET">
        <div class="form-group">
          <?php //echo validation_errors(); ?>
          <input name="spansi" id="spansi" type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <?php 
        //if ($this->user_session->islogged){
        if (isset($_SESSION['user_session'])){
          echo '<ul class="nav navbar-nav navbar-right">
              <li><a href="'.base_url('User/logout').'">Logout</a></li>
              </ul>';
        }
        //elseif ($this->admin_session->islogged){
        elseif (isset($_SESSION['admin_session'])){
          echo '<ul class="nav navbar-nav navbar-right">
              <li><a href="Admin">Admin</a></li>
              </ul>';
        }
        else{
          echo '<ul class="nav navbar-nav navbar-right">
            <li><a href data-toggle="modal" data-target="#loginModal">Login</a></li>
            </ul>';
        }
        // else{
        //   echo '<ul class="nav navbar-nav navbar-right">
        //     <li><a href="'.base_url('login').'">Login</a></li>
        //     </ul>';
        // }
       ?>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div id="loginModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Login</h4>  
                </div>  
                <div class="modal-body"> 
                  <form id="frmlogin" class="form-signin" method="POST" action="<?php echo base_url(); ?>User/login_verify">
                  <?php echo validation_errors(); ?>
                  
                     <label>Username</label>  
                     <input type="text" name="txtuser" id="txtuser" class="form-control" required autofocus />  
                     <!-- <br />  --> 
                     <label>Password</label>  
                     <input type="password" name="txtpass" id="txtpass" class="form-control" required /> 
                     <a href="" name="fpass" id="fpass" >Forgot Password</a> 
                     <br />  
                     <!-- onclick="save();" -->
                     <button type="submit" name="login_button" id="login_button" class="btn btn-primary">Login</button>
                     <a href="<?php echo base_url('register'); ?>" name="btnReg" id="btnReg" class="btn btn-default">Register</a>
                  </form>  
                </div>  
           </div>  
      </div>  
  </div> 

<script type="text/javascript">
  // $(document).ready(function(){
  //   $("#frmlogin").on('submit', function(e){
  //     e.preventDefault();
  //       var form_data = {
  //         username : $('#txtuser').val(),
  //         password : $('#txtpasss').val(),
  //         ajax : '1'
  //       };
  //       console.log(form_data);
  //       //alert("Submitted");
  //       $.ajax({
  //       url:"<?php echo base_url(); ?>User/login",
  //       method: 'POST',
  //       data: form_data,
  //       dataType: 'text',
  //       success: function(data){
  //         // alert(data); 
  //       }
  //     });
  //   });

  // });

  // function save(){
  //   alert('ddsfsf');
  //   var username=$('#txtuser').val();
  //   var password=$('#txtpass').val();

  //    $.ajax({
  //       url: '<?php echo base_url();?>User/login',
  //       type: 'POST',
  //       data: {
  //           txtuser: username,
  //           txtpass: password

  //       },
  //       dataType: 'text',
  //       success: function(data) {
  //            // console.log(data);
  //           // alert(data);
  //           // alert("Succesfully Saved");
  //       //  location.reload(false);
  //       }
  //   }); 
  //}
</script>
