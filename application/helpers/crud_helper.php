<?php

function api_response($url, $type, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, $type);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    
}
?>