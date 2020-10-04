<?php

    // a default timezone has to be set, set manualy
    date_default_timezone_set($defaultTimeZone);

    define("DOCUMENT_ROOT", strtolower($_SERVER["DOCUMENT_ROOT"]) . "/");
    define("FRAMEWORK_DIRECTORY", DOCUMENT_ROOT . "__framework/");
    define("TABLE_DIRECTORY", DOCUMENT_ROOT . "__table/");
    define("ERROR_LOG_DIRECTORY", DOCUMENT_ROOT . "__error/" . date("Y") . "/" . date("m") . "/" . date("d") . "/");
    define("SESSION_DIRECTORY", DOCUMENT_ROOT . "__session/");
    define("ISLOCALHOST", $_SERVER['SERVER_NAME'] == "localhost");

    ini_set('session.save_path', SESSION_DIRECTORY);
    ini_set("display_errors", $showErrors);
    ini_set("display_startup_errors", $showErrors);
    error_reporting(E_ALL);

    ini_set("log_errors", true);
    ini_set("error_log", ERROR_LOG_DIRECTORY . date("H") . date("i") . ".log");  

    if (!file_exists(SESSION_DIRECTORY)) {
        mkdir(SESSION_DIRECTORY, 0777, true);
    }

    if (!file_exists(ERROR_LOG_DIRECTORY)) {
        mkdir(ERROR_LOG_DIRECTORY, 0777, true);
    }

    // setting the subdirectory
    $subdirectory =  dirname($_SERVER['PHP_SELF']);
    $subdirectories = explode('/', $subdirectory);

    $subdirectories = array_filter($subdirectories);

    $tempsubdirectory = "/";

    foreach ($subdirectories as $dir) {
        $tempsubdirectory .= $dir . "/";
    }

    define("SUBDIRECTORY", $tempsubdirectory);
    // setting the subdirectory - end

    session_start();

    $browserLanguage = "en";

    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    }

    include FRAMEWORK_DIRECTORY . 'class/includes.inc.php';

    // responding to the search
    $searchQuery = "";

    if (isset($_GET["q"]) && strlen(trim($_GET["q"]))) {
        $searchQuery = trim($_GET["q"]);
    }	

    // set the start time for the rest of the webpage
    define("STARTTIME", microtime());

?>