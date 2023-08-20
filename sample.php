<?php
function is_connected()
{
    $connected = @fsockopen("www.example.com", 80); 
    if ($connected){
        fclose($connected);
    }else{
        $is_conn = "Internet Connection is required to load google chart"; 
    }
    return $is_conn;
}
echo is_connected();

?>