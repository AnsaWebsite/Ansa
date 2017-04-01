<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 12-Dec-16
 * Time: 10:56 AM
 */
include_once "../helper/connect.php";
$query = "SELECT image FROM menu WHERE id = '".$_POST["id"]."'";
$result= mysqli_query($connect,$query);
if(mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $path = $row['image'];

    }
}

$sql = "DELETE FROM menu WHERE id = '".$_POST["id"]."'";
if(mysqli_query($connect, $sql))
{
    if($path!='')
    {
    $final_path="";
    $pa=$path;
    $pa=substr($pa,strpos($pa, "/view"));
    $final_path .="..".$pa;

    unlink($final_path);
    }
    echo 'Data Deleted';
}
?>