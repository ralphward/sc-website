<?php
  $page = curPageName();
  if ($page == '') {
    $page = 'index';
  }

  session_start();

  if (array_key_exists('logout', $_GET)) {
    session_destroy();
    session_start();
  }

  if (!isset($_SESSION["cc"])) {
    require('./trade/db_conn.php');
    connect_db();
    if (getCCfromIP($_SERVER['REMOTE_ADDR'])) {
      $_SESSION['cc'] = true;    
    } else {
      $_SESSION['cc'] = false;        
    }
    //mysql_close();
  }

  $unselected = 'onmouseout="this.style.color=\'#FFFFFF\';" onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';
  $selected = 'onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';

  $one = $unselected;
  $two = $unselected;
  $class1 = 'MenuUnselected';          
  $class2 = 'MenuUnselected';          
  $subpage = '';

  if (array_key_exists('r', $_GET)) {
    $subpage = $_GET["r"];
    if ($subpage == 'jewell') {
      $one = $selected;
      $class1 = 'MenuSelected';          
     } else if ($subpage == 'silver') {
      $two = $selected; 
      $class2 = 'MenuSelected';          
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
 

<link rel="stylesheet" type="text/css" href="./styles.css">
<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./scripts/jquery.js"></script>
<script type="text/javascript" src="./scripts/hashChange.js"></script>
<script type="text/javascript" src="./scripts/script.js"></script>
</head> 
<body> 
<div class="container">
<div class="main">
  <div class="mhead">
  <div class="topMain"><a href="./index.php"><img src="./images/logo01.gif" class="logo" /></a></div>
    <p class="h1">Shimara Carlow</p>
    <p class="h3">designer jeweller silversmith</p>
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

  $j_class1 = 'MenuUnSelected';          
  $j_class2 = 'MenuUnSelected';          
  $j_class3 = 'MenuUnSelected';          
  $j_class4 = 'MenuUnSelected';          
  $j_class5 = 'MenuUnSelected';          
  $j_class6 = 'MenuUnSelected';          
  $j_class7 = 'MenuUnSelected';          
  $j_class8 = 'MenuUnSelected';          
  $j_class9 = 'MenuUnSelected';          

if ($subpage == 'jewell') {

  if (array_key_exists('s', $_GET)) {
    $jsubpage = $_GET["s"];
    if ($jsubpage == 'rings1') {
      $j_one = $selected;
      $j_class1 = 'MenuSelected';          

    } elseif ($jsubpage == 'rings2') {
      $j_two = $selected;
      $j_class2 = 'MenuSelected';          

    } elseif ($jsubpage == 'rings3') {
      $j_three = $selected;
      $j_class3 = 'MenuSelected';          

    } elseif ($jsubpage == 'neckpiece') {
    
      $j_four = $selected;
      $j_class4 = 'MenuSelected';          

    } elseif ($jsubpage == 'pendants') {
    
      $j_five = $selected;
      $j_class5 = 'MenuSelected';          

    } elseif ($jsubpage == 'bangles') {
    
      $j_six = $selected;
      $j_class6 = 'MenuSelected';          

    } elseif ($jsubpage == 'earring') {
    
      $j_seven = $selected;
      $j_class7 = 'MenuSelected';          

    } elseif ($jsubpage == 'studs') {
    
      $j_eight = $selected;
      $j_class8 = 'MenuSelected';          

    } elseif ($jsubpage == 'brooches') {
    
      $j_nine = $selected;
      $j_class9 = 'MenuSelected';          

    }         
  } else {
  $jsubpage = 'rings1';
  $j_one = $selected;
  $j_class1 = 'MenuSelected';          
    
  }

?>      
      <a href="./gallery.php?r=jewell&s=rings1" <?php echo($j_one) ?> class="<?php echo($j_class1) ?>">cup rings</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=rings2" <?php echo($j_two) ?> class="<?php echo($j_class2) ?>">wrap rings</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=rings3" <?php echo($j_three) ?> class="<?php echo($j_class3) ?>">precious rings</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=neckpiece" <?php echo($j_four) ?> class="<?php echo($j_class4) ?>">neckpieces</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=pendants" <?php echo($j_five) ?> class="<?php echo($j_class5) ?>">pendants</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=bangles" <?php echo($j_six) ?> class="<?php echo($j_class6) ?>">bangles</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=earring" <?php echo($j_seven) ?> class="<?php echo($j_class7) ?>">earrings</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=studs" <?php echo($j_eight) ?> class="<?php echo($j_class8) ?>">studs</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell&s=brooches" <?php echo($j_nine) ?> class="<?php echo($j_class9) ?>">brooches</a> &nbsp;&nbsp;&nbsp;
    </p>
  </div>
  <?php
    } elseif ($subpage == 'silver') {
   ?>
     
<?php

  if (array_key_exists('s', $_GET)) {
    $jsubpage = $_GET["s"];
    if ($jsubpage == 'bowls') {
      $j_one = $selected;
      $j_class1 = 'MenuSelected';          

    } elseif ($jsubpage == 'gumnut') {
      $j_two = $selected;
      $j_class2 = 'MenuSelected';          

    } elseif ($jsubpage == 'tblware') {
    
      $j_three = $selected;
      $j_class3 = 'MenuSelected';          

    } elseif ($jsubpage == 'vases') {
    
      $j_four = $selected;
      $j_class4 = 'MenuSelected';          

    } elseif ($jsubpage == 'vessels') {
      $j_five = $selected;
      $j_class5 = 'MenuSelected';
    }         
  } else {
  $jsubpage = 'bowls';
  $j_one = $selected;
  $j_class1 = 'MenuSelected'; 
  }
?> 
 
      <a href="./gallery.php?r=silver&s=bowls" <?php echo($j_one) ?> class="<?php echo($j_class1) ?>">bowls</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=silver&s=gumnut" <?php echo($j_two) ?> class="<?php echo($j_class2) ?>">gum nuts</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=silver&s=tblware" <?php echo($j_three) ?> class="<?php echo($j_class3) ?>">tableware</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=silver&s=vases" <?php echo($j_four) ?> class="<?php echo($j_class4) ?>">vases</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=silver&s=vessels" <?php echo($j_five) ?> class="<?php echo($j_class5) ?>">vessels</a> &nbsp;&nbsp;&nbsp;
    </p>
  </div>

<?php 
 } else {
 

        if ($page == 'index') {
          $j_one = $selected;
          $j_class1 = 'MenuSelected';          
        } elseif ($page == 'stockists') {
          $j_four = $selected;
          $j_class4 = 'MenuSelected';          
        } elseif ($page == 'contact') {
          $j_five = $selected;
          $j_class5 = 'MenuSelected';          
        } elseif ($page == 'trade') {
          $j_six = $selected;
          $j_class6 = 'MenuSelected';          
        }

?>     
      
      <a href="./index.php" <?php echo($j_one) ?> class="<?php echo($j_class1) ?>">home</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=jewell" <?php echo($j_two) ?> class="<?php echo($j_class2) ?>">jewellery</a> &nbsp;&nbsp;&nbsp;
      <a href="./gallery.php?r=silver" <?php echo($j_three) ?> class="<?php echo($j_class3) ?>">silversmithing</a> &nbsp;&nbsp;&nbsp;
      <a href="./stockists.php" <?php echo($j_four) ?> class="<?php echo($j_class4) ?>">stockists</a> &nbsp;&nbsp;&nbsp;
      <a href="./contact.php" <?php echo($j_five) ?> class="<?php echo($j_class5) ?>">contact me</a> &nbsp;&nbsp;&nbsp;
      <a href="./trade/index.php" <?php echo($j_six) ?> class="<?php echo($j_class6) ?>">trade</a> &nbsp;&nbsp;&nbsp;
    </p>
  </div>
 

<?php 
 }  
 
?>
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
        if ($page == 'aboutme') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" <?php echo($one) ?> onClick="location.href='./gallery.php?r=jewell'"><p class="<?php echo($class1) ?>">jewellery</div>
      <?php
        $use = $unselected;
        $class = 'MenuUnselected';
        if ($page == 'aboutme') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
      <div class="menu" <?php echo($two) ?> onClick="location.href='./gallery.php?r=silver'"><p class="<?php echo($class2) ?>">silversmithing</div>
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
        if ($page == 'trade') {
          $use = $selected;
          $class = 'MenuSelected';
        }
      ?>
    <div class="menu" <?php echo($use) ?> onClick="location.href='./trade/index.php'"><p class="<?php echo($class) ?>">trade</p> </div>
  </div>  

<?php

function curPageName() {
 return substr(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1), 0, -4);
}

?>