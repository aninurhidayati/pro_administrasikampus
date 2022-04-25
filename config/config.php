<?php 
    date_default_timezone_set("Asia/Jakarta");
    $set_url = "http://".$_SERVER['HTTP_HOST'];
    $set_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    define("URL", $set_url);
?>