<?php 
    include 'header.php';
    if($_SESSION["user_role"] == 0){ 
        header("location: http://localhost/try/admin/");
    }

?>
<?php
    include "config.php";

    $userid = $_GET['id']; 

    $sql = "DELETE FROM users WHERE user_id = {$userid}";

    if(mysqli_query($conn, $sql)){
        header("location: http://localhost/try/admin/users.php");
    }else{
       echo  "<p>Con't Delete User Record</p>";
    }

    mysqli_close($conn);

?>