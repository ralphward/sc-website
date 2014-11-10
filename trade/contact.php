<?php 
require('logon.php');
require('header.php');

if (isset($_REQUEST['email'])) {  
  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $message = $_REQUEST['message'] ;
  $remoteIP = $_SERVER['REMOTE_ADDR'];
  $today = date("F j, Y, g:i a");
  $valid_ref1 = "http://www.shimara.com/trade/contact.php";
  $valid_ref2 = "http://shimara.com/trade/contact.php";
  $valid_ref3 = "http://www.shimara.co.uk/trade/contact.php";
  $valid_ref4 = "http://shimara.co.uk/trade/contact.php";
  $valid_ref5 = "http://www.shimara.com.au/trade/contact.php";
  $valid_ref6 = "http://shimara.com.au/trade/contact.php";
  $valid_ref7 = "http://katie-pc/trade/contact.php";

  $ref_page = $_SERVER["HTTP_REFERER"];
  $valid_referrer = 0;
  if ($ref_page==$valid_ref1) $valid_referrer=1;
  elseif ($ref_page==$valid_ref2) $valid_referrer=1;
  elseif ($ref_page==$valid_ref3) $valid_referrer=1;
  elseif ($ref_page==$valid_ref4) $valid_referrer=1;
  elseif ($ref_page==$valid_ref5) $valid_referrer=1;
  elseif ($ref_page==$valid_ref6) $valid_referrer=1;
  elseif ($ref_page==$valid_ref7) $valid_referrer=1;
  
  $valid_message = true;
  if (!$valid_referrer) {
     $valid_message = false;
  } elseif (!isset($_REQUEST['email'])) {
     $valid_message = false;
  } elseif (empty($name) || empty($email) || empty($message)) {
     $valid_message = false;
 
  } elseif (strlen($message) > 1250 ){
     $valid_message = false;
 
  } elseif (strlen($email) > 150 ){
     $valid_message = false;
 
  } elseif (strlen($name) > 150 ){
     $valid_message = false;
 
  } elseif(ereg('[<>/]', $message)) {
     $valid_message = false;
 
  } elseif(!ereg('[@]', $email)) {
     $valid_message = false;
  
  } else {
  mail( "enquiry@shimara.com", "Shimara Website Contact Form",
      "Message from Shimara Website\n\n$today\n\nName ........ $name\nE-mail ....... $email\n\nMessage ... $message", "From:$email\n" . "MIME-Version: 1.0\n" );

	mail( "gus", "Shimara Contact Form",
	  "There was a message from Shimara Online Form\n\n$today\nSenders IP $remoteIP\nReferer $ref_page\nName ... $name\nE-mail ... $email", "From:$email\n" . "MIME-Version: 1.0\n" );

    if($_SESSION['cc'] == false) {
      mail( "$email", "Shimara Contact Form",
    	  "$today\n\nHello, $name,\n\nThank you for contacting Shimara.\n\nThis is just to confirm that your enquiry has been sent, and if a reply is required, it will be sent to the e-mail address that you supplied.\n\nShimara Carlow,\nStudio MG6 \nMercador Building \nAbbotsford Convent \nVic 3067 - +61 (0)458 380 530", "From:autoreply@shimara.com\n" . "MIME-Version: 1.0\n" );
    } else {
      mail( "$email", "Shimara Contact Form",
    	  "$today\n\nHello ... $name,\n\nThank you for contacting Shimara.\n\nThis is just to confirm that your enquiry has been sent, and if a reply is required, it will be sent to the e-mail address that you supplied.\n\nShimara Carlow,\n179 King Street,\nCastle Douglas,\nSouth West Scotland.\nphone 01556 504552", "From:autoreply@shimara.com\n" . "MIME-Version: 1.0\n" );
    }

  }
  
  if (!$valid_message) {
    ?>

<div class="con_mainLeft">    
  <a href="../gallery.php?r=jewell&s=rings2#./images/phrings13x.jpg">
    <img src="../images/phcm01.jpg" width="198" height="198" border="0"></a>
  <br>      
  <a href="../gallery.php?r=silver#./images/phbowls01x.jpg">
    <img src="../images/phcm02.jpg" width="198" height="198" border="0"></a>    
</div>
<div align="center" class="con_mainRight"><br /><br /><br /><br />There was a problem with the details you provided<br /><br /><br />
<a href="./contact.php" style="color:black;text-decoration:underline">Click here to return and try again</a></div>
    
    <?php
  } else {
    ?>

<div class="con_mainLeft">    
  <a href="../gallery.php?r=jewell&s=rings2#./images/phrings13x.jpg">
    <img src="../images/phcm01.jpg" width="198" height="198" border="0"></a>
  <br>      
  <a href="../gallery.php?r=silver#./images/phbowls01x.jpg">
    <img src="../images/phcm02.jpg" width="198" height="198" border="0"></a>    
</div>
<div align="center" class="con_mainRight"><br /><br /><br /><br />Thank you for contacting me<br /> I will get back to you as soon as I can<br /><br />
<a href="./index.php" style="color:black;text-decoration:underline">Click here to return the homepage</a></div>
    
    <?php      
  }

} else {


 ?>   
<div class="con_mainLeft">    
  <a href="../gallery.php?r=jewell&s=rings2#./images/phrings13x.jpg">
    <img src="../images/phcm01.jpg" width="198" height="198" border="0"></a>
  <br>      
  <a href="../gallery.php?r=silver#./images/phbowls01x.jpg">
    <img src="../images/phcm02.jpg" width="198" height="198" border="0"></a>    
</div>
<div align="center" class="con_mainRight"><br /><br />Please use the form below to contact me
  <form method="POST" action="./contact.php">  		  
    <table width="100%" border="0" cellspacing="10">  			
      <tr>  			  
        <td width="35%"> 
          <div align="right" class="text1">Your Name:
          </div>			  </td>  			  
        <td width="65%"> 				
          <input type="text" name="name" size="40">			  </td>  			
      </tr>  			
      <tr>  			  
        <td width="35%">  				
          <div align="right" class="text1">E-mail address:
          </div>			  </td>  			  
        <td width="65%">  				
          <input type="text" name="email" size="40">			  </td>  			
      </tr>  			
      <tr>  			  
        <td width="35%" valign="top">  				
          <div align="right" class="text1">Your Enquiry:
          </div>			  </td>  			  
        <td width="65%">  				
<textarea rows="6" name="message" 
           cols="32"></textarea> 			  </td>  			
      </tr>  			
      <tr>  			  
        <td align="center" height="26" width="35%">&nbsp; </td>  			  
        <td height="26" width="65%">  				
          <input type="submit" value="Send Message" title="click to send the message">  				
          <input type="reset" name="Reset Form" value="Clear the Form" title="click to clear the form">			  </td>  			
      </tr>  		  
    </table> 
  </form>  E-mail .. 
  <a href="mailto:shimara@shimara.com?subject=Message from shimara.com contact form" title="email shimara" style="color:black;text-decoration:underline;">shimara@shimara.com</a>

<?php
  if($_SESSION['cc'] == false) {
?>
  <br> Phone: +61 458 380 530
  <br> Shimara Carlow<br />Studio MG6, Mercator Building
  <br> Abbotsford Convent<br />Melbourne, Victoria 3067<br />Australia
<?php  
  } else {
?>
  <br> Phone: +44 (0) 1556 504 552
  <br> Shimara Carlow<br />Designs Gallery<br />179 King St 
  <br> Castle Douglas <br />Scotland DG7 1DZ

<?php
  }
?>
</div>
<?php
} 
require('footer.php');
?>