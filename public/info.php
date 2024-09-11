<?php
//phpinfo();
// $link = mysql_connect('127.0.0.1:3306', 'root', '');
// if (!$link) {
//     die('Could not connect: ' . mysql_error());
// }
// echo 'Connected successfully';
// mysql_close($link);
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test;port=3306', 'root', '');

}
catch(PDOException $e){
    echo "Connection error ".$e->getMessage(); 
    exit;
}
  

