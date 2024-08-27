<?php

    include 'config.php';

    if(empty($_FILES['image']['name'])){
        $new_name = $_POST['old_image'];

    }else{

        if($_FILES['image']){
            $error = array();
    
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = end(explode('.', $file_name));
    
            $extensions = array('jpeg','jpg','png');
    
            if(in_array($file_ext, $extensions)===false){
                $error[] = "This Extension file not allowed, please choose a jpeg,jpg,png";
            }
    
            if($file_size > 2097152){
                $error[] = "file size must be 2 MB or lower";
            }


            $new_name = time() . "-".basename($file_name);
            $target = "upload/". $new_name ;
            $image_name =  $new_name;


            if(empty($error)== true){
                move_uploaded_file($file_tmp, $target);
            }else{
                print_r($error);
                die();
            }
         }

    }


    $sql = "UPDATE post SET title='{$_POST['post_title']}',description='{$_POST['post_description']}',category={$_POST['post_category']},post_img='{$image_name}'
            
            WHERE post_id= {$_POST['post_id']};";


        if($_POST['old_category'] != $_POST['post_category']){
            
            $sql .= "UPDATE category SET post = post-1 WHERE category_id = {$_POST['old_category']};";
            $sql .= "UPDATE category SET post = post+1 WHERE category_id = {$_POST['post_category']};";


        }
        

        if(mysqli_multi_query($conn,$sql)){
            header("Location: http://localhost/try/admin/post.php");
    
        }else{
            echo "Delete Query Failed: ";
        }



?>