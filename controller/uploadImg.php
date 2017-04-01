<?php

$file_name=$_FILES['userImage']['name'] ;

if($file_name!= '')
{
    $tmp = explode('.', $file_name);
    $extension = end($tmp);
    //$extension = end(explode(".", $_FILES['file']['name']));
    $allowed_type = array("jpg", "jpeg", "png", "gif");
    if(in_array($extension, $allowed_type))
    {
        $new_name = rand() . "." . $extension;
        $path = "../view/images/" . $new_name;
        if(move_uploaded_file($_FILES['userImage']['tmp_name'], $path))
        {?>
            <img id="imgDish"src="<?php echo $path; ?>" width="140px" height="140px" />
            <button class="remove_image_btn btn btn-danger" data-path="<?php echo $path; ?>">X</button>
            <?php
        }
    }
    else
    {
        echo '<script>alert("Invalid File Format")</script>';
    }
}
else
{
    echo '<script>alert("Please Select File")</script>';
}

?>
