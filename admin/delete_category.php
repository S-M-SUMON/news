<?php 
    

    include 'config.php';
    $cdid_id = $_GET['cdid'];

    $sql = "DELETE  FROM category WHERE category_id = {$cdid_id}";

    $result = mysqli_query($conn, $sql);

    if($result){
    header("location: http://localhost/try/admin/category.php");
    }else{
    echo "query faield";
    }
?>