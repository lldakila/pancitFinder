<div class="container">
	<h1>Welcome</h1>
	<?php echo $_SESSION['admin_session']['admin_name']; ?>
	<a class="btn btn-info" href="<?php echo base_url('Admin/Logout'); ?>">Log Out</a>
	<span><em>This page is restricted to unauthorized users. Only logged in users can see/access this page.</em></span>
	<br> <br>
	<a class=" btn btn-info" href="<?php echo base_url('admin/add-pancit'); ?>" class="btn">Add Panciteria</a>
	<br><br>
	<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>Panciteria</th>
        <th>Edit</th>
        <th style="text-align:center;">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    	foreach($pancits as $pancit){
    	echo '
    	<tr>
        <td>'.$pancit['p_name'].'</td>
        <td><a class="glyphicon glyphicon-pencil" style="color:green"; href="'.base_url('admin/edit/'.$pancit['p_id']).'"></a></td>
        <td align="center"><a class="glyphicon glyphicon-trash" style="color:red;" href="'.base_url('admin/delete/'.$pancit['p_id']).'"></a></td>
      </tr>';
      }
    ?> 
    </tbody>
	</table>
</div>