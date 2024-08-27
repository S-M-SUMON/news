<?php 
    include 'header.php';
    // if($_SESSION["user_role"] == 0){ 
    //     header("location: http://localhost/try/admin/");
    // }

?>

<?php


    if(isset($_POST['save'])){
        session_start();

        $title = $_POST["title"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $img = $_POST["image"];


        if(!$title){
            $_SESSION['title_error'] = "title field is Required!!";
            header("location: add_post.php");
        }elseif(strlen($title) > 499){
            $_SESSION['title_error'] = "Error: Title cannot exceed 100 characters.";
            header("location: add_post.php");
        }elseif(!$description){
            $_SESSION['description_error'] = "title field is Required!!";
            header("location: add_post.php");
        }elseif(strlen($description) > 9998){
            $_SESSION['description_error'] = "Error: Title cannot exceed 999 characters.";
            header("location: add_post.php");
        }elseif(!$category){
            $_SESSION['category_error'] = "Select a Category";
            header("location: add_post.php");
        }
        elseif(!$img){
            $_SESSION['image_error'] = "Select a image";
            header("location: add_post.php");
        }

    }
    include "config.php";
     if($_FILES['image']){
        $error = array();

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = explode('.', $file_name);
        $file_ext = end($file_ext);


        $extensions = array('jpeg','jpg','png');

        if(in_array($file_ext, $extensions)===false){
            $error[] = "This Extension file not allowed, please choose a jpeg,jpg,png";
        }

        if($file_size > 2097152){
            $error[] = "file size must be 2 MB or lower";
        }

        $new_name = time() . "-".basename($file_name);
        $target = "upload/". $new_name ;

        if(empty($error)== true){
            move_uploaded_file($file_tmp, $target);
        }else{
            print_r($error);
            die();
        }
     }

    

    //    session_start();

       $title = $_POST["title"];
       $description = $_POST["description"];
       $category = $_POST["category"];

       $date = date("d M,Y");
       $author =  $_SESSION["user_id"];

       $sql = "INSERT INTO post(title,description,category,post_date,author,post_img) 
       
       VALUES('{$title}','{$description}','{$category}','{$date}','{$author}','{$new_name}');";

       $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";

       if(mysqli_multi_query($conn, $sql)){
            header("location: http://localhost/try/admin/post.php");
       }else{
            echo "query faield";
       }
 
    ?>