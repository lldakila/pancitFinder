<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      /*html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }*/
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
</style>


<div class="container">
	<h2>Add Panciteria</h2>
	<div class="col-lg-10 col-sm-12 col-m-12 offset-lg-1">
		<?php echo validation_errors(); ?>
    <div class="container">
    	 <!-- img upload -->
      <form action="" method="POST" id="upload_form" align="left" enctype="multipart/form-data">
        <label for="image_file">Image for Panciteria</label>
			  <input type="file" name="image_file" id="image_file" required/>
			  <br>
			  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info"/>
			</form>
			<br>
			
		  <!-- <div class="row"><div class="col-lg-6 alert alert-info">Google Map autocomplete Example</div></div> -->
		  <?php echo validation_errors(); ?>
		  <form method="post" id="addPansi" action="<?php echo base_url('Admin/AddPancit/addpInfo'); ?>">
		    <div class="row">
		              <div class="col col-lg-10">
		              	<div id="uploaded_image"></div>
		                 <label for="pname">Name of Panciteria</label>
		                  <input type="text" name="pname" id="pname" class="form-control" placeholder="Name of Panciteria" required autofocus><br>
						
		                <input type="hidden" name="lat" id="lat">
		                <input type="hidden" name="lng" id="lng">
		                <input type="hidden" name="location" id="location">


						<label for="pmap">Location of Panciteria</label>
		                <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
				          <div id="type-selector" class="controls">
				            <input type="radio" name="type" id="changetype-all" checked="checked">
				            <label for="changetype-all">All</label>
				          </div>
		          		<div name="pmap" id="map" style="height: 480px;width: 100%"></div>
		          		<br>
		          		<label>Time Open<input type="time" name="potime" value="" required></label>
		          		<label>Time Close<input type="time" name="pctime" value="" required></label>   
		          		<br>
		          		<div class="container" id="prange">
		          		<label for="pprice">Price<input type="text" name="pprice[]" id="pprice" pattern="-?[0-9]*(\.[0-9]+)?" minlength="2" maxlength="3" required onkeypress="return isNumberKey(event)"></label>
		          		<label for="ptopps">Toppings<input type="text" name="ptopps[]" id="ptopps" required></label>
		          		<a href="#" id="add">Add More</a>
		          		</div>
		          		<br>
		          		<br>

		          <input type="submit" name="submit" value="Save" class="col col-lg-3 btn btn-info btn-lg">
		          <a href="<?php echo base_url('admin/dashboard'); ?>" class="col col-lg-3 btn btn-danger">Cancel</a>
		            </div>
		      </div><!--End of row-->
		  </form>
		</div><!--End of container-->
	</div>
</div>

<br>
<br>
<br>

<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 17.6319827, lng: 121.74105759999998},
          zoom: 21
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(50);  // Why 17? Because it looks good.
          }
          // marker.setIcon(/** @type {google.maps.Icon} */({
          //   url: place.icon,
          //   size: new google.maps.Size(71, 71),
          //   origin: new google.maps.Point(0, 0),
          //   anchor: new google.maps.Point(17, 34),
          //   scaledSize: new google.maps.Size(35, 35)
          // }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
var item_Lat =place.geometry.location.lat();
var item_Lng= place.geometry.location.lng();
var item_Location = place.formatted_address;
//alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
$("#lat").val(item_Lat);
$("#lng").val(item_Lng);
$("#location").val(item_Location);



          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjMx9FcTfQLkuLATrMQWC_ynNtcNQ2lew&libraries=places&callback=initMap"
        async defer>
    
    </script>

	<!-- script for ajax img upload -->
    <script>
	$(document).ready(function(){
		$('#upload_form').on('submit', function(e){ 
			e.preventDefault();
		if($('#image_file').val() == ''){
			alert("Please Select the File");
		}
		else{
			$.ajax({
				url:"<?php echo base_url(); ?>Admin/AddPancit/ajax_upload",
				method:"POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data){
					$('#uploaded_image').html(data);
					//$('#addPansi').html(data);
				}
			});
		}
		});
	});
	</script>

	<!-- function for number only input for price -->
	<script type="text/javascript" charset="utf-8" async defer>
		function isNumberKey(evt){
		    var charCode = (evt.which) ? evt.which : event.keyCode
		    if (charCode > 31 && (charCode < 48 || charCode > 57))
		        return false;
		    return true;
		}
	</script>
	
	<!-- to add more input fields for price and ingredients -->
	<script>
		$(document).ready(function(e){
			//varriables
			var html = '<p /><div><label for="pprice">Price<input type="text" name="pprice[]" id="childpprice" pattern="-?[0-9]*(\.[0-9]+)?" minlength="2" maxlength="3" required onkeypress="return isNumberKey(event)"></label><label for="ptopps">Toppings<input type="text" name="ptopps[]" id="childptopps" required></label><a href="#" id="remove">X</a>';

			var maxRows = 4;
			var c = 1;


			//add rows
			$("#add").click(function(e){
				if(c <= maxRows){
					$("#prange").append(html);
					c++;
				}
				
			});


			//remove rows
			$("#prange").on('click','#remove' ,function(e){
				$(this).parent('div').remove();
				c--;
			});


			//populate values from the first row

		});
	</script>