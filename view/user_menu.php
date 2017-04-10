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
            <a class="navbar-brand" href="#" style="font-size: 200%;color: white;">ANSA</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Order Online</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div id="products" class="col-md-8 col-sm-8" style="margin-left:-50px; margin-right:40px;">
            <?php
            $query = "SELECT * FROM menu ORDER BY id ASC";
            $result = mysqli_query($connect,$query);
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <div class="col-md-6 col-sm-6" style="margin-top:24%;">
                    <div style=" height:300px;" align="center">
                        <img src="<?php echo $row["image"]; ?>" class="img-responsive" style="height:220px;" /><br />
                        <h4 class="text-info"><?php echo $row["dish_name"];?>  <?php echo str_repeat('&nbsp;',9); echo "Rs."; echo $row["price"]; ?></h4>
                        <!--<h4 class="text-danger">Rs. <?php echo $row["price"]; ?></h4>-->
                        <input type="text" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control " value="1" />
                        <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["dish_name"]; ?>" />
                        <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["price"]; ?>" />
                        <input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />
                    </div>
                </div>
                <?php
            }
            ?>
            <br>
        </div>



        <div id="cart" class="col-md-4 col-sm-4" style="margin-top:15%;">
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
                                <form method="post" action="cart.php">
                                    <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />
                                </form>
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