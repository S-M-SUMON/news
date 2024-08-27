<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body class="sitebar_body">
    
    <section >
        <div>

            <div>
                <div class="serText"><h2>SEARCH</h2></div>
            </div>

            <form action="search.php" method="GET">
                <div class="cerInput">
                    <input type="text" name="search" placeholder="search news">
                    <button type="submit" >SEARCH</button>
                </div>
            </form>

        </div>

    </section>

    <section id="search_resent">
            <div class="resent">
                <div class="recentText"></div>
                <h2>RECENT POSTS</h2>
            </div>
    </section>


    <section>
            <?php 
                include 'config.php';

                $limit  =5; 

                $sql = "SELECT post.post_id, post.title, post.description, post.post_date, post.author,
                post.category, post.post_img ,category.category_name,  users.username   FROM post 

                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN users ON post.author = users.user_id
                ORDER BY post.post_id DESC
                LIMIT {$limit}";

                $result = mysqli_query($conn,$sql) or die("Connection Failed");

                if(mysqli_num_rows($result) > 0 ){
                    while($row = mysqli_fetch_array($result)){
            
            ?>
        

           <div class="sitebar_prent_div">
                <div class="sitebar_chaild_div  sitebar_chaild_div_left" >
                    <a href="single.php?id=<?php echo $row['post_id'];?>">
                        <img src="<?php echo "admin/upload/".$row['post_img']?>">
                    </a>
                </div>

                <div class="sitebar_chaild_div  sitebar_chaild_div_right" >

                        <div class="sitebar_div_1">
                            <a href="single.php?id=<?php echo $row['post_id'];?>">
                                <h4> <?php echo substr($row['title'],0,60)."...."?></h4>
                            </a>
                        </div>

                        <div class="sitebar_div_2">
                            <section class="activity_section">
                                <a href="single.php?id=<?php echo $row['post_id'];?>">
                                    <img src="admin/image/type.png "><?php echo substr($row['category_name'],0,5).".."?> </a>
                            </section>

                            <section class="activity_section">
                                <a href="auther.php?aid=<?php echo $row['author']?>">
                                    <img src="admin/image/admin.png "><?php echo $row['username']?></a>
                            </section>

                            <section class="activity_section">
                                <a href=""><img src="admin/image/date.png" > <?php echo $row['post_date']?></a>
                            </section>
                            <br>
                            <a class="sitebar_div_3" href="single.php?id=<?php echo $row['post_id'];?>"> 
                               <button> Read More...</button> 
                            </a>
                        </div>
                        
                        
                            
                </div>
                

            </div>   
            
            <?php 
                    }
                }
            ?>
        </section>


    
</body>
</html>