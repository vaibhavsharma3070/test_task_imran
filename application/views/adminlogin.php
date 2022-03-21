<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
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
  <h2>Admin Login</h2>
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
  <form id="login" method="POST" action="<?php echo base_url('auth/postlogin');?>">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
   
    <input type="submit" class="btn btn-primary" value="Login">
  </form>
</div>

  <script type="text/javascript">
    $(document).ready(function() {
        $("#login").validate({
            rules: {
              email: {
                required: true,
                email: true
              },
              password: {
                required: true
              },
          }
        });
      });
  </script>

</body>
</html>
