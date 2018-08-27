<?php
$username=$_POST['username'];
if(isset($_POST['username']) && isset($_POST['pass'])) {
    $data = $_POST['username'] . '-' . $_POST['pass'] . "\r\n";
    $ret = file_put_contents('mytext.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
         $myfile = fopen("mytext.txt", "r") or die("Unable to open file!");
         echo 'welcome ' . fread($myfile,strlen($username)). ' again';
         fclose($myfile);
    }
}
else {
   die('no post data to process');
}