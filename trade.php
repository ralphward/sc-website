<?php 
require('header.php');

if (isset($_REQUEST['tradename'])) {
  $name = $_REQUEST['name'] ;
  $tradename = $_REQUEST['tradename'] ;
  $tradeaddress = $_REQUEST['tradeaddress'] ;
  $tradepostcode = $_REQUEST['tradepostcode'] ;
  $email = $_REQUEST['email'] ;
  $remoteIP = $_SERVER['REMOTE_ADDR'];
  $today = date("F j, Y, g:i a");
  $ref_page = $_SERVER["HTTP_REFERER"];
  $valid_ref1 = "http://www.shimara.com/trade.php";
  $valid_ref2 = "http://shimara.com/trade.php";
  $valid_ref3 = "http://www.shimara.co.uk/trade.php";
  $valid_ref4 = "http://shimara.co.uk/trade.php";
  $valid_ref5 = "http://www.shimara.com.au/trade.php";
  $valid_ref6 = "http://shimara.com.au/trade.php";
  $valid_ref7 = "http://katie-pc/trade.php";

  $valid_referrer = 0;
  $valid_message = true;
  if ($ref_page==$valid_ref1) $valid_referrer=1;
  elseif ($ref_page==$valid_ref2) $valid_referrer=1;
  elseif ($ref_page==$valid_ref3) $valid_referrer=1;
  elseif ($ref_page==$valid_ref4) $valid_referrer=1;
  elseif ($ref_page==$valid_ref5) $valid_referrer=1;
  elseif ($ref_page==$valid_ref6) $valid_referrer=1;
  elseif ($ref_page==$valid_ref7) $valid_referrer=1;
  if (!$valid_referrer) {
     $valid_message = false;
      echo('at 1');
  } elseif (!isset($_REQUEST['email'])) {
     $valid_message = false;
      echo('at 1');
  } elseif (empty($name) || empty($tradename) || empty($tradeaddress) || empty($tradepostcode) || empty($email)) {
     $valid_message = false;
      echo('at 1');
  } elseif (strlen($name) > 150 ){
     $valid_message = false;
      echo('at 1');
  } elseif (strlen($tradename) > 150 ){
     $valid_message = false;
      echo('at 1');
  } elseif (strlen($tradeaddress) > 200 ){
     $valid_message = false;
      echo('at 1');
  } elseif (strlen($tradepostcode) > 20 ){
     $valid_message = false;
      echo('at 1');
  } elseif (strlen($email) > 100 ){
     $valid_message = false;
      echo('at 1');
  } elseif(!ereg('[@]', $email)) {
     $valid_message = false;
      echo('at 1');
  } else {
  
    mail("gus@gallowayonline.co.uk", "Shimara Website Trade Registration Form",
      "Message from Shimara Trade Registration\nPlease verify the following details\n\n$today\n\n$name\n$tradename\n$tradeaddress\n$tradepostcode\n$email", "From:$email\n" . "MIME-Version: 1.0\n" );

    if($_SESSION['cc'] == false) {
    mail("$email", "Shimara Trade Registration Form",
    	  "$today\n\nHello $name,\n\nThank you for registering at Shimara.com\n\nThis is just to confirm that your form has been recieved, and once your details have been verified, your username and password will be sent to the e-mail address that you supplied.\n\nShimara Carlow,\nStudio MG6 \nMercador Building \nAbbotsford Convent \nVic 3067 - +61 (0)458 380 530", "From:autoreply@shimara.com\n" . "MIME-Version: 1.0\n" );
    } else {
    mail("$email", "Shimara Trade Registration Form",
    	  "$today\n\nHello $name,\n\nThank you for registering at Shimara.com\n\nThis is just to confirm that your form has been recieved, and once your details have been verified, your username and password will be sent to the e-mail address that you supplied.\n\nShimara Carlow,\n179 King Street,\nCastle Douglas,\nSouth West Scotland.\nphone 01556 504552", "From:autoreply@shimara.com\n" . "MIME-Version: 1.0\n" );
    }

  }
  
  if (!$valid_message) {
    ?>

<div class="con_mainLeft">    
    <a href="gallery.php?r=jewell&s=neckpiece#./images/phneck01x.jpg"><img src="./images/pht01.jpg" width="198" height="198" border="0"></a><br> 
    <a href="gallery.php?r=silver&s=vessels#./images/phvessels03x.jpg"><img src="./images/pht02.jpg" width="198" height="198" border="0"></a>
</div>
<div align="center" class="con_mainRight"><br /><br /><br /><br />There was a problem with the details you provided<br /><br /><br />
<a href="./trade.php" style="color:black;text-decoration:underline">Click here to return and try again</a></div>
    
    <?php
  } else {
    ?>

<div class="con_mainLeft">    
    <a href="gallery.php?r=jewell&s=neckpiece#./images/phneck01x.jpg"><img src="./images/pht01.jpg" width="198" height="198" border="0"></a><br> 
    <a href="gallery.php?r=silver&s=vessels#./images/phvessels03x.jpg"><img src="./images/pht02.jpg" width="198" height="198" border="0"></a>
</div>
<div align="center" class="con_mainRight"><br /><br /><br /><br />Thank you for registering<br /> Your logon details will be posted ASAP<br /><br />
<a href="./index.php" style="color:black;text-decoration:underline">Click here to return the homepage</a></div>
    
    <?php      
  }
  


} else {
?>
  
   <div class="con_mainLeft">
    <a href="gallery.php?r=jewell&s=neckpiece#./images/phneck01x.jpg"><img src="./images/pht01.jpg" width="198" height="198" border="0"></a><br> 
    <a href="gallery.php?r=silver&s=vessels#./images/phvessels03x.jpg"><img src="./images/pht02.jpg" width="198" height="198" border="0"></a>
  </div>
<div align="center" class="con_mainRight">
  <p> If you have already registered, <b><a href="trade/shop.php" style="color:black;text-decoration:underline;">please enter here</a></b>.<br> 
  you will be required to submit your usename and password.<br> <br> 
  
  If you have not registered, please complete the short form<br> 
  below, and a username and password will be emailed to you. </p>
  <form method="POST" action="trade.php"> 
		  <table width="100%" border="0" cellspacing="10"> 
			<tr> 
			  <td width="35%"><div align="right" class="text1">Your name:</div></td> 
			  <td width="65%"><input type="text" name="name" size="40"></td> 
			</tr> 
			<tr> 
			  <td width="35%"><div align="right" class="text1">Trading name :</div></td> 
			  <td width="65%"><input type="text" name="tradename" size="40">			  </td> 
			</tr> 
			<tr> 
			  <td width="35%"><div align="right" class="text1">Trading address:</div></td> 
			  <td width="65%"><input type="text" name="tradeaddress" size="40">			  </td> 
			</tr> 
			<tr> 
			  <td width="35%"><div align="right" class="text1">Trading postcode:</div></td> 
			  <td width="65%"><input type="text" name="tradepostcode" size="40">			  </td> 
			</tr> 
			<tr> 
			  <td width="35%"><div align="right" class="text1">E-mail address:</div></td> 
			  <td width="65%"><input type="text" name="email" size="40">			  </td> 
			</tr> 
			  <td align="center" height="26" width="35%">&nbsp; </td> 
			  <td height="26" width="65%"> 
				<input type="submit" value="Send Message" title="click to send the message"> 
				<input type="reset" name="Reset Form" value="Clear the Form" title="click to clear the form">			  </td> 
			</tr> 
		  </table> 
  </form> 
  <p>If you have any problems with the above, or require further information<br> 
  please <a href="contact.php" style="color:black;text-decoration:underline;">contact me</a> using the contact details <a href="contact.php" style="color:black;text-decoration:underline;">here</a>.<br></p> 
  </div>
<?php
}
  require('footer.php');  
?>
  