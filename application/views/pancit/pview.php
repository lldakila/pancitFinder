<style>
	body{
  display: flex;
  min-height: 100vh;
  flex-direction: column;
  }
  main {
    flex: 1 0 auto;
  }
</style>
<div class="main">
<div class="container">
<!-- <div class="row"> -->
<?php  
	extract($pancits);
	//echo print_r($pprices);
	echo '<h4>'.$pancits['p_name'].'</h4>';
	// echo '<input type="hidden" name="lat" id="lat" val="'.$pancits['p_lat'].'">
	// 	  <input type="hidden" name="lng" id="lng" val="'.$pancits['p_lng'].'">';
	// echo $pancits['p_lat'];
  //echo $p_id;
?>
	<div name="pmap" id="map" style="height: 480px;width: 100%"></div>
	<br><br>
<?php
	$status = 'Closed';
	// get current time object
	$timestamp = time();
	// $currentTime = (new DateTime())->setTimestamp($timestamp);
	$currentTime = date('H:i');

	$startTime = date('H:i', strtotime($pancits['p_oTime']));
    $endTime   = date('H:i', strtotime($pancits['p_cTime']));

    if (($startTime <= $currentTime) && ($currentTime <= $endTime)) {
        $status = 'Open';
        //echo $status;
    }

    echo "<b>Currently $status</b>";

	echo '
		<p><b>Time Open: </b>'.date('h:ia', strtotime($pancits['p_oTime'])).'</p>
		<p><b>Time Close: </b>'.date('h:ia', strtotime($pancits['p_cTime'])).'</p>
	';
 ?>
<!-- </div> -->
<div class="container">
<div class="table-responsive col col-md-6">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Price</th>
        <th>Toppings</th>
      </tr>
    </thead>
    <tbody>
    <?php
    	foreach($pprices as $pprice){
    	echo '
    	<tr>
        <td>'.$pprice['pp_price'].'</td>
        <td>'.$pprice['pp_topps'].'</td>
      	</tr>';
      	}
    ?> 
    </tbody>
</table>
</div>
</div>

<br>
<div class="container" id="commentDiv">
  <?php if(isset($_SESSION['user_session'])){
    //action="'.base_url('Pancit/add_comment/'.$p_id).'"
    echo '<form method="POST" id="comment_form">
          <div class="form-group">
           <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5" minlength="1" maxlength="1000" required></textarea>
          </div>
          <div class="form-group">
           <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
          </div>
          '.validation_errors().'
        </form>
        ';
  }
  elseif(isset($_SESSION['admin_session'])){

  } 
  else{
    echo '<p><a href="'.base_url('login').'">Login</a> first to input comment</p>';
  }
  ?>

   <span id="comment_message"></span>
   <br />
   <div id="display_comment">
    <?php 
      // foreach($comments as $comment){
      //   echo '
      //     <div class="panel panel-default">
      //       <div class="panel-heading">By <b>'.$comment['user_name'].'</b> on <i>'.date('M-d-Y h:ia', strtotime($comment['pc_date'])).'</i></div>
      //       <div class="panel-body">'.$comment['pc_content'].'</div>
      //       <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="1">Reply</button></div>
      //     </div>
      //     ';
      // } 
    ?>
  
</div>

</div>
</div>
<br><br>

<script>
  // Note: This example requires that you consent to location sharing when
  // prompted by your browser. If you see the error "The Geolocation service
  // failed.", it means you probably did not give permission for the browser to
  // locate you.
  var map;
  function initMap() {

  	//{lat: 17.6319827, lng: 121.74105759999998}
    var origin = new google.maps.LatLng(17.6319827,121.74105759999998);
    console.log(origin);

    map = new google.maps.Map(document.getElementById('map'), {
      center:  origin,
      zoom: 17,
      gestureHandling: "greedy"
      //mapTypeId: 'satellite'
      //mapTypeId: 'terrain'
    });

    var marker1 = new google.maps.Marker({
        icon: {path: google.maps.SymbolPath.CIRCLE,
          scale: 5,
          strokeColor: '#338833',
          strokeOpacity: 0.5
        },
        animation:  google.maps.Animation.BOUNCE,
        map: map,
        position: origin,
        title: "start"
    });

    var marker2 = new google.maps.Marker({
        icon: {path: google.maps.SymbolPath.CIRCLE,
          scale: 5,
          strokeColor: '#FF0000',
          strokeOpacity: 0.5
        },
        animation:  google.maps.Animation.BOUNCE,
        map: map,
        title: "finish"
    });

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        origin = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        console.log(google.maps.LatLng(position.coords.latitude, position.coords.longitude));
        map.setCenter(origin);
        marker1.setPosition(origin);
      }, function() {
        alert("Error: The Geolocation service failed. Using default location");
      });
    } else {
      alert("Error: Your browser doesn't support geolocation. Using default location");
    }

    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    map.addListener('click', function(event) {
        // var destination = event.latLng;
        //var destination = {lat: 17.6135832,lng: 121.69990849999999};
        var destination = {lat: <?php echo $pancits['p_lat']; ?>,lng: <?php echo $pancits['p_lng']; ?>};
        marker2.setPosition(destination);
        console.log(origin);
        directionsService.route({
            origin: origin,
            destination: destination,
            travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
        directionsRenderer.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
    });
  }
</script>
<!-- old api key -->
<!-- <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuqZgavvNSBHVe9QgiWeOiv1aLGQNyMJg&callback=initMap">
</script> -->

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjMx9FcTfQLkuLATrMQWC_ynNtcNQ2lew&callback=initMap">
</script>

<script>
  //for comments
  $(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  //var form_data = $('#comment_content').val();
  $.ajax({
   url:"<?php echo base_url('Pancit/add_comment/'.$p_id); ?>",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
     if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     //$('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"<?php echo base_url('Pancit/fetch_comment/'.$p_id); ?>",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  //$('#comment_id').val(comment_id);
  $('#comment_content').focus();
 });
 
});
</script>