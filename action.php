<?php
require ('FileStorage.php');
$fileStorage = new FileStorage('file.txt');
$fileStorage->Add($_POST);
//print_r($_POST);
//echo 'ghbdtn';
//echo $_POST['hid'];
if($_POST['hid']!=-1){
    $fileStorage->Delete($_POST['hid']);
}