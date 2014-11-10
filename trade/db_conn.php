<?php

function ex_sql($query) { 
  connect_db();
  
  $res = mysql_query($query);
  if (!$res) {
    $error = mysql_error();
    die("Query error '$error' on query: $query");
  }
  mysql_close();
  return $res;

}

function connect_db() {
  $dbhost = '';
  $dbuser = '';
  $dbpass = '';
  
  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
  
  $dbname = 'shim_shop';
  mysql_select_db($dbname, $conn) or die(mysql_error());

}

function getALLfromIP($addr) {
  // this sprintf() wrapper is needed, because the PHP long is signed by default
  $ipnum = sprintf("%u", ip2long($addr));
  $query = "SELECT cc, cn FROM ip NATURAL JOIN cc WHERE ${ipnum} BETWEEN start AND end";
  $result = ex_sql($query);
  if((! $result) or mysql_numrows($result) < 1) {
    //exit("mysql_query returned nothing: ".(mysql_error()?mysql_error():$query));
    return false;
  }
  return mysql_fetch_array($result);
}

function getCCfromIP($addr) {
  $data = getALLfromIP($addr);
  if($data) return true;
    return false;
}

?>
