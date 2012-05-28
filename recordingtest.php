<?php 
require 'includes/functions.php';


$path = "F:\Recordings/";

$DateQuery = date('omd');
$Time = date('timestamp');
$TypeOfCall = "MANUAL";
$PhoneNumber = 7052724285;
$AgentNumber = 1004;

echo date('omd')."_TIME HERE_".$TypeOfCall."_".$PhoneNumber."_".$AgentNumber."-all";
echo "<br>";
echo "<br>";





$it = new RecursiveDirectoryIterator($path);
$display = Array ( 'jpeg', 'jpg', 'txt', 'mp3' );
foreach(new RecursiveIteratorIterator($it) as $file)
{
    if ( In_Array ( SubStr ( $file, StrrPos ( $file, '.' ) + 1 ), $display ) == true )
        echo "<a href='".$file . "'>$file</a><br/> \n";
}

 ?>