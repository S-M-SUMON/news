<?php 
    include 'header.php';
    if($_SESSION["user_role"] == 0){ 
        header("location: http://localhost/try/admin/");
    }

?>
<?php 
    if(isset($_POST["submit"])){
        include("config.php");

        $fname = mysqli_real_escape_string($conn, $_POST['fast_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $uname = mysqli_real_escape_string($conn, $_POST['user_name']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $urole = mysqli_real_escape_string($conn, $_POST['user_role']);

        $sql = "SELECT username FROM users WHERE  username = '{$uname}'";

        $result = mysqli_query($conn, $sql) or die("query failed.");

        if(mysqli_num_rows($result) > 0){
            echo "<p style='color:red;'>UserName already Exissts. </p>";
        }else{
            $sqlInst = "INSERT INTO users(first_name,last_name,username,password,role) 
            VALUES('{$fname}','{$lname}','{$uname}','{$password}','{$urole}')";

           if (mysqli_query($conn, $sqlInst)){
            header("location: http://localhost/try/admin/users.php");

           }
        }
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
        <h1>ALL Users</h1>
    </section>

    <section id="add_user_from">
        <form action="<?php $_SERVER['PHP_SELF']; ?> " method="POST" >
            <label for="">Fast Name</label><br>
            <input type="text" name="fast_name" placeholder="Fast Name"><br>

            <label for="">Last Name</label><br>
            <input type="text" name="last_name" placeholder="Last Name"><br>

            <label for="">User Name</label><br>
            <input type="text" name="user_name" placeholder="User Name"><br>

            <label for="">Password</label><br>
            <input type="text" name="password" placeholder="Password"><br>
            
            <label for="">User Role</label> <br>
            <select name="user_role" id="">
                <option value="0">Normal User</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit">Save</button>
        
        </form>
    </section>

    

    
</body>
</html>