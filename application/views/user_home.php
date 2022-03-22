<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
        img {
            height: 170px;
            width: 140px
        }
  </style>
</head>
<body>

    <div class="container">
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Test Task</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url('products'); ?>">Home</a></li>
      <li><a href="<?php echo base_url('product/allProducts'); ?>">All Products</a></li>
      <li><a href="<?php echo base_url('product/myProducts'); ?>">My Products</a></li>
      <li><a href="<?php echo base_url('Auth/logout'); ?>">Log out</a></li>
    </ul>
  </div>
</nav>
<br>
    <h1>Welcome <?php echo  $this->session->userdata('name') ?></h1>
   
</div>

</body>
</html>