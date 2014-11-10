$(document).ready(function() {
  if (window.location.hash.substr(1) != '' && pageName == 'gallery') {
    swapImage(window.location.hash.substr(3))
  }
         
  if (window.location.hash.substr(1) != '' && pageName == 'shop') {
      shopImgLoad(window.location.hash.substr(1))
  }


  $(window).hashchange( function(){
    if (window.location.hash.substr(1) != '' && pageName == 'gallery') {
      swapImage(window.location.hash.substr(3))
    } else if (pageName == 'gallery') {
      window.location.reload();
    }  
    if (window.location.hash.substr(1) != '' && pageName == 'shop') {
      shopImgLoad(window.location.hash.substr(1))
    } else if (pageName == 'shop') {
      window.location.reload();
    }
  });
  
  
  $(".user_name").keyup(function(event){
    if(event.keyCode == 13){
      logon();
    }
  });  
  
  $(".pwd").keyup(function(event){
    if(event.keyCode == 13){
      logon();
    }
  });  
  
});

function swapImage(img) {
  document.getElementById(prev).style.display = 'none';
  document.getElementById(img).style.display = 'block';
  prev = img;
}

window.onload = function()
{
  $('.leftMenu').height($('.main_container').height() - 20);
}

function shopImgLoad(pkey)  {  
  $('.rtl_main').html('');
  $.ajax({
    url: "shop.php?k=" + pkey,
    success: function(msg){
      $('.rtl_main').html(msg);  
    }
  });
}
function logon(){  
  $.ajax({
    url: "index.php",
    data: "logon=" + $('.user_name').val() + "&pwd=" + $.sha1($('.pwd').val()),
    sync: true,
    success: function(msg){
      if (msg == 'true') {
        window.location.reload();
      } else {
        $('.trade_logon').html($('.trade_logon').html() + '<br />Incorrect username or password');
      }
    }
  });
}

function addBasket(pkey) {

  $('.main').append('<div class="addBasket"></div>');

}


function removeBasket(pkey) {
  $.ajax({
    url: "shop.php?delete=" + pkey,
    sync: true,
    success: function(msg){
      window.location.reload();
    }
  });
}

function updateShopPage() {
  // loop accross the table collection codes and qty in a string
  var updateString;
  var cnt = 1;  
  updateString = '';
  
  var rows = $(".tblCheck tr:gt(0)"); // skip the header row
  
  rows.each(function(index) {
    if ($(this).find(".pid").html() != null && $(this).find(".shpQty").val() != '') {  
      if (cnt > 1) {
        updateString = updateString + "&";
      }
      updateString = updateString + $(this).find(".pid").html().replace('&nbsp;', '') + '=' + $(this).find(".shpQty").val();
      cnt++;
    }
  });
    
  $.ajax({
    url: "shop.php?update=true",
    data: updateString,
    sync: true,
    success: function(msg){
      window.location.reload();
    }
  });  
}