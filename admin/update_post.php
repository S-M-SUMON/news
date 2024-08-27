<?php 
    include 'header.php';
    

    if($_SESSION["user_role"] == 0){ 
        include "config.php";
        $post_id = $_GET['id'];
        $sql2 = "SELECT author FROM post WHERE post_id = '{$post_id}'";

        $result2 = mysqli_query($conn,$sql2) or die("Connection Failed");

        $row2 = mysqli_fetch_assoc($result2);

        if($row2['author'] != $_SESSION["user_id"]){
            header("location: http://localhost/try/admin/post.php");
        }
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

<h1 style="padding-left:20px;">Edit post</h1><br>
    <section id="add_post_section">

    <?php
        include "config.php";
        $post_id = $_GET['id'];
        // echo $post_id;

        $sql = "SELECT  post.post_id, post.title, post.description,
                post.post_img,category.category_name, post.category FROM post
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN users ON post.author = users.user_id
                WHERE post.post_id = '{$post_id}'";

        $result = mysqli_query($conn,$sql) or die("Connection Failed");

        if(mysqli_num_rows($result) > 0 ){
            while($row = mysqli_fetch_array($result)){


    ?>



            <form action="sava_update_post.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="" value="<?php echo $row['post_id'];?>" name="post_id">

                <label for="">Title</label><br>
                <input type="text" name="post_title" value="<?php echo $row['title'];?>"><br>

                <!-- error Start -->
                <?php if(isset( $_SESSION['title_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['title_error'] ?></p>
                <?php } unset( $_SESSION['title_error'])?>
                <!-- error end  -->

                <label for="">Description</label><br>
                <textarea  name="post_description" rows="5" value="<?php echo $row['description'];?>" ><?php echo $row['description'];?> </textarea><br>

                <!-- error Start -->
                <?php if(isset( $_SESSION['description_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['description_error'] ?></p>
                <?php } unset( $_SESSION['description_error'])?>
                <!-- error end  -->

                <label for="category">Category</label><br>
                    <select id="category" name="post_category" ><br>

                        <option disabled selected>Select Category</option>
                        <?php 
                            include "config.php";

                            $sql1 = "SELECT * FROM category";

                            $result1 = mysqli_query($conn, $sql1);

                            if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_assoc($result1)){

                                    if($row['category'] == $row1['category_id']){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }

                                    echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                                }
                            } 
 
                        ?>

                    </select>
                    <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">

                <!-- error Start -->
                <?php if(isset( $_SESSION['category_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['category_error'] ?></p>
                <?php } unset( $_SESSION['category_error'])?>
                <!-- error end  -->

                <label>Post Image</label><br>
                <input type="file"  name="image" ><br>

                <img src="upload/<?php echo $row['post_img'];?>" width="100px" height="100px"><br>
                <input type="hidden" name="old_image" value="<?php echo $row['post_img'];?>">

                <!-- error Start -->
                <?php if(isset( $_SESSION['image_error'])){?>
                <p style="color:red;"><?php echo  $_SESSION['image_error'] ?></p>
                <?php } unset( $_SESSION['image_error'])?>
                <!-- error end  -->
                

                <button type="submit" name="save">Save</button>
            
            </div>
            </form>
            <?php } 
                    }else{
                        echo "Result Not Found";
                    }
                ?>

    </section>





    
</body>
</html>