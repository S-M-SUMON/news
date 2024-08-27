<?php 
    include 'header.php';
    // if($_SESSION["user_role"] == 0){ 
    //     header("location: http://localhost/try/admin/");
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #f0f2f5;">
    <h1 style="padding-left:20px;">Add New Post</h1><br>
    <section id="add_post_section">


            <form action="save_post.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Title</label><br>
                <input type="text" name="title"><br>

                <!-- error Start -->
                <?php if(isset( $_SESSION['title_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['title_error'] ?></p>
                <?php } unset( $_SESSION['title_error'])?>
                <!-- error end  -->

                <label for="">Description</label><br>
                <textarea  type="text" name="description" rows="5"></textarea><br>

                <!-- error Start -->
                <?php if(isset( $_SESSION['description_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['description_error'] ?></p>
                <?php } unset( $_SESSION['description_error'])?>
                <!-- error end  -->


                <label for="category">Category</label><br>
                    <select id="category" name="category" ><br>

                        <option disabled selected>Select Category</option>
                        <?php 
                            include "config.php";

                            $sql = "SELECT * FROM category";

                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                            }
 
                        ?>

                    </select>

                <!-- error Start -->
                <?php if(isset( $_SESSION['category_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['category_error'] ?></p>
                <?php } unset( $_SESSION['category_error'])?>
                <!-- error end  -->

                <label>Post Image</label><br>
                <input type="file"  name="image" ><br>

                <!-- error Start -->
                <?php if(isset( $_SESSION['image_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['image_error'] ?></p>
                <?php } unset( $_SESSION['image_error'])?>
                <!-- error end  -->

                <button type="submit" name="save">Save</button>
            
            </div>
            </form>
    </section>



    


    
    
</body>
</html>