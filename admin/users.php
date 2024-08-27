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
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>


    <section id="add_button_section"> 
        <h1>ALL Users</h1>
        <button><a href="add_users.php">ADD</a></button>
    </section>

    <section id="table_user_section">
        <?php 
            include "config.php";

            $limit = 3;

            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page  =1;
            }

            $offset = ($page - 1) * $limit;



            $sql = "SELECT * FROM users ORDER BY user_id LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){

        ?>

        <table border="black" cellpadding ="50" >
            <thead>
                <th>s.NO.</th>
                <th>Fast Name</th>
                <th>User Name</th>
                <th>Role</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </thead>
            <tr>

            <?php 
            
                $serial = 1;
                while($row  = mysqli_fetch_assoc($result)){

            
            ?>
                <td><?php echo $serial;?></td>
                <td style="text-align:start;"><?php echo $row['first_name']." ". $row['last_name'];?></td>
                <td><?php echo $row['username']?></td>
                <td><?php 
                    if($row['role']==1){
                        echo "admin";
                    }else{
                        echo "Normal";
                    }
                ?></td>
                <td><a class="user_edit" href="update_user.php?id=<?php echo $row['user_id'];?>">EDIT</a></td>
                <td><a class="user_delete" href="delete_user.php?id=<?php echo $row['user_id'];?>">DELETE</a></td>
            </tr>

            <?php  
                $serial++;
                } 
            ?>

        </table>
        <?php 
                  
            } 

        ?>

    </section>

    <section id="paginations_user_Section">
        <?php 
            $sql1 = "SELECT * FROM users";
            $result1 = mysqli_query($conn,$sql1) or die("Suery failed");


            if($page > 1){
                echo '<a href="users.php?page='.($page - 1).'">prev</a>';
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
                   echo " <a class='{$active}' href='users.php?page={$i}'>$i</a> " ;
                }
                if($total_pages > $page){
                    echo '<a  href="users.php?page='.($page + 1).'">Next</a>';
                }
            }
        ?>
        

    </section>
    
</body>
</html>