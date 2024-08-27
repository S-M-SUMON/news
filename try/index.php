<?php 
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

    


    <section id="bodysection">


        <div class="bodyDiv leftDiv">


        <?php 
            include 'config.php';
            $limit = 5;

            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page  =1;
            }

            $offset = ($page - 1) * $limit;

            $sql = "SELECT post.post_id, post.title, post.description, post.post_date, post.author,
            post.category, post.post_img ,category.category_name,  users.username   FROM post 

            LEFT JOIN category ON post.category = category.category_id
            LEFT JOIN users ON post.author = users.user_id
            ORDER BY post.post_id DESC
            LIMIT {$offset},{$limit}";

            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)){
            
        ?>

           <section>
           <div class="prent_div">
                <div class="chaild_div  chaild_div_left" >

                    <a href="single.php?id=<?php echo $row['post_id'];?>"><img src="<?php echo "admin/upload/".$row['post_img']?>" alt=""></a>
                </div>
                <div class="chaild_div  chaild_div_right" >
                    <a href="single.php?id=<?php echo $row['post_id'];?>"><h4><?php echo substr($row['title'],0,70)."...."?></h4></a>
                        <div>
                        <section class="activity_section"><a href="category.php?cid=<?php echo $row['category']?>"><img src="admin/image/type.png "><?php echo $row['category_name']?> </a></section>
                        <section class="activity_section"><a href="auther.php?aid=<?php echo $row['author']?>"><img src="admin/image/admin.png "><?php echo $row['username']?></a></section>
                        <section class="activity_section"><a href=""><img src="admin/image/date.png "><?php echo $row['post_date']?> </a></section>
                        </div>
                    <a href=""> <p  class="description_p_tag"> <?php echo substr($row['description'],0,120)."..."?></p></a>
                    <a class="read_more" href="single.php?id=<?php echo $row['post_id'];?>">Read More</a>
                
                </div>

            </div>

            <?php 
                }
            }else{
                echo"not record found";
            }
            ?>
           </section>
           
            <section id="paginations_user_Section">
                <?php 
                    $sql1 = "SELECT * FROM post";
                    $result1 = mysqli_query($conn,$sql1) or die("Suery failed");
                        if($page > 1){
                            echo '<a href="index.php?page='.($page - 1).'">prev</a>';
                        }
                    
                        if(mysqli_num_rows($result1) > 0){
                            $total_records = mysqli_num_rows($result1);
                            $total_pages = ceil($total_records / $limit);

                        for ($i = 1; $i <= $total_pages; $i++ ){
                                
                            if($i == $page){
                                $active = "activedddd";
                            }else{
                                $active = "";
                                }
                                echo " <a class='{$active}' href='index.php?page={$i}'>$i</a> " ;
                            }
                        if($total_pages > $page){
                             echo '<a  href="index.php?page='.($page + 1).'">Next</a>';
                            }
                        }
                    ?>
             </section>


        </div>


        <div class="bodyDiv rightDiv">
            <?php include'sitebar.php'; ?>
        </div>

   


   

</body>
</html>
</section>

    
<?php include "futer.php";?> 