<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Website Settings</h1>

    <section id="setting_section">
        <?php
            include "config.php";
        

            $sql = "SELECT * FROM settings";

            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)){


        ?>
        <form action="save_settings.php" method="POST"  enctype="multipart/form-data">
            <div>
                <div>
                    <label for="">Website Name</label><br>
                    <input type="text" name="websitename" value="<?php echo  $row['websitename'];?>"><br>
                </div>
                <div>
                    <label for="">Website Logo</label><br>
                    <input type="file" name="logo"><br>

                    <img src="image/<?php echo $row['logo'];?>">
                    <input type="hidden" name="old_logo" value="<?php echo  $row['logo'];?>">
                </div>
                <div>
                    <label for="">Fotter Decsription</label><br>
                    <textarea id="" rows="5" name="footerdesc"><?php echo  $row['footerdesc'];?></textarea><br>
                </div>

                <button type="submit" name="save_settings">Save</button>
            </div>
        </form>
        <?php 
                }
            }
        ?>
    </section>

    
</body>
</html>