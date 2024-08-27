<?php 
    include'header.php';
    
   
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

                if(isset($_GET['search'])){
                    $search_term = mysqli_real_escape_string($conn,$_GET['search']);
                } else {
                    die("Category ID not specified.");
                }


            ?>

            <div id="category_name">
                <h2>Search : <?php echo $search_term; ?></h2>
                <div></div>
            </div>

            <?php 
                $limit = 5;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;

                $sql = "SELECT * FROM post  
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN users ON post.author = users.user_id

                        WHERE post.title LIKE '%{$search_term}%'
                        OR post.description LIKE '%{$search_term}%'

                        ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                $result = mysqli_query($conn, $sql) or die("Connection Failed");

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
            <section>
                <div class="prent_div">
                    <div class="chaild_div chaild_div_left">
                        <a href="single.php?id=<?php echo $row['post_id']; ?>"><img src="<?php echo "admin/upload/".$row['post_img'] ?>" alt=""></a>
                    </div>
                    <div class="chaild_div chaild_div_right">
                        <a href="single.php?id=<?php echo $row['post_id']; ?>"><h4><?php echo substr($row['title'], 0, 70)."...." ?></h4></a>
                        <div>
                            <section class="activity_section"><a href="category.php?cid=<?php echo $row['category']?>"><img src="admin/image/type.png "><?php echo $row['category_name'] ?></a></section>
                            <section class="activity_section"><a href="auther.php?search=<?php echo $row['author']?>"><img src="admin/image/admin.png "><?php echo $row['username'] ?></a></section>
                            <section class="activity_section"><a href=""><img src="admin/image/date.png "><?php echo $row['post_date'] ?></a></section>
                        </div>
                        <a href=""><p class="description_p_tag"><?php echo substr($row['description'], 0, 120)."..." ?></p></a>
                        <a class="read_more" href="single.php?id=<?php echo $row['post_id']; ?>">Read More</a>
                    </div>
                </div>
            </section>
            <?php 
                    }
                } else {
                    echo "No records found";
                }
            ?>

            <section id="paginations_user_Section">
                <?php 
                    if($page > 1){
                        echo '<a href="search.php?search='.$search_term.'&page='.($page - 1).'">Prev</a>';
                    }

                    $sql1 = "SELECT * FROM post  
                    WHERE post.title LIKE '%{$search_term}%'";

                    $result1 = mysqli_query($conn, $sql1) or die("Query failed");
                   

                    if(mysqli_num_rows($result1) > 0){
                        
                        $total_records =mysqli_num_rows($result1);

                        $total_pages = ceil($total_records / $limit);

                        for($i = 1; $i <= $total_pages; $i++){
                            if($i == $page){
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo "<a class='{$active}' href='search.php?search={$search_term}&page={$i}'>$i</a>";
                        }

                        if($total_pages > $page){
                            echo '<a href="search.php?search='.$search_term.'&page='.($page + 1).'">Next</a>';
                        }
                    }
                ?>
            </section>
        </div>
        <div class="bodyDiv rightDiv">
            <?php include'sitebar.php'; ?>
        </div>
    </section>
</body>
</html>

<?php include "futer.php"; ?>