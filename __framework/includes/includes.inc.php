<?php

    $templateini = parse_ini_file("template.ini");
    $settings = parse_ini_file("settings.ini");
    include 'settings.inc.php';    
    include 'template.inc.php';   
    include 'init.inc.php';
    include DOCUMENT_ROOT . '__includes/includes.inc.php';
    include 'head.inc.php';

    $homesettings = parse_ini_file(DOCUMENT_ROOT . "_template_home.ini");
    $templatesettings = parse_ini_file("_template_$template/template_" . $template . ".ini");

    if (empty($templatesettings["header"])) {
        $templatesettings["header"] = $homesettings["header"];
    }
    if (empty($templatesettings["subheader"])) {
        $templatesettings["subheader"] = $homesettings["subheader"];
    }
    if (empty($templatesettings["menu"])) {
        $templatesettings["menu"] = $homesettings["menu"];
    }

    include DOCUMENT_ROOT . '_template/' . $template . '/body.inc.php';
    include 'abovefooter.inc.php';

    if ($showFooter) {
        include 'footer.inc.php';
    }    

    include 'end.inc.php';

?>