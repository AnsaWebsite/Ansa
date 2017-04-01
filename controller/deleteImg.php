<?php
//deleteImg.php

if(!empty($_POST["path"]))
{
    $final_path="";
    $pa=$_POST["path"];
    $pa=substr($pa,strpos($pa, "/view"));
    $final_path .="..".$pa;
    if(unlink($final_path))
    {
        echo ' ';
    }
}
?>