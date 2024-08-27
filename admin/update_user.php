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
<body id="add_user_body">

    <section id="add_button_section"> 
        <h1>Modify User Delails</h1>
        
    </section>

    <section id="add_user_from">
        <?php 
            include "config.php";

            $user_id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE user_id = '{$user_id}'";
            $result = mysqli_query($conn,$sql) or die("Connection Failed");

            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)){

        
        ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?> " method="POST" >
            <label for="">Fast Name</label><br>
            <input type="hidden" name="user_idi" value="<?php echo $row['user_id'];?>">
            <input type="text" name="fast_name" placeholder="Fast Name" value="<?php echo $row['first_name'];?>"><br>

            <label for="">Last Name</label><br>
            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $row['last_name'];?>"><br>

            <label for="">User Name</label><br>
            <input type="text" name="user_name" placeholder="User Name" value="<?php echo $row['username'];?>"><br>

            
            <label for="">User Role</label> <br>
            <select name="user_role" id="" value="<?php echo $row['role'];?>">
                <?php 
                    if($row['role'] == 1){
                      echo "  <option value='0'>Normal User</option>
                              <option value='1' selected>Admin</option>";
                    }else{
                        echo '  <option value="0" selected>Normal User</option>
                              <option value="1" >Admin</option>';
                    }
                ?>

               
            </select>
            <button type="submit" name="submit">Update</button>
        
        </form>
        <?php 
                }
            }?>
    </section>

    <?php 
    if(isset($_POST["submit"])){
        include("config.php");

        $user_id = $_POST["user_idi"];

        $fname = mysqli_real_escape_string($conn, $_POST['fast_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $uname = mysqli_real_escape_string($conn, $_POST['user_name']);
        // $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $urole = mysqli_real_escape_string($conn, $_POST['user_role']);

        
        

        $sql1 = "SELECT username FROM users WHERE  username = '{$uname}'";
        $result1 = mysqli_query($conn, $sql1) or die("query failed.");


        if(mysqli_num_rows($result1) > 0){
            echo "<p style='color:red;'>UserName already Exissts. </p>";
        }else{
            $sql = "UPDATE users SET first_name='{$fname}', last_name='{$lname}', username='{$uname}', role='{$urole}' WHERE  user_id = '{$user_id}'";
            $result = mysqli_query($conn, $sql) or die("query failed.");
            header("location: http://localhost/try/admin/users.php");
        }  
    } 
    ?>

    
</body>
</html>