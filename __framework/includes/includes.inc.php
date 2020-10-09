<?php

    $templateini = parse_ini_file("template.ini");
    $settings = parse_ini_file("settings.ini");
    include 'settings.inc.php';    
    include 'template.inc.php';   

    include 'init.inc.php';
    include DOCUMENT_ROOT . '__includes/includes.inc.php';
    include 'head.inc.php';

    $templatesettings = parse_ini_file("_template_$template/template_" . $template . ".ini");
    include DOCUMENT_ROOT . '_template/' . $template . '/body.inc.php';

    if ($showFooter) {
        include 'footer.inc.php';
    }    

    include 'end.inc.php';

?>