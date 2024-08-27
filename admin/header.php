<?php 
    session_start();

    if(!isset($_SESSION["username"])){
    header("location: http://localhost/try/admin/");
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body class="admin_header_body">

<section id="user_header_section"> 
        <?php
            include "config.php";

            $sql = "SELECT * FROM settings";

            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)){
        ?>

        <h1><?php echo $row['websitename'];?></h1>
        <?php
                }
            }
        ?>

        <button><a href="logout.php">Hello <?php echo $_SESSION["username"];?> You are a <?php if($_SESSION["user_role"] ==1 ){echo "admin";}else{echo "User";}?> LOGOUT</a></button>
    </section>
    <section id="user_menu">
        <ul>
            <li><a href="post.php">POST</a></li>

            <?php 
                if($_SESSION["user_role"] == 1){ 
    
            ?>
            <li><a href="category.php">CATEGORY</a></li>
            <li><a href="users.php">USERS</a></li>
            <li><a href="settings.php">SETTINGS</a></li>
            <?php }?>
        </ul>
    </section>
</body>
</html>