<?php 
require('header.php');
if ($subpage == 'jewell') {
    $width = '';
    if ($jsubpage == 'bangles') {
      $arr = array('./images/phbangle01.jpg','./images/phbangle02.jpg','./images/phbangle03.jpg','./images/phbangle04.jpg','./images/phbangle05.jpg', 
        './images/phbangle06.jpg','./images/phbangle07.jpg','./images/phbangle08.jpg','./images/phbangle09.jpg');

      $arr1 = array('./images/phbangle01x.jpg', './images/phbangle02x.jpg', './images/phbangle03x.jpg', './images/phbangle04x.jpg', './images/phbangle05x.jpg',
        './images/phbangle06x.jpg','./images/phbangle07x.jpg','./images/phbangle08x.jpg','./images/phbangle09x.jpg');
            
      $arr2 = array(
        'Silver Bell Gum Nut Wrap Bangle<br />Sterling silver, 65mm diameter',
        'Paper Dome Bangle<br />Sterling silver and silk paper, 120mm diameter',
        'Silver Bell Gum Nut Wrap Bangle + 18ct Gold<br />Sterling silver and 18ct Gold, 65mm diameter',
        'Oxidised Silver Bell Gum Nut Wrap Bangle + 18ct gold<br />Oxidised sterling silver and 18ct gold, 65mm diameter',
        'Silver Wrap Bangle + 18ct gold acorn cups<br />Silver Wrap Bangle + acorn cups<br />18ct gold wrap bangle + acorn cups<br />Sterling silver and 18ct gold - 70mm diameter',
        'Large Honesty Bracelet + 18ct gold<br />Sterling silver and 18ct gold, 5 strands 150mm long',
        'Medium long honesty bracelet<br />Sterling silver and 18ct gold, 60cm long',
        'Silver Wrap Bangle + acorn cups<br />Sterling silver and 18ct gold - 70mm diameter',
        'Small Silver Wrap Bangle + acorn cups<br />Small Oxidised Silver Wrap Bangle + 18ct gold acorn cups<br />Sterling silver and 18ct gold - 70mm diameter'      
      );
    } elseif ($jsubpage == 'earring') {
      $arr = array('./images/phearring01.jpg','./images/phearring02.jpg','./images/phearring03.jpg','./images/phearring04.jpg','./images/phearring05.jpg', 
        './images/phearring06.jpg','./images/phearring07.jpg','./images/phearring08.jpg','./images/phearring09.jpg');

      $arr1 = array('./images/phearring01x.jpg', './images/phearring02x.jpg', './images/phearring03x.jpg', './images/phearring04x.jpg', './images/phearring05x.jpg',
        './images/phearring06x.jpg', './images/phearring07x.jpg', './images/phearring08x.jpg', './images/phearring09x.jpg');

      $arr2 = array(
        'Medium Pod Gum Nut Earrings + 18ct gold<br />Sterling silver and 18ct gold - 50mm long, gum nuts 12mm long',
        'Bell Gum Nut Earrings + 18ct gold<br />Sterling silver and 18ct gold - 50mm long, gum nuts 6mm long',
        'Silver + Gold Wrap Earrings<br />Sterling silver and 18ct gold - 50 mm long, 20mm diameter',
        'Medium Honesty Earrings<br />Sterling silver and 18ct gold - 50 mm long, petal 20mm long',
        'Acorn Cup Earrings<br />Sterling silver and 18ct gold - 50 mm long, 12mm diameter',
        'Daisy Earrings<br />Sterling silver and 18ct gold - 50 mm long, 18mm diameter',
        'Double Daisy Earrings<br />Sterling silver and 18ct gold - 50 mm long, 18mm diameter',
        '18ct Yellow Gold Gum Nut Studs + diamonds<br />18ct gold - 20mm diameter, 4.5mm diameter settings',
        'Medium Acorn Cup Cluster Earrings<br />Sterling silver and 18ct gold - 70mm long, cups 10mm - 5mm diameter'      
      );

    } elseif ($jsubpage == 'studs') {
      $arr = array('./images/phstuds01.jpg','./images/phstuds02.jpg','./images/phstuds03.jpg','./images/phstuds04.jpg','./images/phstuds05.jpg', 
        './images/phstuds06.jpg');

      $arr1 = array('./images/phstuds01x.jpg', './images/phstuds02x.jpg', './images/phstuds03x.jpg', './images/phstuds04x.jpg', './images/phstuds05x.jpg',
        './images/phstuds06x.jpg');

      $arr2 = array(
        '18ct Gold Daisy Studs<br />18ct gold - 18mm, 10mm and 6mm diameter',
        '18ct Gold Daisy Studs + diamonds<br />18ct gold and diamonds - 18mm diameter',
        'Oxidised Silver Wrap Studs + 18ct gold acorn cups<br />Silver Wrap Studs + 18ct gold acorn cups<br />18ct Gold Wrap Studs + acorn cups<br />Sterling silver and 18ct gold - 12mm diameter',
        'Medium Honesty Studs<br />Sterling silver and 18ct gold, 20mm long',
        'Daisy Studs<br />Sterling silver and 18ct gold - 18mm diameter',
        'Double Daisy Studs<br />Sterling silver and 18ct gold - 18mm diameter'      
      );

    } elseif ($jsubpage == 'neckpiece') {
      $arr = array('./images/phneck01.jpg','./images/phneck02.jpg','./images/phneck03.jpg','./images/phneck04.jpg','./images/phneck05.jpg', 
        './images/phneck06.jpg','./images/phneck07.jpg','./images/phneck08.jpg','./images/phneck09.jpg');

      $arr1 = array('./images/phneck01x.jpg', './images/phneck02x.jpg', './images/phneck03x.jpg', './images/phneck04x.jpg', './images/phneck05x.jpg',
        './images/phneck06x.jpg', './images/phneck07x.jpg', './images/phneck08x.jpg', './images/phneck09x.jpg');

      $arr2 = array(
        'Paper Dome Choker<br />Sterling silver and silk paper - 20cm diameter',
        'Medium Long Honesty Neckpiece<br />Sterling silver - 180cm long, petals 10mm -20mm long',
        'Small Acorn Cup Cluster Neckpiece<br />Sterling silver and 18ct gold - 125cm long, cups 2mm - 8mm in diameter',
        '18ct Gold Honesty Neckpiece<br />18ct gold 70cm long, petals are 10mm -20mm long',
        'Silver Bell Gum Nut Wrap Choker + 18ct gold<br />Sterling silver + 18ct gold - 20cm diameter',
        'Oxidised Silver Bell Gum Nut Wrap Choker + 18ct gold<br />Oxidised sterling silver + 18ct gold - 20cm diameter',
        'Silver Gum Nut Wrap Choker<br />Sterling silver - 20cm diameter',
        'Long articulated daisy neckpiece<br />Sterling silver - 180cm long, cups 18mm diameter',
        'Large Honesty Neckpiece + 18ct gold<br />Sterling silver and 18ct gold - 5 strands 55cm long, petals 25mm -50mm long'      
      );

    } elseif ($jsubpage == 'brooches') {
      $arr = array('./images/phbrooch01.jpg', './images/phbrooch02.jpg', './images/phbrooch03.jpg','./images/phbrooch04.jpg');

      $arr1 = array('./images/phbrooch01x.jpg', './images/phbrooch02x.jpg', './images/phbrooch03x.jpg','./images/phbrooch04x.jpg');

      $arr2 = array(
        '3 Small Silver Gum Nut Brooch + 18ct gold<br />Sterling silver + 18ct gold, 10cm long',
        '3 Small Silver Gum Nut Brooch + 18ct gold<br />Sterling silver + 18ct gold, 12cm long',
        'Daisy Brooch with Stalk<br />Sterling silver + 18ct gold, 65mm long',
        'Medium Honesty Brooch<br />Sterling silver + 18ct gold, 25mm x 55mm'      
      );

    } elseif ($jsubpage == 'pendants') {
      $arr = array('./images/phpendants01.jpg', './images/phpendants02.jpg', './images/phpendants03.jpg','./images/phpendants04.jpg', './images/phpendants05.jpg',
      './images/phpendants06.jpg', './images/phpendants07.jpg', './images/phpendants08.jpg', './images/phpendants09.jpg');

      $arr1 = array('./images/phpendants01x.jpg', './images/phpendants02x.jpg', './images/phpendants03x.jpg','./images/phpendants04x.jpg', './images/phpendants05x.jpg',
       './images/phpendants06x.jpg', './images/phpendants07x.jpg', './images/phpendants08x.jpg', './images/phpendants09x.jpg');

      $arr2 = array(
        '5 Pod Gum Nut Pendant + 18ct gold and 3 Pod Gum Nut Pendant<br />Sterling silver and 18ct gold - 42cm chain, gum nuts hang 50mm',
        '3 bell Gum Nut Pendants + 18ct Gold<br />Sterling silver and 18ct gold - 42cm chain, gum nuts hang 50mm',
        'Medium Double Daisy Pendant<br />Sterling silver and 18ct gold -  42cm chain, daisy 30mm diameter',
        'Single Daisy Choker<br />Sterling silver and 18ct gold - 1.2mm cable, daisy 15mm diameter',
        '18ct Gold Daisy Pendant<br />18ct gold and sterling silver -  42cm chain, daisy 10mm diameter',
        '5 Strand Acorn Cup Choker<br />Sterling silver + 18ct gold -  0.8mm cable, cups 8mm - 2mm diameter',
        '3 Strand Acorn Cup Choker<br />Sterling silver + 18ct gold -  1.2mm cable, cups 8mm - 2mm diameter',
        'Medium Honesty Pendant<br />Sterling silver and 18ct gold - 42cm chain, petal 34mm long',
        'Medium and Small Silver + Gold Wrap Pendants + 3 diamonds<br />Sterling silver, 18ct gold and diamonds - 42cm chain, 30mm and 20mm diameter',      
      );

    } elseif ($jsubpage == 'rings1') {
      $arr = array('./images/phrings01.jpg','./images/phrings02.jpg','./images/phrings03.jpg','./images/phrings04.jpg','./images/phrings05.jpg', 
        './images/phrings06.jpg', './images/phrings07.jpg','./images/phrings08.jpg','./images/phrings09.jpg','./images/phrings10.jpg','./images/phrings11.jpg','./images/phrings12.jpg');

      $arr1 = array('./images/phrings01x.jpg', './images/phrings02x.jpg', './images/phrings03x.jpg', './images/phrings04x.jpg', './images/phrings05x.jpg',
        './images/phrings06x.jpg', './images/phrings07x.jpg', './images/phrings08x.jpg', './images/phrings09x.jpg', './images/phrings10x.jpg', './images/phrings11x.jpg', './images/phrings12x.jpg');
      
      $arr2 = array(
        'Acorn cup leaf ring<br />Sterling silver and 18ct gold - 15mm cup',
        'Acorn cup leaf ring + stamen<br />Sterling silver and 18ct gold - 15mm cup',
        '5 18ct Gold Acorn Cup Rings + Diamonds<br />18ct gold and diamonds - 20mm diameter',
        '5 Acorn Cup Rings<br />Sterling silver and 18ct gold - 20mm diameter',
        '3 Acorn Cup Rings<br />Sterling silver and 18ct gold - 20mm diameter',
        'Double daisy ring<br />Sterling silver and 18ct gold - 15mm cup',
        'Small acorn cup cluster rings + 18ct gold cup<br />Sterling silver and 18ct gold - 20mm diameter',
        'Acorn cup cluster rings, with leaf<br />Sterling silver and 18ct gold - 20mm diameter',
        'Medium honesty ring<br />Sterling silver and 18ct gold - 20mm x 35mm petal',
        '3 Bell Gum Nut Rings + 18ct Gold detail<br />Sterling silver and 18ct gold - 20mm diameter',
        'Gum Nut Rings + 18ct Gold detail<br />Sterling silver, gum nuts and 18ct gold - 20mm diameter',
        'Bell Gum Nut Rings + 18ct Gold detail<br />Sterling silver and 18ct gold - 20mm diameter'      
      );

    } elseif ($jsubpage == 'rings2') {
      $arr = array('./images/phrings13.jpg','./images/phrings14.jpg','./images/phrings15.jpg','./images/phrings16.jpg','./images/phrings17.jpg', 
        './images/phrings18.jpg','./images/phrings19.jpg','./images/phrings20.jpg','./images/phrings21.jpg','./images/phrings22.jpg','./images/phrings23.jpg','./images/phrings24.jpg');

      $arr1 = array('./images/phrings13x.jpg', './images/phrings14x.jpg', './images/phrings15x.jpg', './images/phrings16x.jpg', './images/phrings17x.jpg',
        './images/phrings18x.jpg', './images/phrings19x.jpg', './images/phrings20x.jpg', './images/phrings21x.jpg', './images/phrings22x.jpg', './images/phrings23x.jpg', './images/phrings24x.jpg');

      $arr2 = array(
        '18ct Wrap Ring and 18ct Gold Acorn Cup Wrap Ring<br />18ct gold 12mm wide and 2mm deep',
        '.8mm 18ct Gold Wrap Rings<br />18ct gold 6mm wide and 2mm deep',
        'Silver wrap ring + 18ct gold acorn cups and Acorn Cup Wrap Ring<br />Sterling silver and 18ct gold - 12mm wide and 3mm deep',
        'Large oxidised silver wrap ring + 18ct gold acorn cups<br />Oxidised sterling silver and 18ct gold - 12mm wide and 3mm deep',
        'Silver + Gold Wrap Ring<br />Silver and 18ct gold - 8mm wide and 2.5mm deep',
        '1mm Silver + Gold Wrap Ring<br />Sterling silver and 18ct gold - 12mm wide and 2.5mm deep',
        '.8mm Silver + Gold Wrap Ring and .8 Silver Wrap Ring<br />Sterling silver and 18ct gold - 6mm wide and 2.5mm deep',
        '1mm Xl Silver Wrap Ring<br />Sterling silver 15mm wide and 3mm deep',
        '1mm Silver Wrap Ring<br />Sterling silver 12mm wide and 2.5mm deep',
        'Silver Wrap Ring<br />Sterling silver 7mm wide and 2.5mm deep',
        'Small Silver + Gold Wrap Ring + 3 diamonds<br />Sterling silver, 18ct gold and diamonds - 20mm diameter',
        'Medium Silver + Gold Wrap Ring<br />Sterling silver and 18ct gold - 30mm diameter'
      );

    } elseif ($jsubpage == 'rings3') {
      $arr = array('./images/phrings25.jpg','./images/phrings26.jpg','./images/phrings27.jpg','./images/phrings28.jpg','./images/phrings29.jpg', 
        './images/phrings30.jpg','./images/phrings31.jpg','./images/phrings32.jpg','./images/phrings33.jpg','./images/phrings34.jpg','./images/phrings35.jpg','./images/phrings36.jpg');

      $arr1 = array('./images/phrings25x.jpg','./images/phrings26x.jpg','./images/phrings27x.jpg','./images/phrings28x.jpg','./images/phrings29x.jpg', 
        './images/phrings30x.jpg','./images/phrings31x.jpg','./images/phrings32x.jpg','./images/phrings33x.jpg','./images/phrings34x.jpg','./images/phrings35x.jpg','./images/phrings36x.jpg');

      $arr2 = array(
        '18ct Gold Wrap Ring + 15 diamonds<br />18ct gold and diamonds - 12mm wide and 2mm deep',
        '18ct Gold and Silver Wrap Rings + 7 mixed diamonds<br />18ct gold, silver and diamonds - 12mm - and 10mm wide and 2mm deep',
        '18ct Gold and Silver Wrap Rings + precious stones<br />18ct gold, silver, diamonds, aqua marine and pink sapphire - 12mm wide and 2.5mm deep',
        'Large Silver Wrap Ring + 9 mixed diamonds<br />Sterling silver and diamonds 12mm wide and 2.5mm deep',
        'Large silver wrap ring + 15 diamonds<br />Sterling silver and diamonds 12mm wide and 2.5mm deep',
        '5 Silver + 18ct Gold Gum Nut Rings + 7 diamonds<br />Sterling silver and 18ct gold - settings 2.5mm - 4mm high and 4mm diameter',
        '5 tall Silver + 18ct Gold Gum Nut Rings + mixed diamonds<br />Sterling silver and 18ct gold - settings 2mm - 4mm high, and 3.5mm - 2.2mm diameter',
        '3 18ct Gold Gum Nut Rings with green tourmaline<br />18ct gold and green tourmaline - settings 2.5mm - 4mm high, and 4mm diameter',
        '3 18ct Gold Gum Nut Rings with pink sapphire<br />18ct gold and pink sapphire - settings 2.5mm - 4mm high, and 4mm diameter',
        '18ct gold Gum Nut Solitaire Ring and 18ct Gold Square Wedding Ring<br />18ct gold and diamond - setting is 4mm high and 4.5mm diameter',
        '5 silver + 18ct gold cup rings + diamonds<br />Sterling silver , 18ct gold and diamonds settings 1.5mm - 3mm high, and 3mm and 2mm diameter',
        '3 Silver Cup Rings + aqua marine<br />Sterling silver, 18ct gold and aqua marine cups 3.5mm diameter'
      
      );

    } 

?>
  <div class="leftMainGal">
    <table class="icons">  
      <tr>
<?php  
foreach ($arr as $i => $value) {
?>
   <td><a href="#<?php echo($arr1[$i]) ?>"><img src="<?php echo($arr[$i]) ?>" <?php echo($width) ?> /></a></td>
<?php
    if ((count($arr) == 9 || count($arr) == 12 || count($arr) == 7) && ($i == 2 || $i == 5 || $i == 8)) {
      echo('</tr><tr>');    
    } elseif (count($arr) == 6 && ($i == 1 || $i == 3)) {
      echo('</tr><tr>');
    } elseif (count($arr) == 4 && $i == 1 ) {
      echo('</tr><tr>');
    } 
  }
?>
</tr>

    </table>  
</div>
<div class="rightMainPic">
<?php  
foreach ($arr1 as $i => $value) {
  if ($i == 0) {
?>

<div style="display:block;" id="<?php echo(substr($arr1[$i],2)) ?>">
  <img src="<?php echo($arr1[$i]) ?>" class="gall_img">
  <br />
  <p style="color:black;font-size:12px;"><?php echo($arr2[$i]) ?></p>
</div>

<script type="text/javascript">
var prev = '<?php echo(substr($arr1[$i],2)) ?>'; 
</script>  
  
<?php    
  } else {
?>
<div style="display:none;" id="<?php echo(substr($arr1[$i],2)) ?>">
  <img src="<?php echo($arr1[$i]) ?>" class="gall_img">
  <br />
  <p style="color:black;font-size:12px;"><?php echo($arr2[$i]) ?></p>
</div>
<?php  
  }
}
?>


</div>
    
<?php

} elseif ($subpage == 'silver') {

    
    $width = '';
    if ($jsubpage == 'bowls') {
      $arr = array('./images/phbowls01.jpg','./images/phbowls02.jpg','./images/phbowls03.jpg','./images/phbowls04.jpg','./images/phbowls05.jpg', 
        './images/phbowls06.jpg','./images/phbowls07.jpg','./images/phbowls08.jpg','./images/phbowls09.jpg');

      $arr1 = array('./images/phbowls01x.jpg', './images/phbowls02x.jpg', './images/phbowls03x.jpg', './images/phbowls04x.jpg', './images/phbowls05x.jpg',
        './images/phbowls06x.jpg', './images/phbowls07x.jpg', './images/phbowls08x.jpg', './images/phbowls09x.jpg');
      
      $arr2 = array(
        'Large and Medium Hand Raised Salad Bowls<br />Fine silver - 20cm and 15cm diameter',
        'Large Hand Raised Fluted Fruit Bowl<br />Fine silver - 40cm diameter',
        'Large Hand Raised Fruit Bowl<br />Fine silver - 30cm diameter',
        'Set of Three Hand Raised Bowls<br />Fine silver and gold plate - 12cm, 6cm and 5cm diameter',
        'Hand Raised Bowl<br />18ct gold - 5cm diameter',
        'Large Hand Raised Fruit Dish<br />Fine silver - 22cm diameter',
        'Set of Three Hand Raised Bowls<br />Fine silver - 12cm, 8cm and 6cm diameter',
        'Set of Three Oxidised Hand Raised Bowls<br />Oxidised fine silver and gold plate - 6cm, 5cm and 4cm diameter',
        'Set of Three Hand Raised Bowls<br />Fine silver - 12cm, 8cm and 6cm diameter'      
      );

    } elseif ($jsubpage == 'gumnut') {
      $arr = array('./images/phgumnuts01.jpg', './images/phgumnuts02.jpg', './images/phgumnuts03.jpg', './images/phgumnuts04.jpg');

      $arr1 = array('./images/phgumnuts01x.jpg', './images/phgumnuts02x.jpg', './images/phgumnuts03x.jpg', './images/phgumnuts04x.jpg');
      
      $arr2 = array(
        'Hand Raised Rolled Bowl<br />Fine silver and gold plate - 7cm long',
        'Hand Raised Gum Nut Vessels<br />Fine silver, oxidised fine silver and gold plate - 5cm tall',
        'Formed Pebble Vessels<br />Fine silver and gold plate -9cm, 7cm and 5cm diameter',
        'Formed Pebble Vessel<br />Fine silver and gold plate -8cm diameter'
      );

    } elseif ($jsubpage == 'tblware') {
      $arr = array('./images/phtableware01.jpg','./images/phtableware02.jpg','./images/phtableware03.jpg','./images/phtableware04.jpg','./images/phtableware05.jpg', 
        './images/phtableware06.jpg','./images/phtableware07.jpg','./images/phtableware08.jpg','./images/phtableware09.jpg');

      $arr1 = array('./images/phtableware01x.jpg', './images/phtableware02x.jpg', './images/phtableware03x.jpg', './images/phtableware04x.jpg', './images/phtableware05x.jpg',
        './images/phtableware06x.jpg', './images/phtableware07x.jpg', './images/phtableware08x.jpg', './images/phtableware09x.jpg');
      $arr2 = array(
        'Hand Raised Fluted Tumblers<br />Fine silver - 7cm tall',
        'Hand Raised Pod Tumblers<br />Fine silver and gold plate - 7cm tall',
        'Hand Raised Pod Shots<br />Fine silver and gold plate - 3.5cm tall',
        'Hand Raised Eggshell Shots<br />Fine silver and gold plate - 6cm, 5cm and 4cm tall',
        'Hand Raised Mustard Pots<br />Fine silver and gold plate - 5cm diameter',
        'Hand Formed Reticulated Napkin Rings<br />Sterling silver and 18ct gold - 4cm tall',
        'Hand Formed Caddy Spoon<br />Sterling silver and 18ct gold - 9cm long',
        'Hand Formed Gum Nut Salt Spoons<br />Sterling silver - 7cm long',
        'Hand Formed Spoon<br />Sterling silver and 18ct gold - 15cm long'      
      );

    } elseif ($jsubpage == 'vases') {
      $arr = array('./images/phvases01.jpg', './images/phvases02.jpg', './images/phvases03.jpg', './images/phvases04.jpg');

      $arr1 = array('./images/phvases01x.jpg', './images/phvases02x.jpg', './images/phvases03x.jpg', './images/phvases04x.jpg');

      $arr2 = array(
        'Large Hand Raised Fluted Vase<br />Fine silver - 20cm tall',
        'Hand Raised Perfume Vase<br />Fine silver - 12cm tall',
        'Pair of Hand Raised Pod Vases<br />Fine silver - 14cm and 10cm tall',
        'Set of Three Hand Raised Pod Vases<br />Fine silver and 24ct gold - 14cm, 8cm and 6.5cm tall'      
      );

    } elseif ($jsubpage == 'vessels') {
      $arr = array('./images/phvessels01.jpg', './images/phvessels02.jpg', './images/phvessels03.jpg', './images/phvessels04.jpg');

      $arr1 = array('./images/phvessels01x.jpg', './images/phvessels02x.jpg', './images/phvessels03x.jpg', './images/phvessels04x.jpg');

      $arr2 = array(
        'Set of Three Hand Raised Pod Vessels<br />Fine silver and 24ct gold - 12cm, 7.5cm and 5cm tall',
        'Set of Three Hand Raised Fluted Vessels<br />Fine silver and gold plate - 21cm, 15cm and 10cm tall',
        'Set of Three Hand Raised Egg Pod Vessels<br />Fine silver - 12cm, 7.5cm and 5cm tall',
        'Hand Raised Pod Vessel<br />Fine silver - 12cm tall'      
      );

    } 
?>
  <div class="leftMainGal">
    <table class="icons">  
      <tr>
<?php  
foreach ($arr as $i => $value) {
?>
      <td><a href="#<?php echo($arr1[$i]) ?>"><img src="<?php echo($arr[$i]) ?>" <?php echo($width) ?> onClick="swapImage('<?php echo(substr($arr1[$i],2)) ?>')"/></a></td>
<?php
    if (count($arr) == 9 && ($i == 2 || $i == 5)) {
      echo('</tr><tr>');    
    } elseif (count($arr) == 6 && ($i == 1 || $i == 3)) {
      echo('</tr><tr>');
    } elseif (count($arr) == 4 && $i == 1 ) {
      echo('</tr><tr>');
    } 
  }
?>
</tr>

    </table>  
</div>
<div class="rightMainPic">
<?php  
foreach ($arr1 as $i => $value) {
  if ($i == 0) {
?>
<div style="display:block;" id="<?php echo(substr($arr1[$i],2)) ?>">
  <img src="<?php echo($arr1[$i]) ?>" class="gall_img">
  <br />
  <p style="color:black;font-size:12px;"><?php echo($arr2[$i]) ?></p>
</div>

<script type="text/javascript">
var prev = '<?php echo(substr($arr1[$i],2)) ?>'; 
</script>  
  
<?php  
  
  } else {
?>
<div style="display:none;" id="<?php echo(substr($arr1[$i],2)) ?>">
  <img src="<?php echo($arr1[$i]) ?>" class="gall_img">
  <br />
  <p style="color:black;font-size:12px;"><?php echo($arr2[$i]) ?></p>
</div>


<?php  
  }
}
?>


</div>
  <?php
          
    } else {
    }    
   ?>

<?php 
require('footer.php');

?>
<script text="javascript">
 pageName = 'gallery';
 </script>    
 
 
 