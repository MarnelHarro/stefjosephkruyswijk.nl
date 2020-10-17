<?php

    // this information will NOT be used when the page is smaller than 550px
    $links = array();

    $links["./?byte=1"] = "BYTE 1";
    $links["./?byte=2"] = "BYTE 2";
    $links["./?byte=3"] = "BYTE 3";
    $links["./?byte=4"] = "BYTE 4";

    $links["#"] = "&nbsp;";

    $links["./?type=balanced"] = "Balanced";
    $links["./?type=chen"] = "Chen";

    echo "<h3>Bookmarks</h3>";

    echo "<ul class='ul_lst_none'>";

    foreach ($links as $key => $value) {
        echo "<li><a href='" . $key . "'>$value</a></li>";
    }

    echo "</ul>";

?>    
