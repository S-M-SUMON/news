<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <section id="home_futer">
    <?php
            include "config.php";

            $sql = "SELECT * FROM settings";

            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)){
        ?>
            <h1><?php echo $row['footerdesc'] . $row['websitename'];?></h1>
        <?php 
                }
            }
        ?>
    </section>
    
</body>
</html>