<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 12-Dec-16
 * Time: 10:57 AM
 */
include_once "../helper/connect.php";

$sql="INSERT INTO menu (id,dish_name,image,price) VALUES 
      ('".$_POST["id"]."','".$_POST["dish_name"]."','".$_POST["image"]."','".$_POST["price"]."')";
if(mysqli_query($connect,$sql))
{
    echo 'Data Inserted';
}
?>