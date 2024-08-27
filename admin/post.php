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


    <section id="add_button_section"> 
        <h1>ALL Post</h1>
        <button><a href="add_post.php">ADD</a></button>
    </section>

    <section id="table_user_section">  
        
    
    <?php 
            include "config.php";

            $limit = 10;

            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page  =1;
            }

            $offset = ($page - 1) * $limit;

            if($_SESSION["user_role"] == 1){ 
                $sql = "SELECT * FROM post  
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN users ON post.author = users.user_id
                ORDER BY post.post_id DESC
                LIMIT {$offset},{$limit}";

            }elseif($_SESSION["user_role"] == 0){
                
                $sql = "SELECT * FROM post  
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN users ON post.author = users.user_id

                WHERE post.author =  {$_SESSION['user_id']}

                ORDER BY post.post_id DESC
                LIMIT {$offset},{$limit}";
            }

           

            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){

        ?>

        <table border="black" cellpadding ="50" >
            <thead>
                <th>s.NO.</th>
                <th>TITLE</th>
                <th>category</th>
                <th>post_date</th>
                <th>author</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </thead>
            
            <?php 
                $serial = $offset + 1;
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $serial ;?></td>
                <td style="text-align: start;"><?php echo substr($row['title'],0,30,)."...";?></td>
                <td><?php echo $row['category_name'];?></td>
                <td><?php echo $row['post_date'];?></td>
                <td><?php echo $row['username'];?></td>

                <td><a class="user_edit" href="update_post.php?id=<?php echo $row['post_id'];?>">EDIT</a></td>
                <td><a class="user_delete" href="delete_post.php?id=<?php echo $row['post_id'];?>&catid=<?php echo $row['category'];?> ">DELETE</a></td>
            </tr>

            <?php  
            $serial ++;
            } 
        ?>
    </table>
        <?php 
         
            } 

        ?>

    </section>

    <section id="paginations_user_Section">
        <?php 
            $sql1 = "SELECT * FROM post";
            $result1 = mysqli_query($conn,$sql1) or die("Suery failed");


            if($page > 1){
                echo '<a href="post.php?page='.($page - 1).'">prev</a>';
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
                   echo " <a class='{$active}' href='post.php?page={$i}'>$i</a> " ;
                }
                if($total_pages > $page){
                    echo '<a  href="post.php?page='.($page + 1).'">Next</a>';
                }
            }
        ?>
        

    </section>

    
</body>
</html>