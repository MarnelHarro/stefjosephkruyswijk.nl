<?php

    // this information will NOT be used when the page is smaller than 550px
    $links = array();

    $links["./?size=4"] = "INT4";
    $links["./?size=8"] = "INT8";
    $links["./?size=16"] = "INT16";
    $links["./?size=32"] = "INT32";

    echo "<h3>Bookmarks</h3>";

    echo "<ul class='ul_lst_none'>";

    foreach ($links as $key => $value) {
        echo "<li><a href='" . $key . "'>$value</a></li>";
    }

    echo "</ul>";

?>    
