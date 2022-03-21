<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
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
                <th>Action</th>
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
                  <?php if($user->status == 0){?> <a href="javascript:void(0)" class="btn btn-danger btn-sm pt-2" data-toggle="modal" data-target="#changestatus">
                  <span class="glyphicon glyphicon-log-out"></span> Deactive
                </a> <?php } else { ?> <a href="<?php echo base_url('/'); ?>" class="btn btn-success btn-sm pt-2" data-toggle="modal" data-target="#changestatus">
                  <span class="glyphicon glyphicon-log-out"></span> Active
                </a>  <?php  } ?>  
                </td>
                
                <td><a href="javascript:void(0)" class="btn btn-warning btn-sm pt-2">
                  <span class="glyphicon glyphicon-log-out"></span> Delete
                </a></td>
            </tr>
         <?php } } else { ?> <tr><td colspan="6" align="center">No records found!!</td></tr>  <?php  } ?>   
        </tbody>
        </tfoot>
    </table>    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changestatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confrimation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to change status?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" class="btn btn-primary" value="Yes">
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#users').DataTable();
  });
</script>

</body>
</html>
