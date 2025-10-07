<?php
$connection= new mysqli "localhost","root","","projectdb";

if $connection-> error ==true{
    echo "connection fail";
}else{
    echo "connected";
}
?>