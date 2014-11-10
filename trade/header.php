<?php
  $page = curPageName();
  if ($page == '') {
    $page = 'index';
  }
    
  if (!isset($_SESSION["cc"])) {
    require('./trade/db_conn.php');
    connect_db();
    if (getCCfromIP($_SERVER['REMOTE_ADDR'])) {
      $_SESSION['cc'] = true;    
    } else {
      $_SESSION['cc'] = false;        
    }
  }
  
    
  $unselected = 'onmouseout="this.style.color=\'#FFFFFF\';" onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';
  $selected = 'onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';

  $one = $unselected;
  $two = $unselected;
  $three = $unselected;
  $class1 = 'MenuUnselected';          
  $class2 = 'MenuUnselected';          
  $class3 = 'MenuUnselected';          
  $subpage = '';
                              
  if (array_key_exists('r', $_GET)) {
    $subpage = $_GET["r"];
    if ($subpage == 'Type') {
      $two = $selected; 
      $class2 = 'MenuSelected';          
     } else {
      $one = $selected;
      $class1 = 'MenuSelected';          
     } 
  } else if ($page == 'shop') {
    if (array_key_exists('s', $_GET)) {
      $three = $selected;
      $class3 = 'MenuSelected';              
    } else {
      $one = $selected;
      $class1 = 'MenuSelected';
    }            
  }
  
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
</head> 
<body> 
<div class="container">
<div class="main">
  <div class="mhead">
    <div class="topMain"><a href="./index.php"><img src="../images/logo01.gif" class="logo" /></a></div>
  <p class="h1">Shimara Carlow</p>
  <p class="h3">designer jeweller silversmith</p>
  <?php 
  
  $show_checkout = false;
  require('./db_conn.php');
  $sqlBasket = ex_sql("select SUM(p.r_price) r_price, COUNT(od.id_products) num
                    from orders o, order_detail od, products p 
                    where od.id_order = o.id_orders 
                    and p.id_products = od.id_products
                    and o.id_session = '".$_SESSION["id_user"]."'") or die (mysql_error());
                        
    while ($prod_inc = mysql_fetch_array($sqlBasket)) {
        if ($prod_inc['num'] > 0) {
    
          echo('<a href="./shop.php?s=check" ><div class="troll">');
          echo('<img src="../images/shopping.bmp" class="troll"/> '.$prod_inc['num'].' items <br />');          
          echo('Total: $'.$prod_inc['r_price']);                                                                              
          echo('</div></a>');
          $show_checkout = true;
        }
    }    
  
  
  ?>

  
  </div>
  
    <div id="tab_bar"> <div id="spacer">&nbsp;</div>  <p class="headMenu">
<?php

  $j_one = $unselected;
  $j_two = $unselected;
  $j_three = $unselected;
  $j_four = $unselected;
  $j_five = $unselected;
  $j_six = $unselected;
  $j_seven = $unselected;
  $j_eight = $unselected;
  $j_nine = $unselected;
  $j_ten = $unselected;

  $j_class1 = 'MenuUnSelected';          
  $j_class2 = 'MenuUnSelected';          
  $j_class3 = 'MenuUnSelected';          
  $j_class4 = 'MenuUnSelected';          
  $j_class5 = 'MenuUnSelected';          
  $j_class6 = 'MenuUnSelected';          
  $j_class7 = 'MenuUnSelected';          
  $j_class8 = 'MenuUnSelected';          
  $j_class9 = 'MenuUnSelected';          
  $j_class10 = 'MenuUnSelected';          


  if ($page == 'index') {
    $j_one = $selected;
    $j_class1 = 'MenuSelected';          
  } else if ($one == $selected) {
    $j_two = $selected;
    $j_class2 = 'MenuSelected';          
  } else if ($two == $selected) {
    $j_three = $selected;
    $j_class3 = 'MenuSelected';          
  } else if ($three == $selected) {
    $j_six = $selected;
    $j_class6 = 'MenuSelected';          
  } elseif ($page == 'stockists') {
    $j_four = $selected;
    $j_class4 = 'MenuSelected';          
  } elseif ($page == 'contact') {
    $j_five = $selected;
    $j_class5 = 'MenuSelected';          
  }

?>     
      
      <a href="./index.php" <?php echo($j_one) ?> class="<?php echo($j_class1) ?>">home</a> &nbsp;&nbsp;&nbsp;
      <a href="./shop.php?r=Range" <?php echo($j_two) ?> class="<?php echo($j_class2) ?>">view by range</a> &nbsp;&nbsp;&nbsp;
      <a href="./shop.php?r=Type" <?php echo($j_three) ?> class="<?php echo($j_class3) ?>">view by type</a> &nbsp;&nbsp;&nbsp;
      <a href="./stockists.php" <?php echo($j_four) ?> class="<?php echo($j_class4) ?>">stockists</a> &nbsp;&nbsp;&nbsp;
      <a href="./contact.php" <?php echo($j_five) ?> class="<?php echo($j_class5) ?>">contact me</a> &nbsp;&nbsp;&nbsp;
    <?php
      $padding = '400px';
      if ($show_checkout == true) {      
        echo('<a href="./shop.php?s=check" '.$j_six. ' class="'.$j_class6.'">checkout</a> &nbsp;&nbsp;&nbsp;');
        $padding = '325px';
      }      
    ?>         
      <a href="../index.php?logout=true" <?php echo($unselected) ?> class="MenuUnselected" style="padding-left:<?php echo($padding); ?>;">logout</a>
    </p>
    
  </div>
 

  <!-- /div -->     
  <div class="leftMenu">
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'index') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" > &nbsp;</div>
      <div class="menu" <?php echo($use) ?> onClick="location.href='./index.php'"><p class="<?php echo($class) ?>">home</p> </div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'shop') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" <?php echo($one) ?> onClick="location.href='./shop.php?r=Range'"><p class="<?php echo($class1) ?>">view by range</div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'shop') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" <?php echo($two) ?> onClick="location.href='./shop.php?r=Type'"><p class="<?php echo($class2) ?>">view by type</div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'stockists') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
    <div class="menu" <?php echo($use) ?> onClick="location.href='./stockists.php'"><p class="<?php echo($class) ?>">stockists</p> </div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'aboutme') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" <?php echo($use) ?> onClick="location.href='./aboutme.php'"><p class="<?php echo($class) ?>">about me</p> </div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'visitors') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
    <div class="menu" <?php echo($use) ?> onClick="location.href='./visitors.php'"><p class="<?php echo($class) ?>">CV</p> </div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'calendar') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
    <div class="menu" <?php echo($use) ?> onClick="location.href='./calendar.php'"><p class="<?php echo($class) ?>">calendar</p> </div>
        <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'contact') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" <?php echo($use) ?> onClick="location.href='./contact.php'"><p class="<?php echo($class) ?>">contact me</p> </div>
        <?php
        $use = $unselected;
        $class = 'MenuUnselected';
      ?>

<?php
  if($_SESSION['cc'] == false) {
?>
      <div class="menu" <?php echo($use) ?> onClick="location.href='./Wholesale_Price_List_2011.doc'"><p class="<?php echo($class) ?>">price list</p> </div>
<?php  
  } else {
?>
      <div class="menu" <?php echo($use) ?> onClick="location.href='./UK_Wholesale _Price_List_2011.doc'"><p class="<?php echo($class) ?>">price list</p> </div>
<?php
  }
?>

  </div>  

<?php

function curPageName() {
 return substr(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1), 0, -4);
}

?>