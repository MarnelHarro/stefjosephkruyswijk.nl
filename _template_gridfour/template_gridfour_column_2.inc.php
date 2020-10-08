<?php

    $links = array();

    $links["https://nl.lipsum.com/"] = "Lorum&nbsp;Ipsum";
    $links["https://notepad-plus-plus.org/downloads/"] = "Notepad++";
    $links["http://paletton.com/"] = "Paletton";
    $links["https://www.7-zip.org/"] = "7-Zip";
    $links["https://favicon.io/"] = "Favicon";
    $links["https://github.com/"] = "GitHub";
    $links["https://www.setcronjob.com/"] = "SetCronjob";
    $links["http://tutanota.com/"] = "Tutanota";

    asort($links);

    foreach ($links as $key => $value) {
        echo "<a href='" . $key . "' target='_blank'>$value</a>  ";
    }

?>    
