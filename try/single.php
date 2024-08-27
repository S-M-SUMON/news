<?php 
    include 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<section id="bodysection">

<div class="bodyDiv leftDiv">

    <div class="prent_div single_section">

            <?php 
                include 'config.php';
                
                $post_id = $_GET['id'];
    
                $sql = "SELECT * FROM post  
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN users ON post.author = users.user_id
                WHERE post.post_id = '{$post_id}'";

                $result = mysqli_query($conn,$sql) or die("Connection Failed");

                if(mysqli_num_rows($result) > 0 ){
                    while($row = mysqli_fetch_array($result)){
                
            ?>
        
            <div class="chaild_div_right" >
                <a href=""><h2><?php echo $row['title']?></h2></a>
                    <div>
                        <section class="activity_section"><a href="category.php?cid=<?php echo $row['category']?>"><img src="admin/image/type.png "><?php echo $row['category_name']?> </a></section>
                        <section class="activity_section"><a href="auther.php?aid=<?php echo $row['author']?>"><img src="admin/image/admin.png "><?php echo $row['username']?></a></section>
                        <section class="activity_section"><a href=""><img src="admin/image/date.png "><?php echo $row['post_date']?></a></section>
                    </div>
            

            <a href=""><img class="main_image" src="<?php echo "admin/upload/".$row['post_img']?>" alt=""></a>
            <p><?php echo $row['description']?> </p>
        
        </div>
        
        <?php 
                }
            }else{
                echo"not record found";
            }
        ?>


    </div>
</div>


<div class="bodyDiv rightDiv">
    <?php include'sitebar.php'; ?>
</div>

</section>
    
</body>
</html>
    
<?php include "futer.php";?> 