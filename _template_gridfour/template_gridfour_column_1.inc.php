<?php

    $links = array();

    $links["/projecten/framework/"] = "Framework";
    $links["/projecten/priemgetallen/"] = "Priemgetallen";

    foreach ($links as $key => $value) {
        echo "<a href='" . $key . "'>$value</a> ";
    }

?>    
