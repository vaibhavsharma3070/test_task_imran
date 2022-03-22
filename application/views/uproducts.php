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
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo base_url('/admin/userProducts') ?>">User Products</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admin/reports') ?>">Reports</a>
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
                <th>User</th>
                <th>User Status</th>
                <th>Image</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Product Status</th>
            </tr>
        </thead>
        <tbody>
          <?php if(count($products) > 0){
                  foreach($products as $product) {
          ?>
            <tr>
              <td><?php echo $product['name']; ?><br/><?php echo $product['email']; ?></td>
              <td>
                  <?php if($product['status'] == 0){?> 
                    <span class="btn btn-danger">In-Active</span> 
                  <?php } else { ?> 
                    <span class="btn btn-success">Active</span> 
                  <?php  } ?>  
                </td>
                <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" width="100" height="100"></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                  <?php if($product['pstatus'] == 0){?> 
                    <span class="btn btn-danger">In-Active</span> 
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
