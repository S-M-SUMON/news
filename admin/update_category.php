<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <section id="add_post_section">
        <div>
        <?php 
                include 'config.php';
                $ceid_id = $_GET['ceid'];
                

                $sql = "SELECT category.category_id,category.category_name  FROM category WHERE category.category_id ='{$ceid_id}'";
                $result = mysqli_query($conn, $sql);
                    
                if(mysqli_num_rows($result) > 0){ 
                while($row = mysqli_fetch_assoc($result)){
                    
                ?>
                       
                
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <label for="">category Name</label>
                <input type="text" name="categoryname" value="<?php echo $row['category_name'];?>">

                <button name="submit_save">Save</button>
            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>

<?php 
    
    if(isset($_POST['submit_save'])){
        include 'config.php';
        $ceid_id = $_GET['ceid'];

        $sql = "UPDATE category SET category_name= '{$_POST['categoryname']}'  
        WHERE category_id= '{$ceid_id}'";

        echo  $result = mysqli_query($conn, $sql);

        if($result){
        header("location: http://localhost/try/admin/category.php");
        }else{
        echo "query faield";
        }
    }




?>




