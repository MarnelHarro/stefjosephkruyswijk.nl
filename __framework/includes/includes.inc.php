<?php

    $settings = parse_ini_file("settings.ini");
    include 'settings.inc.php';

    include 'init.inc.php';
    include DOCUMENT_ROOT . '__includes/includes.inc.php';
    include 'head.inc.php';
    include 'body.inc.php';

    if ($settings["showfooter"]) {
        include 'footer.inc.php';
    }    

    include 'end.inc.php';

?>