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
      <li class="active"><a href="<?php echo base_url('product/allProducts'); ?>">All Products</a></li>
      <li><a href="<?php echo base_url('product/myProducts'); ?>">My Products</a></li>
      <li><a href="<?php echo base_url('Auth/logout'); ?>">Log out</a></li>
    </ul>
  </div>
</nav>
<br>
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
                       <button type="button" class="btn btn-primary add-product" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $product['id']; ?>">
                            Add To List
                        </button>
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
            <input type="text" class="form-control" id="quantity" name="quantity" value="0">
            <span class="error" style="color: red; display: none"></span>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Price($):</label>
             <input type="text" class="form-control" id="price" name="price" value="0">
             <span class="perror" style="color: red; display: none"></span>
          </div>
          <input type="hidden" id="pid">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#quantity").bind("keypress", function (e) {

            var keyCode = e.which ? e.which : e.keyCode

            if (!(keyCode >= 48 && keyCode <= 57)) {
                 $(".error").text('* allow only numeric');
                $(".error").css("display", "inline");

                return false;

            } else {
                $(".error").text('');
                $(".error").css("display", "none");

            }

        });

        $("#price").bind("keypress", function (e) {

            var keyCode = e.which ? e.which : e.keyCode

            if (!(keyCode >= 48 && keyCode <= 57)) {
                $(".perror").text('* allow only numeric');
                $(".perror").css("display", "inline");

                return false;

            } else {

                $(".perror").text('');
                $(".perror").css("display", "none");

            }

        });

    });
  $(document).ready(function() {
    $('body').on('click','#btn-submit',function(){
      var qty = $('#quantity').val();
      var price = $('#price').val();
      var flag = 1;
      if(qty <= 0 ){
        $(".error").text('Quantity can not be 0');
        $(".error").css("display", "inline");
      }
      if(price <= 0 ){
        $(".perror").text('Price can not be 0');
        $(".perror").css("display", "inline");
      }
      if(qty <= 0 || price <= 0){
        flag = 0;
      }
      if(flag == 1){
         $.ajax({
            url: '<?php echo base_url('product/addProducts'); ?>',
            type: 'POST',
            data: {
                id: $('#pid').val(),
                quantity: qty,
                price: price,
            },
            dataType: 'json',
            success: function(data) {
              if(data.status == false){
                alert(data.message)
              }else{
                window.location.href = 'myProducts';
              }
              
            }
        }); //$('#exampleModal').modal('hide');
      }
    });
    $('#exampleModal').on('hidden.bs.modal', function () {
      $('#quantity').val(0);
      $('#price').val(0);
    });

    $('body').on('click','.add-product',function(){
      var id = $(this).attr('data-id');
      $('#pid').val(id);
      $(".error").text('');
      $(".perror").text('');
      
    });
  });
</script>
</body>
</html>