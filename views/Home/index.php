
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
<table class="table table-hover table-bordered" data-pagination="true" data-striped="true" data-page-size="5" data-height="350" data-search="true" id="table">
        <thead style="background: #4c9ed9;">
            <tr>
                <th data-field="id" data-sortable="true">#ID</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="first_name" data-sortable="true">First Name</th>
                <th data-field="address" data-sortable="true">Address</th>
                <th data-field="zip" data-sortable="true">ZIP Code</th>
                <th data-field="city" data-sortable="true">City</th>
                <th data-field="id" data-formatter="nameFormatternilai" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<a href="http://localhost/address/Home/xmlExport" class="btn btn-default pull-right">Download as Xml</a>
<hr>
<script type="text/javascript">
   function myFunct() {
   if (document.getElementById("demo"))
     var message = "really ? delete this one ?";
    if ( message ) return confirm (message);
     else return confirm ("undefined");

}

        function nameFormatternilai(value, row, index) {
           var edit = 'Edit';
           // var con = confirm('yaji');
           var hapus = 'Hapus';
           return "<a href='http://localhost/address/Home/edit/"+value+"'>Edit</a> | <a id='demo' onclick='return myFunct()' href='http://localhost/address/Home/delete/"+value+"'>Delete</a>";
            
            }
</script>
    <script type="text/javascript">

           $(function () {
                $('#table').bootstrapTable({
                    data: <?php echo json_encode($data['address']); ?>
            });
            });
    </script>