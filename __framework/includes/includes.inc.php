<?php

    $templateini = parse_ini_file("template.ini");
    $settings = parse_ini_file("settings.ini");
    include 'settings.inc.php';    
    include 'template.inc.php';   

    include 'init.inc.php';
    include DOCUMENT_ROOT . '__includes/includes.inc.php';
    include 'head.inc.php';
    
    $templatesettings = parse_ini_file("template_" . $template . ".ini");
    include DOCUMENT_ROOT . '__template/' . $template . '/body.inc.php';

    if ($settings["showfooter"]) {
        include 'footer.inc.php';
    }    

    include 'end.inc.php';

?>