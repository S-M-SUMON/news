<?php 
    include "config.php";
    if(empty($_FILES['logo']['name'])){
        $file_name = $_POST['old_logo'];
       
    }else{
        $error = array();

       $file_name = $_FILES['logo']['name'];
       $file_size = $_FILES['logo']['size'];
       $file_tmp = $_FILES['logo']['tmp_name'];
       $file_type = $_FILES['logo']['type'];
       $exp = explode('.', $file_name);
       $file_ext = end($exp);


       $extensions = array('jpeg','jpg','png');

       if(in_array($file_ext, $extensions)===false){
           $error[] = "This Extension file not allowed, please choose a jpeg,jpg,png";
       }

       if($file_size > 2097152){
           $error[] = "file size must be 2 MB or lower";
       }
       if(empty($error)== true){
           move_uploaded_file($file_tmp, "image/". $file_name);
       }else{
           print_r($error);
           die();
       }
    }

   

   //    session_start();

     

    $sql = "UPDATE settings SET websitename='{$_POST['websitename']}', logo='{$file_name}', footerdesc='{$_POST['footerdesc']}' " ;
    $result = mysqli_query($conn,$sql) or die("query feaild");
      

      if(mysqli_multi_query($conn, $sql)){
           header("location: http://localhost/try/admin/post.php");
      }else{
           echo "query faield";
      }


?>