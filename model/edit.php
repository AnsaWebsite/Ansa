<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 12-Dec-16
 * Time: 12:26 PM
 */
include_once "../helper/connect.php";

$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$sql = "UPDATE menu SET ".$column_name."='".$text."' WHERE id='".$id."'";
if(mysqli_query($connect, $sql))
{
    echo 'Data Updated';
}
?>