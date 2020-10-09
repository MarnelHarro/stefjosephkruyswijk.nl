<?php

    $links = array();

    $links["/artikelen/zeef-van-eratosthenes/"] = "Zeef van Eratosthenes";

    asort($links);

    foreach ($links as $key => $value) {
        echo "<a href='" . $key . "' target='_blank'>$value</a> &nbsp; ";
    }

?>    
