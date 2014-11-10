<?php

require('logon.php');

// display item detail page
if (array_key_exists('k', $_GET)) {

  require('db_conn.php');
  connect_db();
      
  $id_prod = mysql_real_escape_string($_GET["k"]);
  mysql_close();

  if (array_key_exists('w', $_GET)) {


  } else {
    $prod_detail =   ex_sql("
      select p.pic_large as pic, b.*
      from shim_shop.products p, (
        select products.* , delivery.time
        from shim_shop.products left join shim_shop.delivery on products.id_delivery = delivery.id_delivery
        where products.id_products = $id_prod) b
      where b.page_group = p.page_group
      and p.pic_small != ''
      ") or die (mysql_error());
    
    $prod_num = 0;
    while ($prod_inc = mysql_fetch_array($prod_detail)) {
      if ($prod_num > 0) {
        // error
      } else {
        echo('<div class="leftMain"> <img src="../'.$prod_inc['pic'].'" class="shop_img" /></div>');
  //      echo('<div onMouseOver="document.bckImg.src=\'./images/back2.gif\';" onMouseOut="document.bckImg.src=\'./images/back1.gif\';" style="float:left;position:relative;left:20px;"><img src="../images/back1.gif" name="bckImg" class="imgBack" /></div>
  //          <div onMouseOver="document.fwdImg.src=\'./images/fwd2.gif\';" onMouseOut="document.fwdImg.src=\'./images/fwd1.gif\';" style="float:right;position:relative;right:20px;"><img src="../images/fwd1.gif" name="fwdImg" class="imgFwd" /></div>');
        echo('<div class="rightMainShop"><div class="rightMainDetail">');
        echo('<h2>'.$prod_inc['p_name'].'</h2>');
        echo('<br />');
        echo($prod_inc['sdesc']);
        echo('<br /><br />'.$prod_inc['ldesc'].'<br /><br />This item can be ordered to your specification. Please contact me for a quote<br /><br />');

        if($_SESSION['cc'] == false) {
          echo('<div style="float:left;text-align:left;"><table><tr><td>Price: </td><td>$'.$prod_inc['ws_price'].'</td></tr>');
        } else {
          echo('<div style="float:left;text-align:left;"><table><tr><td>Price: </td><td>&pound;'.$prod_inc['uk_ws_price'].'</td></tr>');
        }

        echo('<tr><td>Code: </td><td>'.$prod_inc['product_code'].'</td></tr>');
  
        $var_detail = ex_sql("
          select *
          from prod_x_var pxv, variable v
          where id_products = $id_prod
          and pxv.id_variables = v.variable_group
          order by v.variable_group, sort_order, value
        ") or die (mysql_error());
        
          $bink = 1;
          $vars = '';
          $dinky_doo = '';
          $selected_drp = '';
          while ($var_inc = mysql_fetch_array($var_detail)) {
            if ($dinky_doo != $var_inc['variable_group'] && $bink == 2) {
              $vars = $vars.'</select> </td></tr>';
              $vars = $vars.'<tr><td>'.$var_inc['name'].': </td><td><SELECT NAME="drp_dwn_2">';
            }

            if ($bink == 1) {
              $bink = 2;
              $vars = $vars.'<tr><td>'.$var_inc['name'].': </td><td><SELECT NAME="drp_dwn">';
            }
            if ($var_inc['default'] == 'Y') {
              $selected_drp = 'selected="true"';
            } else {
              $selected_drp = '';            
            }
            $vars = $vars.'<OPTION VALUE="'.$var_inc['id_variable'].'" '.$selected_drp.'>'.$var_inc['value'].'</OPTION>';
            
            $dinky_doo = $var_inc['variable_group'];
          }
          if ($bink == 2) {
            echo($vars.'</SELECT></td></tr>');
          }          
          echo('</table>');
          //echo('<button class="rounded" onclick="addBasket();"><a href="./shop.php?s=check&action='.$prod_inc['id_products'].'"><span>Add to basket</span></button></a>');           
          echo('<button class="rounded" onClick="addBasket('.$prod_inc['id_products'].')"><span>Add to basket</span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');           
          echo('<a href="./shop.php?s=check"><button class="rounded"><span>Checkout</span></button></a>');           
      }
      $prod_num = $prod_num + 1;    
    }
    
    $sim_img = ex_sql("
      select products.*
      from products
      where page_group = (select page_group from products where products.id_products = $id_prod)
      order by pic_small desc;
      ") or die (mysql_error());
  
    $cnt = 1;
    $sim_html = '';
    while ($prod_sim = mysql_fetch_array($sim_img)) {
        if ($prod_sim['id_products'] == $id_prod) {
          $style = 'style="color:#7F1054;text-decoration:underline;";';
        } else {
          $style = 'style="color:black;text-decoration:underline;";';
        }
    
        if ($prod_sim['pic_small'] != '') {
          $sim_html = $sim_html.'<br /><br /><div class="sim_images"> <b>Pictured Item </b><br />';
          $sim_html = $sim_html.'&nbsp;&nbsp;<a href="#'.$prod_sim['id_products'].'" '.$style.'>'.$prod_sim['p_name'].'</a> <br />';
          
        } else {
        
          if ($cnt == 1) {
            $sim_html = $sim_html.'<br /> <b>Similar Items </b><br />';
            $cnt = 2;
          }
          $sim_html = $sim_html.'&nbsp;&nbsp;<a href="#'.$prod_sim['id_products'].'" '.$style.'>'.$prod_sim['p_name'].'</a> <br />';
        }
    }
    if ($cnt == 2) {
      echo($sim_html.'</div>');
    }
    
  }
// delete an item from the cart
} elseif (array_key_exists('delete', $_GET)) {
    // TODO: Secure this by escaping input
    $a = session_id();
    if(empty($a)) session_start();
    
    require('./db_conn.php');
    connect_db();
  
    $strSql = 'delete from order_detail 
              where id_order = (select id_order from orders where id_user = "'.$_SESSION["id_user"].'") 
              and id_products = (select id_products from products where product_code = "'.$_REQUEST['delete'].'")';

    ex_sql($strSql) or die (mysql_error());

// update cart items
} elseif (array_key_exists('update', $_GET)) {

    // TODO: Secure this by escaping input
    $a = session_id();
    if(empty($a)) session_start();
    require('./db_conn.php');
    connect_db();
    
    $strSql = 'select p.product_code, count(od.id_order_detail) num from order_detail od, products p  
            where id_order = (select id_order from orders where id_user = "'.$_SESSION["id_user"].'") 
            and od.id_products = p.id_products 
            group by product_code 
            ';

    $prod_num = ex_sql($strSql) or die (mysql_error());

    while ($prod_inc = mysql_fetch_array($prod_num)) {
      if ($prod_inc['num'] != $_REQUEST[$prod_inc['product_code']]) {
      
        $current = $prod_inc['num'];
        $new = $_REQUEST[$prod_inc['product_code']]; 

        if ($current > $new) {
                  
          $strSql = 'delete from order_detail 
                    where id_products = (select id_products from products where product_code = "'.$prod_inc['product_code'].'")
                    limit '.($current - $new);
                    
          ex_sql($strSql) or die (mysql_error());
        
        } else {
          
          for($i =0; $i < ($new - $current); $i++) {
            $strSql = "insert into order_detail (id_order_detail, price, status, id_order, id_products) 
                                        values (NULL, (select r_price from products where product_code = '".$prod_inc['product_code']."'), 'A', 
                                        (select id_orders from orders where id_session = '".$_SESSION['id_user']."' and status = 'A'), 
                                        (select id_products from products where product_code = '".$prod_inc['product_code']."'))";
                                        
            ex_sql($strSql) or die (mysql_error());

          }                                               
        }
      }
    }

                   
// add an item to the order
} elseif (array_key_exists('action', $_GET)) {

    $a = session_id();
    if(empty($a)) session_start();
    require('./db_conn.php');
    connect_db();
      
    $a = $_SESSION["id_user"];
    
    $sql_new_req = "select count(*) num from orders where id_user = '$a' and id_session = '$a' and status = 'A'";

    $ord_chk = mysql_fetch_array(ex_sql($sql_new_req));

    if ($ord_chk['num'] == 0) {            
      $sql_new_order = "insert into orders (id_orders, date, message, status, price, id_user, id_session) values
        (NULL, CURDATE(), '', 'A', 200, '$a', '$a')";
            
      ex_sql($sql_new_order) or die (mysql_error());
    }            

    $id_prod = mysql_real_escape_string($_GET["action"]);
    mysql_close();

    ex_sql("insert into order_detail (id_order_detail, price, status, id_order, id_products) 
                              values (NULL, (select r_price from products where id_products = $id_prod), 'A', 
                              (select id_orders from orders where id_session = '$a' and status = 'A'), $id_prod)") or die (mysql_error());
                              
  
} else {
  
// display a shop page
require('./header.php');

  $unselected = 'onmouseout="this.style.color=\'black\';" onmouseover="this.style.cursor=\'pointer\';this.style.color=\'#7F1054\';" ';
  $selected = 'onmouseover="this.style.cursor=\'pointer\';this.style.color=\'black\';" ';

  $one = $unselected;
  $two = $unselected;
  $three = $unselected;              
  $class1 = 'MenuUnselected';          
  $class2 = 'MenuUnselected';          
  $class3 = 'MenuUnselected';          
  $subpage = '';
    

// display the checkout page
if (array_key_exists('s', $_GET)) {    

    $sqlBasket = ex_sql("select p.product_code, p.p_name, SUM(p.r_price) r_price, d.time, COUNT(od.id_products) num
                    from orders o, order_detail od, products p left join delivery d on p.id_delivery = d.id_delivery 
                    where od.id_order = o.id_orders 
                    and p.id_products = od.id_products
                    and o.id_session = '".$_SESSION["id_user"]."'
                    group by p.product_code, p.p_name
                    ") or die (mysql_error());
                        
    // Loop through the results
    echo('<div class="checkout"><table class="tblCheck" cellspacing="0" ><thead>');
    echo('<tr><td width="80px">&nbsp;Code</td><td width="300px">&nbsp;Product Name</td><td width="90px" >&nbsp;Price</td><td width="80px">&nbsp;Quantity</td><td width="80px">&nbsp;Delete</td></tr></thead><tbody>');
    
    $cnt = 0;
    $tot_price = 0;
    while ($prod_inc = mysql_fetch_array($sqlBasket)) {
      if (($cnt % 2) == 1) {
        echo('<tr class="even">');
      } else {
        echo('<tr class="odd">');
      }

      echo('<td class="pid">&nbsp;'.$prod_inc['product_code'].'</td><td>&nbsp;'.$prod_inc['p_name'].'</td>');
      echo('<td align="right">$'.$prod_inc['r_price'].'&nbsp;</td><td class="qty" align="center"><input type="text" value ="'.$prod_inc['num'].'" class="shpQty" /></td>');
      echo('<td align="center"><button class="rounded" onClick="removeBasket(\''.$prod_inc['product_code'].'\')"><span>X</span></button></td>');
      echo('</tr>');
      
      $tot_price = $tot_price + $prod_inc['r_price']; 

      $cnt = $cnt + 1;
    }
    // end results looping    
    echo('</tbody><tfoot><tr><td colspan="2"></td><td align="right">Total Price:&nbsp;</td><td>&nbsp;$'.$tot_price.'</td><td align="center"><button class="rounded" onClick="updateShopPage()"><span>Update</span></button></td>');
    echo('</tfoot></table></div>');
    require('footer.php');
    
} else {
  
  $categories = ex_sql("
  select distinct ct.* 
  from category ct, prod_x_cat pxc, products p
  where p.id_products   = pxc.id_products
   and  pxc.id_category = ct.id_category 
   order by id_category") or die (mysql_error());
   
  $cnt = 0;
  $rngSelected;
  $rngOn;
  $headMenuHTML = '';
  $select;
  $useSelect = false;
  $useRange = false;
  
  if (array_key_exists('r', $_GET)) {
    $rngSelected = $_GET["r"];
    $rngOn = $_GET["r"];
    $useRange = true;
  } 
  
  if (array_key_exists('p', $_GET)) {
    $select = $_GET["p"];
    $useSelect = true;
  } 
  
  while ($info = mysql_fetch_array($categories)) {
    if ($cnt == 0) {
      $cnt = 1;
    }
    
    
    if ($useRange == false && $cnt == 1) {
      $rngSelected = $info['cat_group'];
      $rngOn = $info['cat_group'];
      $cnt = 2;
    } elseif ($cnt == 1) {
      $cnt = 2;  
    }
    if ($rngSelected == $info['cat_group']) {
      if ($useSelect == false && $cnt == 2) {
        $headMenuHTML = $headMenuHTML.'&nbsp;<a href="./shop.php?r='.$info['cat_group'].'&p='.$info['id_category'].'" style="color:#7F1054;">'.$info['name'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
        $select = $info['id_category'];
        $cnt = 3;
      } elseif ($select == $info['id_category']) {
        $headMenuHTML = $headMenuHTML.'&nbsp;<a href="./shop.php?r='.$info['cat_group'].'&p='.$info['id_category'].'" style="color:#7F1054;">'.$info['name'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;';    
      } else {
        $headMenuHTML = $headMenuHTML.'&nbsp;<a href="./shop.php?r='.$info['cat_group'].'&p='.$info['id_category'].'" onmouseover="this.style.color=\'#7F1054\';" onmouseout="this.style.color=\'#FFFFFF\';">'.$info['name'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
      }
    } elseif ($rngOn != $info['cat_group']) {
      $rngOn = $info['cat_group'];
    }
  }
    ?>
     <div id="sub_tabs">
       <p class="headMenu">
    <?php
  echo($headMenuHTML);
  
    ?>
     </p>
     </div>
    <br />
  
  <div class="rtl_main">
  <?php
//  $images = ex_sql("
//  select distinct p.id_products, p.pic_small, p.p_name
//  from category ct, prod_x_cat pxc, products p, prod_x_group pxg
//  where p.id_products   = pxc.id_products
//   and  pxc.id_category = ct.id_category 
//   and  p.id_products   = pxg.id_products
//   and  pxg.id_group    = 1
//   and  ct.id_category  = $select
//   and  not isnull(p.pic_small) 
//   order by p.id_products") or die (mysql_error());

  $images = ex_sql("
  select distinct p.id_products, p.pic_small, p.p_name
  from category ct, prod_x_cat pxc, products p
  where p.id_products   = pxc.id_products
   and  pxc.id_category = ct.id_category 
   and  ct.id_category  = $select
   and  not isnull(p.pic_small) 
   order by p.id_products") or die (mysql_error());
   
  
  while ($rtl_pics = mysql_fetch_array($images)) {
      //echo('<div class="img_rtl"><a href="#'.$rtl_pics['id_products'].'" ><img src="'.$rtl_pics['pic_small'].'" onclick="shopImgLoad('.$rtl_pics['id_products'].')" class="rtl_sml_pics" /></a><br />');    
      echo('<div class="img_rtl"><a href="#'.$rtl_pics['id_products'].'" ><img src="../'.$rtl_pics['pic_small'].'" class="rtl_sml_pics" /></a><br />');    
      echo('<a href="#'.$rtl_pics['id_products'].'" '.$unselected.' style="color:black;">'.$rtl_pics['p_name'].'</a></div>');  
  }
    
  ?>
    
  </div>
   <script text="javascript">
   pageName = 'shop';
   </script>
  
    <?php    
  
  require('./footer.php');
  
}
}
 ?>

