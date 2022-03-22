<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <style type="text/css">
    .nav-item .active{
      background: #eee;
    }
  </style>
</head>
<body>

  <div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admindashboard') ?>">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admin/products') ?>">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admin/userProducts') ?>">User Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo base_url('/admin/reports') ?>">Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">Log Out</a>
    </li>
  </ul>
</nav>
<br>
<p>Count of all active and verified users :: <b><?php echo $active_user_count; ?></b></p>
<hr/>
<p>Count of active and verified users who have attached active products :: <b><?php echo $active_user_product_count; ?></b><p>
<hr/>
<p>Count of all active products :: <b><?php echo $active_product_count; ?></b><p>
<hr/>
<p>Count of active products which don't belong to any user :: <b><?php echo $active_product_no_user_count; ?></b><p>
<hr/>
<p>Amount of all active attached products :: <b><?php echo $active_attach_product_amount; ?></b><p>
<hr/>
<p>Summarized price of all active attached products :: <b><?php echo $summarized_active_attach_product_price; ?></b><p>
<hr/>
<p>Summarized prices of all active products per user :: <p>
<div class="row"> 
  <div class="col-lg-4 font-weight-bolder">Name</div>
  <div class="col-lg-4 font-weight-bolder">Email</div>
  <div class="col-lg-4 font-weight-bolder text-right">Price</div>
<?php  $total = 0 ; ?>
<?php foreach($summarized_active_attach_product_price_user as $res){ ?>
  <div class="col-lg-4"><?php echo $res['name']; ?></div>
  <div class="col-lg-4"><?php echo $res['email']; ?></div>
  <div class="col-lg-4 text-right"><?php echo $res['total']; ?></div>
<?php $total += $res['total']; ?>
<?php } ?>
  <div class="col-lg-4"></div>
  <div class="col-lg-4 font-weight-bolder">Total</div>
  <div class="col-lg-4 font-weight-bolder text-right"><?php echo $total; ?></div>
</div>
<hr/>
<p>The exchange rates for USD and RON based on Euro using https://exchangeratesapi.io/<p>
<p>Date :: <b><?php echo $exRates['date']; ?></b></p>
<p>Base :: <b><?php echo $exRates['base']; ?></b></p>
<p>USD :: <b><?php echo $exRates['rates']['USD']; ?></b></p>
<p>RON :: <b><?php echo $exRates['rates']['RON']; ?></b></p>
</div>
</body>
</html>
