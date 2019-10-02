<style type="text/css" media="screen">
	.thumbnail a img{
		height: 360px;
	}
	.thumbnail :hover img{
		opacity: 0.7;
	}
	/*img{
		transition: 0.2s;
	}
	.thumbnail :hover{
		-ms-transform: scale(1.1); 
	    -webkit-transform: scale(1.1); 
	    transform: scale(1.1);
	}*/
</style>

<!-- error modal for login -->
<?php if($this->session->flashdata('yes')){ ?>
	<script type="text/javascript">
    $(window).on('load',function(){
        $('#error-login-modal').modal('show');
    });
	</script>

	<div class="modal" id="error-login-modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	          <h3>Warning!</h3>
	      </div>
	      <div class="modal-body">
					<span style="color:red;"><?php echo $this->session->flashdata('yes'); ?></span>
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?>

<br><br>
<div class="container">
	<?php foreach($pancits as $pancit){ echo'
		<div class="row">
		  <div class="col col-md-8 col-md-offset-2">
		    <div class="thumbnail">
		      <a href="pview/'.$pancit['p_id'].'">
		        <img src="'.base_url('upload/'.$pancit['p_imgLoc']).'" alt="" style="width:100%">
		        <div class="caption">
		          <p>'.$pancit['p_name'].'</p>
		        </div>
		      </a>
		   </div>
	  		</div>
	  	</div>';
	  	} 
	?>
</div>
<br><br>