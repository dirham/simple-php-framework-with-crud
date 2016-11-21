
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Home</li>
  <li class="breadcrumb-item active"><?=$data['breadcrumb'];?></li>
</ol>
<?php
    if(!empty($data['msg'])){
        echo "<div class='alert alert-success'>".$data['msg']."</div>";
    }
?>
<a href="http://localhost/address/Home/add" style="margin: 5px;" class="btn btn-primary">Add New</a>
<a href="http://localhost/address/Home/" style="margin: 5px;" class="btn btn-primary">Address List</a>
