<?php 
    include 'header.php';
    if($_SESSION["user_role"] == 0){ 
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
<body>

    <section id="add_button_section"> 
        <h1>ALL Category</h1>
        <button><a href="add_category.php">ADD CATEGOTY</a></button>
    </section>


    <section id="table_user_section">

        <div>
            <?php 
                    include 'config.php';
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result) > 0){ 
                       
                
            ?>
            <table border="black" cellpadding ="50">
                
                <thead>
                    <th>S.NO</th>
                    <th>CATEGORY NAME</th>
                    <th>NO. OF POST</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </thead>
                <?php 
                    $serial = 1;
                    while($row = mysqli_fetch_assoc($result)){
                    
                ?>
                <tr>
                    <td><?php echo $serial ;?></td>
                    <td style="text-align: start;"><?php echo $row['category_name'];?></td>
                    <td><?php echo $row['post'];?></td>
                    <td><a href="update_category.php?ceid=<?php echo $row['category_id'];?>">EDIT</a></td>
                    <td><a href="delete_category.php?cdid=<?php echo $row['category_id'];?>">DELETE</a></td>
                </tr>
                <?php 
                    $serial ++;
                    }
                ?>

            </table>
            <?php 
                  
                }
            ?>
        </div>

    </section>







</body>
</html>