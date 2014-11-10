<?php

  session_start();

  if (!isset($_SESSION["cc"])) {
    require('db_conn.php');
    connect_db();
    if (getCCfromIP($_SERVER['REMOTE_ADDR'])) {
      $_SESSION['cc'] = true;    
    } else {
      $_SESSION['cc'] = false;        
    }
    //mysql_close();
  }
  
  
  if (!isset($_SESSION["username"])) {
  
    if (array_key_exists('logon', $_GET)) {
      require('db_conn.php');
      connect_db();
      
      $logon = mysql_real_escape_string($_GET["logon"]);
      $pwd = mysql_real_escape_string($_GET["pwd"]);
      
      $query = "SELECT * FROM user WHERE user_name='".strtolower($logon)."' AND password='".strtolower($pwd)."'";
      $user_detail = ex_sql($query) or die (mysql_error());
      $num_logon = '';
      //echo(mysql_real_escape_string($_GET["logon"]).' '.$_GET["pwd"].' '.$query);
      while ($user_inc = mysql_fetch_array($user_detail)) {
        $_SESSION["username"] = $user_inc['user_name'];
        $_SESSION["id_user"] = $user_inc['id_user'];
        $num_logon = $user_inc['name'];
        
        if ($num_logon == '') {
          $num_logon = 1;
        } else {
          $num_logon = $num_logon + 1;          
        }
        if ($user_inc['id_group'] == '2') {
          $_SESSION["cc"] = true;
        } else {
          $_SESSION["cc"] = false;
        }
      }

      if (!isset($_SESSION["username"])) {
        echo('false');
      } else {
        
        $query = "update user set name = $num_logon where user_name = '".$_SESSION['username']."'";
        ex_sql($query) or die (mysql_error());
        
        $query = "select count(*) num from order_detail, orders where id_order = id_orders and id_user = '".$_SESSION["id_user"]."'";
        $order_details = ex_sql($query) or die (mysql_error());
        
        while ($order_num = mysql_fetch_array($order_details)) {
          $_SESSION["items"] = $order_num['num'];    
        }
      
        echo('true');      
      }
      exit();  
      
    } else {
  
  ?>
<!DOCTYPE html>
<html> 
<head> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
<title>Shimara Carlow - Scottish Designer Jeweller and Silversmith, Scotland</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<meta name="keywords" content="shimara, carlow, artist designer jeweller, silversmith scottish south west scotland uk castle douglas commission glasgow school jewellery, jewelry, art, designs gallery bishopsland silver, rings, bangles, necklaces, neck pieces, pictures, gold, earrings, exhibitions, bowls,"> 
<meta name="description" content="Shimara Carlow, Scottish Designer Jeweller and Silversmith, Scotland. A Graduate of Glasgow School of Art, this site has details of silver and gold designer jewellery and silversmith work by Shimara Carlow."> 
<meta name="author" content="Galloway Online, South West Scotland"> 
<meta name="robots" content="index,follow"> 
 

<link rel="stylesheet" type="text/css" href="../styles.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/hashChange.js"></script>
<script type="text/javascript" src="../scripts/script.js"></script>
<script type="text/javascript" src="../scripts/sha1.js"></script>

</head> 
<body> 
<div class="main">
  <div class="mhead">
  <div class="topMain"><a href="./index.php"><img src="../images/logo01.gif" class="logo" /></a></div>
    <p class="h1">Shimara Carlow</p>
    <p class="h3">designer jeweller silversmith</p>
  </div>
    <div id="tab_bar"> <div id="spacer">&nbsp;</div>  <p class="headMenu">
    
<?php

  $unselected = 'onmouseout="this.style.color=\'#FFFFFF\';" onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';
  $selected = 'onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';

  $j_one = $unselected;
  $j_two = $unselected;
  $j_three = $unselected;
  $j_four = $unselected;
  $j_five = $unselected;
  $j_six = $selected;

  $j_class1 = 'MenuUnSelected';          
  $j_class2 = 'MenuUnSelected';          
  $j_class3 = 'MenuUnSelected';          
  $j_class4 = 'MenuUnSelected';          
  $j_class5 = 'MenuUnSelected';          
  $j_class6 = 'MenuSelected';          
?>    
      <a href="../index.php" <?php echo($j_one) ?> class="<?php echo($j_class1) ?>">home</a> &nbsp;&nbsp;&nbsp;
      <a href="../gallery.php?r=jewell" <?php echo($j_two) ?> class="<?php echo($j_class2) ?>">jewellery</a> &nbsp;&nbsp;&nbsp;
      <a href="../gallery.php?r=silver" <?php echo($j_three) ?> class="<?php echo($j_class3) ?>">silversmithing</a> &nbsp;&nbsp;&nbsp;
      <a href="../stockists.php" <?php echo($j_four) ?> class="<?php echo($j_class4) ?>">stockists</a> &nbsp;&nbsp;&nbsp;
      <a href="../contact.php" <?php echo($j_five) ?> class="<?php echo($j_class5) ?>">contact me</a> &nbsp;&nbsp;&nbsp;
      <a href="./index.php" <?php echo($j_six) ?> class="<?php echo($j_class6) ?>">trade</a> &nbsp;&nbsp;&nbsp;
    </p>
  </div>

   <div class="leftMenu">
      <?php
      $use = $unselected;
      $class = 'MenuUnselected';
      ?>
      <div class="menu" > &nbsp;</div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../index.php'"><p class="<?php echo($class) ?>">home</p> </div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../gallery.php?r=jewell'"><p class="<?php echo($class) ?>">jewellery</div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../gallery.php?r=silver'"><p class="<?php echo($class) ?>">silversmithing</div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../stockists.php'"><p class="<?php echo($class) ?>">stockists</p> </div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../aboutme.php'"><p class="<?php echo($class) ?>">about me</p> </div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../visitors.php'"><p class="<?php echo($class) ?>">CV</p> </div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../calendar.php'"><p class="<?php echo($class) ?>">calendar</p> </div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='../contact.php'"><p class="<?php echo($class) ?>">contact me</p> </div>
      <?php
        $use = $selected;
        $class = 'MenuSelected';
      ?>
    <div class="menu" <?php echo($use) ?> onClick="location.href='./index.php'"><p class="<?php echo($class) ?>">trade</p> </div>
  </div>  


  <div class="trade_logon">
  <table>
  <tr><td>Username: </td><td><input type="text" class="user_name" /></td></tr>
    <tr><td>Password: </td><td><input type="password" class="pwd" /> <br /> <br /></td></tr>
    <tr><td><button class="rounded" onclick="logon();"><span>Login</span></button></td><td>
    <button class="rounded" onclick="window.location='../trade.php'"><span>Register</span></button></td></tr></table>
  </div>  
  
  </div>
  </body>
  <?php
    require('./footer.php');
    exit(); 
    }
  } 


?>
