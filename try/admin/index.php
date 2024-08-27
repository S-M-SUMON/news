
<?php 
session_start();
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


    <section id="loging_section">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

            <div>
                <h1>Admin</h1><br>
                <label for="">User Name</label><br>
                <input type="text" name="username"><br>

                <label for="">Password</label><br>
                <input type="text" name="password"><br>

                <button type="submit" name="login">Login</button>
                
                <?php if(isset($_SESSION['error'])){ ?>
                <p><?php echo $_SESSION['error'];?></p>
                <?php } unset( $_SESSION['error'] ); ?>


            </div>

            </form>

    </section>

    <?php 
        if(isset($_POST['login'])){

            include "config.php";

            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password =  md5($_POST["password"]);

            $sql = "SELECT user_id, username, role FROM users WHERE username ='{$username}' AND password = '{$password}' ";
            $result = mysqli_query($conn, $sql)or die("query faield");

            if(mysqli_num_rows($result) > 0){
                
                while($row = mysqli_fetch_assoc($result)){
                    
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["user_id"] = $row["user_id"];
                    $_SESSION["user_role"] = $row["role"];

                    header("location: http://localhost/try/admin/post.php");
                }
            }else{
                $_SESSION['error'] = 'User and Password not Matched';
                header("location: http://localhost/try/admin/index.php");
            }

        }
    
    
    ?>

    
</body>
</html>