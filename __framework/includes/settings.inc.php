<?php

    $copyright_allRightsReserved = "All rights reserved.";
    $copyright_name = "Stef Joseph-Kruyswijk";
    $copyright_year = 2020;
    $showFooter = true;
    $defaultTimeZone = "Europe/Amsterdam";
    $googleAnalytics = ""; // UA=123456789-0
    $htmlLanguage = "en";
    $showErrors = true;
    $title = "Prototype";
    $useDefaultLayout = true;

    if (isset($settings["allrightsreserved"])) {
        $copyright_allRightsReserved = $settings["allrightsreserved"];
    }
    if (isset($settings["analytics"])) {
        $googleAnalytics = $settings["analytics"];
    }
    if (isset($settings["defaulttimezone"])) {
        $defaultTimeZone = $settings["defaulttimezone"];
    }
    if (isset($settings["showfooter"])) {
        $showFooter = $settings["showfooter"];
    }
    if (isset($settings["language"])) {
        $htmlLanguage = $settings["language"];
    }
    if (isset($settings["name"])) {
        $copyright_name = $settings["name"];
    }
    if (isset($settings["showerrors"])) {
        $showErrors = $settings["showerrors"];
    }
    if (isset($settings["title"])) {
        $title = $settings["title"];
    }
    if (isset($settings["year"])) {
        $copyright_year = $settings["year"];
    }

?>
