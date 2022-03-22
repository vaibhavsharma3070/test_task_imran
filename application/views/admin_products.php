<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
</head>
<body>

  <div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admindashboard') ?>">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admindashboard') ?>">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">Log Out</a>
    </li>
  </ul>
</nav>
<br>

  <div class="container-fluid">
    <table id="users" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          <?php if(count($products) > 0){
                  foreach($products as $product) {
          ?>
            <tr>
                <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" width="100" height="100"></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td>
                  <?php if($product['status'] == 0){?> 
                    <span class="btn btn-danger">Deactive</span> 
                  <?php } else { ?> 
                    <span class="btn btn-success">Active</span> 
                  <?php  } ?>  
                </td>
                
            </tr>
         <?php } } else { ?> <tr><td colspan="6" align="center">No records found!!</td></tr>  <?php  } ?>   
        </tbody>
        </tfoot>
    </table>    
  </div>
</div>
</body>
</html>
