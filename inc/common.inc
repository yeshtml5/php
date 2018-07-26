<?php
    /**
     * config
     */
    error_reporting(E_ALL);
    ini_set("display_errors", 1);/* 0:에러출력안함 , 1:에러출력*/
    /**
     * Define
     */
    define("__ROOT__", $_SERVER['DOCUMENT_ROOT']);
    define("__URL__", "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");/*도메인으로 표시되는URL*/
    define("__PATH__", __ROOT__ . "/php");
    define("__THEME__", "https://yeshtml5.com/wordpress/wp-content/themes/yeshtml5/");
    /**
     *  class include
     */
    require_once __PATH__ . "/class/DB.php";
    require_once __PATH__ . "/class/Util.php";
    /**
     *  function
     */
    function debug($var) {
        Util . debugger($var);
    }
    //console 출력
    function console($str, $mode = "log") {
        Util . console($str, $mode = "log");
    }
    /**
     *  layout
     */
    function import() {
        include_once __PATH__ . "import.inc";
    }
    function navi() {
        include_once __PATH__ . "navi.inc";
    }
    function head() {
        include_once __PATH__ . "/inc/header.inc";
    }
    function footer() {
        include_once __PATH__ . "/inc/footer.inc";
    }
    function getRemoteIp() {
        echo $_SERVER['REMOTE_ADDR'];
    }
    /*********************************************************************/
?>