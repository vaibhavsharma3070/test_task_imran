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
      <a class="nav-link active" href="<?php echo base_url('/admindashboard') ?>">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admin/products') ?>">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/admin/userProducts') ?>">User Products</a>
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
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          <?php if(count($users) > 0){
                  foreach($users as $user) {
          ?>
            <tr>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td>
                  <?php if($user->status == 0){?> <a href="javascript:void(0)" class="btn btn-danger btn-sm pt-2 btn-status" data-id="<?php echo $user->id; ?>">
                  Deactive
                </a> <?php } else { ?> <a href="javascript:void(0)" class="btn btn-success btn-sm pt-2 btn-status" data-id="<?php echo $user->id; ?>">
                  Active
                </a>  <?php  } ?>  
                </td>
            </tr>
         <?php } } else { ?> <tr><td colspan="6" align="center">No records found!!</td></tr>  <?php  } ?>   
        </tbody>
        </tfoot>
    </table>    
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#users').DataTable();

    $('body').on('click','.btn-status',function(){
      if(confirm("Are you sure you want to do this?")){
          $.ajax({
            url: '<?php echo base_url('admin/updateStatus'); ?>',
            type: 'POST',
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: 'json',
            success: function(data) {
                location.reload();
            }
        });
          return true;
      } else{
          return false;
      }
    });

  });
</script>

</body>
</html>
