<?php
    require_once('config.php');

    if(isset($_POST['create'])){
        $ptitle=$_POST['pagetitle'];
        $pcont=$_POST['pagecontent'];
        $rand=rand(1,100).rand(1,100);
        $url='?page='.$rand;
        $query=mysqli_query($connection,"INSERT INTO pages (pagetitle,pagecontent,url,pageid)VALUES('$ptitle','$pcont','$url','$rand')");

        if($query){
            $success="Page is created";
        }

        header('location: edit.php'.$url);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="left-sidebar">
            <div class="admin-pages">
                <ul>
                    <li><a href="add.php">Add New Page</a></li>
                    <li><a href="pages.php">All Pages</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <form action="" method="POST">
                <input type="text" name="pagetitle" placeholder="pagetitle"><br>
                <textarea class="tinymce" name="pagecontent" id="pagecontent" cols="30" rows="10"></textarea><br>
                <input type="submit" name="create" value="Create Page">
            </form>

            <div class="success">
                <?php
                    if(isset($success)){
                        echo $success;
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>