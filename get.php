<?php
date_default_timezone_set("Asia/Jakarta");
function read ($length='255') 
{ 
   if (!isset ($GLOBALS['StdinPointer'])) 
   { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 
function add($code){
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://activity.wshareit.com/activity/addDrawChance");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"api_version\":1,\"os_version\":\"\",\"app_version\":4040528,\"app_id\":\"com.lenovo.anyshare.gps\",\"screen_width\":1080,\"screen_height\":1920,\"country\":\"ID\",\"net\":\"JK\",\"lang\":\"in\",\"os_type\":\"android\",\"deviceId\":\"m.acc1ee4b0715\",\"identity_id\":\"4b15871eda594c60b7bec5d452b54c73\",\"trace_id\":\"a9f4ccc3-a938-421f-abd4-388c040de1d2\",\"inCode\":\"".$code."\",\"share\":2}");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = "Host: activity.wshareit.com";
    $headers[] = "Accept: application/json, textozilla/5.0 (Linux; Android 5.1.1; Redmi Note 3 Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/51.0.2704.81 Mobile Safari/537.36";
    $headers[] = "Content-Type: application/json;charset=UTF-8";
    $headers[] = "Referer: http://cdn.ushareit.com/w/active/upgrade_lottery/index.html";
    $headers[] = "Accept-Language: id-ID,en-US;q=0.8";
    $headers[] = "X-Requested-With: com.lenovo.anyshare.gps";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);
    
    return $result;
    exit(print_r($result));
}

echo "Input Kode: ";
$kode = read();
echo "Input Jumlah: ";
$jumlah = read();

for ($x = 0; $x <= $jumlah; $x++){
    $go = add($kode);
    echo date("H:i:s").$go." Sending! \n";
}
