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

<br><br>
<div class="container">
	<?php 
	$tmp_pid = '';
	if($pancits) {
		foreach($pancits as $pancit){ 
			if($tmp_pid != $pancit['p_id']){
				$tmp_pid = $pancit['p_id'];
				echo'
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
		} 
	}
	// else{s
	// 	echo '<h4>Nothing found containing "'.$message.'"</h4>';
	// 	//echo validation_errors();
	// }
	?>
</div>
<br><br>