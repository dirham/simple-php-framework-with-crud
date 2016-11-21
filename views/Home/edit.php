<h5>Current data</h5>
<pre><?php print_r($data['address']); ?></pre>

<a href="http://localhost/address/Home/add" style="margin: 5px;" class="btn btn-primary">Add New</a>

<?php
    if(!empty($data['msg'])){
        // print_r($data['msg']);
        echo '<div class="alert alert-success">'.$data['msg'].'</div>';
    }
    // echo $data['msg'];
?>
 <form id="FormData" action="http://localhost/address/Home/edit/<?=$data['form'];?>" method="POST" name="save">
<?php if (is_array($data['address'])){ ?>
<?php foreach ($data['address'] as $users): ?>
  <div class="form-group">
    <label for="name">Full Name :</label>
    <input type="text" name="name" class="form-control" value="<?php echo $users['name'] ?>" required="" >
  </div>

  <div class="form-group">
    <label for="firstname">First Name :</label>
    <input type="text" name="firstname" class="form-control" value="<?php echo $users['first_name'] ?>" required="" >
  </div>

  <div class="form-group">
    <label for="address">Address :</label>
    <textarea class="form-control" id="address" name="address" required=""><?php echo $users['address'] ?></textarea>
  </div>

  <div class="form-group">
    <label for="zip">Zip Code :</label>
    <input type="text" class="form-control" name="zip" value="<?php echo $users['zip'] ?>" id="zip" required="">
  </div>

  <div class="form-group">
  <label for="selectq">City :</label>
  <select class="form-control" name="city" id="selectq">
      <option value="<?php echo $users['city'] ?>"><?php echo $users['city'] ?></option>
  </select>
  </div>

  <input type="hidden" name="id" value="<?php echo $users['id'] ?>">
  <?php endforeach ?>
  <input type="submit" name="save" class="btn btn-primary pull-right" value="Save">
<?php } ?>
</form>
<br>
<br>
<hr>
<br>
<a href="http://localhost/address/Home/" style="margin: 5px;" class="btn btn-primary">Address List</a>

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
