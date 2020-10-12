<?php

    // this information will NOT be used when the page is smaller than 550px
    $links = array();

    $links["./#framework/"] = "Framework";
    $links["./#priemgetallen/"] = "Priemgetallen";

    echo "<h3>Bookmarks</h3>";

    echo "<ul class='ul_lst_none'>";

    foreach ($links as $key => $value) {
        echo "<li><a href='" . $key . "'>$value</a></li>";
    }

    echo "</ul>";

?>    
