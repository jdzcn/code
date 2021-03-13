<?php
    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "http://www.jdzcn.xyz");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);
    print $result;
?>