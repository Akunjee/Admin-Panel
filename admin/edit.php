<?php
    require_once('config.php');

    if(isset($_POST['update'])){
        $ptitle=$_POST['pagetitle'];
        $pcont=$_POST['pagecontent'];
       
        $page=isset($_GET['page'])?$_GET['page']:'';
        $query=mysqli_query($connection,"UPDATE pages SET pagetitle='$ptitle',pagecontent='$pcont' WHERE pageid='$page'");

        if($query){
            $success="Page is updated";
        }

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
            <?php
                $page=isset($_GET['page'])?$_GET['page']:'';
                $query=mysqli_query($connection,"SELECT * FROM pages WHERE pageid='$page'");
                $info=mysqli_fetch_assoc($query);

            ?>
            <form action="" method="POST">
                <input type="text" name="pagetitle" value="<?php echo $info['pagetitle'] ?>" placeholder="pagetitle"><br>
                <textarea class="tinymce" name="pagecontent" id="pagecontent" cols="30" rows="10">
                    <?php echo $info['pagecontent']; ?>
                </textarea><br>
                <input type="submit" name="update" value="Update Page">
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