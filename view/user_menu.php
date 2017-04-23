<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 14-Dec-16
 * Time: 21:15 PM
 */
include_once "../helper/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | Multi Tab Shopping Cart By Using PHP Ajax Jquery Bootstrap Mysql</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/extra_style.css"/>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<br>

<img class="backgrnd" src="../view/body.jpg" class="img-responsive"/>
<h1 class="text-center">ORDER ONLINE</h1>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-size: 200%;color: white;">ANSA</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="index.php #feature">About us</a></li>
              <li><a href="#">Menu</a></li>
              <li><a href="user_menu.php">Order Online</a></li>
              <li><a href="#contact">Contact</a></li>
           </ul>
        </div>
    </div>
</nav>


</nav>

<div class="container">
    <div class="row">
        <div class="page-header" style="text-align: center;">
            <h1>OUR MENU</h1>
            <h1>Order now and have fun!</h1>
        </div>
        <div id="products" class="col-md-7">
            <?php
            $query = "SELECT * FROM menu ORDER BY id ASC";
            $result = mysqli_query($connect,$query);
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <div class="col-md-6">
                    <div class="thumbnail" style="border-radius: 0%">
                        <img src="<?php echo $row["image"]; ?>" class="img-responsive" style="height:200px; width: 100%;" /><br />
                        <div class="caption">
                        <h4 class="text-info"><?php echo $row["dish_name"];?>  <?php echo str_repeat('&nbsp;',9); echo "Rs."; echo $row["price"]; ?></h4>
                        <!--<h4 class="text-danger">Rs. <?php echo $row["price"]; ?></h4>-->
                        <!--<input type="text" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control " value="1" />-->
                        <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["dish_name"]; ?>" />
                        <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["price"]; ?>" />
                        <input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />
                    </div>
                    </div>
                </div>

                <?php
            }
            ?>
            <br>
        </div>



        <div id="cart" class="col-md-5" style="margin-top:15%;">
            <div class="menu2">
            <div class="table-responsive" id="order_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                            ?>
                            <tr>
                                <td><?php  echo $values["product_name"]; ?></td>
                                <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>
                                <td align="right"><?php  echo $values["product_price"]; ?></td>
                                <td align="right"><?php  echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
                                <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>
                            </tr>
                            <?php
                            $total = $total + ($values["product_quantity"] * $values["product_price"]);
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td align="right">$ <?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" align="center">
                                <input type="button" value="Place_Order" id="submitBtn"
                                       data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" />
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

    </div>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                <form method="post" action="../controller/cart.php">
                    Name: <input type="text" name="name" value="" pattern="[A-Za-z ]+" required>

                    <br><br>
                    E-mail: <input type="email" name="email" value="" >

                    <br><br>
                    contact_no: <input type="text" name="contact_no" value="" pattern="[789][0-9]{9}" required>

                    <br><br>
                    Address: <input type="text" name="address" value="" required>

                    <br><br>
                    Landmark: <input type="text" name="landmark" value="">
                    <br><br>
                    <input type="submit" name="place_order" value="Place Order">

                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(data){
        $('.add_to_cart').click(function(){
            var product_id = $(this).attr("id");
            var product_name = $('#name'+product_id).val();
            var product_price = $('#price'+product_id).val();
            var product_quantity = $('#quantity'+product_id).val();
            var action = "add";
            if(product_quantity > 0)
            {
                $.ajax({
                    url:"../controller/action.php",
                    method:"POST",
                    dataType:"json",
                    data:{
                        product_id:product_id,
                        product_name:product_name,
                        product_price:product_price,
                        product_quantity:product_quantity,
                        action:action
                    },
                    success:function(data)
                    {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                        alert("Product has been Added into Cart");
                    }
                });
            }
            else
            {
                alert("Please Enter Number of Quantity")
            }
        });
        $(document).on('click', '.delete', function(){
            var product_id = $(this).attr("id");
            var action = "remove";
            if(confirm("Are you sure you want to remove this product?"))
            {
                $.ajax({
                    url:"../controller/action.php",
                    method:"POST",
                    dataType:"json",
                    data:{product_id:product_id, action:action},
                    success:function(data){
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                    }
                });
            }
            else
            {
                return false;
            }
        });
        $(document).on('keyup', '.quantity', function(){
            var product_id = $(this).data("product_id");
            var quantity = $(this).val();
            var action = "quantity_change";
            if(quantity != '')
            {
                $.ajax({
                    url:"../controller/action.php",
                    method:"POST",
                    dataType:"json",
                    data:{product_id:product_id, quantity:quantity, action:action},
                    success:function(data){
                        $('#order_table').html(data.order_table);
                    }
                });
            }
        });
    });
</script>