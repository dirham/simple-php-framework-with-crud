<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item active"><?=$data['breadcrumb'];?></li>
</ol>
<?php
    if(!empty($data['msg'])){
        // print_r($data['msg']);
        echo '<div class="alert alert-success">'.$data['msg'].'</div>';
    }
    // echo $data['msg'];
?>
 <form id="FormData" action="http://localhost/address/Home/add" method="POST" name="save">
  <div class="form-group">
    <label for="name">Full Name :</label>
    <input type="text" class="form-control" name="name" id="name" required="">
  </div>
  <div class="form-group">
    <label for="firstname">First Name :</label>
    <input type="text" class="form-control" name="firstname" id="firstname" required="">
  </div>

  <div class="form-group">
    <label for="zip">Zip Code :</label>
    <input type="text" class="form-control" name="zip" id="zip" required="">
  </div>
  <!-- <input type="text" name="city" id="selectq"> -->
  <div class="form-group">
  <label for="selectq">City :</label>
  <select class="form-control" name="city" id="selectq">
      <option>Select</option>
  </select>
  </div>
  <div class="form-group">
    <label for="address">Address :</label>
    <textarea class="form-control" id="address" name="address" required=""></textarea>
  </div>
  <input type="submit" name="save" class="btn btn-primary pull-right" value="Save">
</form>


 <script type="text/javascript">
    $(document).ready(function(){
       $('body').on('change', '#zip' ,function(event) {
            $.ajax({
                url     : 'http://localhost/address/Home/getData',
                type    : 'POST',
                dataType: 'json',
                data    : $('#FormData').serialize(),
                success : function( data ) {
                    console.log(data);
                        // delete lates value
                       $('#selectq').empty();
                        // Insert new options
                       $.each(data, function(key, value){
                            $('#selectq').append($("<option></option>").attr("value", value).text(value));
                       });
                },
                error: function(xhr, status, error) {
                      console.log(xhr+status);
                      var err = ["Zip not associated with any city"];
                        // delete lates option
                       $('#selectq').empty();
                      $.each(err, function(key, value){
                            $('#selectq').append($("<option></option>").attr("value", value).text(value));
                       });
                    }   
            });
        });
    });
    </script>

