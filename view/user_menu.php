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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- stylesheets css -->

<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">

<link rel="stylesheet" href="css/hover-min.css">
<link rel="stylesheet" href="css/flexslider.css">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Handlee|Limelight" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
    <title>Order here!</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/extra_style.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="font-family: 'Handlee', cursive;
font-family: 'Limelight', cursive;">ANSA</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" class="smoothScroll">Home</a></li>
                <li><a href="index.php #feature" class="smoothScroll">About</a></li>
                <li><a href="index.php #menu" class="smoothScroll">Menu</a></li>
                <li class="active"><a href="#" class="smoothScroll">Order Online</a></li>
                <li><a href="index.php #contact" class="smoothScroll">Contact</a></li>
                <li><a href="#cart"><span class="glyphicon glyphicon-shopping-cart shop"></span> <span class="change">&nbsp;0&nbsp;Items</span> </a></li>
            </ul>
        </div>

    </div>
</div>



<div id="menu1" class="container">
    <div class="row">
        <br>
        <h3><span class="glyphicon glyphicon-grain"></span>OUR MENU<span class="glyphicon glyphicon-grain"></span></h3>
        <hr>
        <?php
        $query = "SELECT * FROM menu ORDER BY id ASC";
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div id="products" class="col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo $row["image"]; ?>" class="img-responsive image" /><br />
                    <div class="caption" style="margin-top: -30px;text-transform: uppercase;text-align: center;">
                        <h4 style="font-weight:600;"><?php echo $row["dish_name"];?></h4>
                        <h4 style="font-weight: 600;"> <?php echo "&#8377;" ;echo $row["price"]; ?></h4>
                        <input type="text" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control " value="1" style="display: none;"/>

                        <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["dish_name"]; ?>" />
                        <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["price"]; ?>" />
                        <button type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top:2px;border-radius: 0%;box-shadow:0px 0px 5px 0px #0c7a67;;background-color: #0F9E5E; height: 9%;width:95%;" class="btn btn-success btn-lg form-control add_to_cart">ADD TO CART &nbsp;&#9474;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span> </button>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
        <br>
    </div>
</div>







        <section id="cart">
            <div class="menu2">
                <div class="table-responsive" id="order_table" style="display: none;">
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
                                <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>&times;</button></td>
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
        </section>

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
        var cart_count=0;
        $('.add_to_cart').click(function(){
            var product_id = $(this).attr("id");
            var product_name = $('#name'+product_id).val();
            var product_price = $('#price'+product_id).val();
            var product_quantity = $('#quantity'+product_id).val();
            var action = "add";
            cart_count = cart_count + product_quantity;
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
            $.ajax({
                url:"../view/user_menu.php",
                success:function(){
                    $('.change').replaceWith(cart_count+" Items.");
                }
            })

        });
        $(document).on('click', '.delete', function(){
            var product_id = $(this).attr("id");
            var action = "remove";
            cart_count--;
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
            $.ajax({
                url:"../view/user_menu.php",
                success:function(){
                    $('.change').text(cart_count+" Items.");
                }
            })
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

        $(document).on('click','.shop',function(){
           $.ajax({
               url:"../view/user_menu.php",
               success:function(){
                   $('#order_table').slideToggle();
               }
           })
        });

    });
</script>

<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.backstretch.min.js"></script>

<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>

<script src="js/jquery.flexslider-min.js"></script>

<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>

<script src="js/custom.js"></script>
