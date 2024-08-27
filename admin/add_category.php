<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <section id="add_post_section">
        <div>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <label for="">category Name</label>
                <input type="text" name="catogeryname">
                <input type="hidden" value="0" name="catogery_post">

                <button name="submit_save">Save</button>
            </form>
        </div>
        
    </section>
</body>
</html>

<?php 
    include 'config.php';

    if(isset($_POST['submit_save'])) {
        $categoryname = $_POST['catogeryname'];
        $category_post = $_POST['catogery_post'];

        $sql = "INSERT INTO category(category_name,post)
                VALUES ('{$categoryname}','{$category_post}')";

        if (mysqli_query($conn, $sql)){
            header("location: http://localhost/try/admin/category.php");
            }
    }
?>