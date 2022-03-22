<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

  <style>
    .error{ color: red; }
  </style>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <?php
      if($this->session->flashdata('success')){ 
  ?>
    <div class="alert alert-success">     
         <?php echo $this->session->flashdata('success');  ?>
    </div>
  <?php } ?>
  <?php
      if($this->session->flashdata('error')){ 
  ?>
    <div class="alert alert-danger">     
         <?php echo $this->session->flashdata('error');  ?>
    </div>
  <?php } ?>
  <form id="register" method="post" action="<?php echo base_url('auth/postregister');?>">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" placeholder="Enter confirm password" name="confirmPassword">
    </div>
   
    <input type="submit" class="btn btn-primary" value="Regsiter">
    <a  class="btn btn-success" href="<?php echo base_url('/') ?>">Login Here</a>
  </form>
</div>
  <script type="text/javascript">
    $(document).ready(function() {
        $("#register").validate({
            rules: {
              name : {
                 required: true,
                 minlength: 3
              },
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 5
              },
              confirmPassword: {
              equalTo: '[name="password"]'
            }
          }
        });
      });
  </script>

</body>
</html>
