
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Home</li>
  <li class="breadcrumb-item active"><?=$data['breadcrumb'];?></li>
</ol>
<?php
    if(!empty($data['msg'])){
        echo "<div class='alert alert-success'>".$data['msg']."</div>";
    }
?>
<pre>
	<?=nl2br($data['intro']);?>
</pre>