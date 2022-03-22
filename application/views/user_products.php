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
      <li><a href="<?php echo base_url('products'); ?>">Home</a></li>
      <li><a href="<?php echo base_url('product/allProducts'); ?>">All Products</a></li>
      <li class="active"><a href="<?php echo base_url('product/myProducts'); ?>">My Products</a></li>
      <li><a href="<?php echo base_url('Auth/logout'); ?>">Log out</a></li>
    </ul>
  </div>
</nav>
<br>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <?php foreach ($products as $product) { ?>

                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $product['title']; ?></h5>
                            <p class="font-italic text-muted mb-0 small"><?php echo $product['description']; ?></p>
                        </div><img src="<?php echo $product['image']; ?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                        <p><b>Quantity ::</b> <?php echo $product['quantity']; ?></p>
                        <p><b>Price ::</b> <?php echo $product['price']; ?>$</p>
                       
                    </div> <!-- End -->
                </li> <!-- End -->
                <!-- list group item-->
                <?php } ?>
            </ul> <!-- End -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product To List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
            <span class="error" style="color: red; display: none"></span>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Price($):</label>
             <input type="text" class="form-control" id="price" name="price">
             <span class="perror" style="color: red; display: none"></span>
          </div>
          <input type="text" id="pid">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>