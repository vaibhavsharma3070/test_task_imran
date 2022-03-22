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
    <div class="row text-center text-white">
        <div class="col-lg-3 m-0">
            <h1 class="display-4">Product List</h1>
        </div>
        <div class="col-lg-9 pull-right">
            <p>
                <a href="<?php echo base_url('Auth/logout'); ?>" class="btn btn-info btn-sm pt-2">
                  <span class="glyphicon glyphicon-log-out"></span> Log out
                </a>
            </p> 
        </div>
    </div>
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
                           <!--  <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">₹64,999</h6>
                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                </ul>
                            </div> -->
                        </div><img src="<?php echo $product['image']; ?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
                <!-- list group item-->
                <?php } ?>
            </ul> <!-- End -->
        </div>
    </div>
</div>

</body>
</html>