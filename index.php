<?php 
    require_once('config.php');
    $page=isset($_GET['page'])?$_GET['page']:'';
    $query=mysqli_query($connection,"SELECT * FROM pages WHERE pageid='$page'");
    $info=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Multi-Blue by Bryant Smith</title>
</head>

<body>
    <div id="page">
      <div id="pagetop">
		<h1>Multi-Blue</h1>
        <div class="links">    	
            <ul>
                <?php
                        $query=mysqli_query($connection,"SELECT * FROM pages ORDER BY id DESC");
                        while($row=mysqli_fetch_assoc($query)) : ?>                    
                            <li>
                                <a href="<?php echo $row['url']; ?>">
                                    <?php
                                        echo $row['pagetitle']; 
                                    ?>
                                </a>
                            </li>
                <?php endwhile; ?>
            </ul>
        </div>
     </div>
        
        <div id="header">   Insert slogan here, or leave it blank.     </div>
  
<div id="main">
	<div class="content">
        	<div class="main_top">
            	<h1><?php echo $info['pagetitle']; ?></h1>
            </div>
            
           	<div class="main_body">
                   <?php echo $info['pagecontent']; ?>
            </div>
            
			</div>
            <div class="clear">&nbsp;</div>
        </div>
<div id="footer">
        <p>
        <a href="http://www.bryantsmith.com/template">xhtml template</a> by <a href="http://www.bryantsmith.com">web page designer</a></p>
        </div>        
        
        
        
        </div>
</body>
</html>
