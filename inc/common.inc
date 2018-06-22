<?php
    /********************************************************************
     *    config 설정
     ********************************************************************/
    error_reporting(E_ALL);
    ini_set("display_errors", 1);/* 0:에러출력안함 , 1:에러출력*/
    /********************************************************************
     *    common.inc
     ********************************************************************/
    define("__ROOT__", $_SERVER['DOCUMENT_ROOT']);
    define("__URL__", "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");/*도메인으로 표시되는URL*/
    define("__PATH__", __ROOT__ . "/php");
    function root() {
        echo __ROOT__;
    }
    function theme() {
        echo "https://yeshtml5.com/wordpress/wp-content/themes/yeshtml5/";
    }
    function path() {
        echo __PATH__;
    }
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
    //console 출력
    function console($str, $mode = "log") {
        $str = str_replace('"', '\\"', $str);
        if ($mode == "log") {
            echo "<script>console.log('%c$str','font-size:14px;color:#111;');</script>";
        } else if ($mode == "warn") {
            echo "<script>console.warn('%c$str','font-size:14px;color:#111;');</script>";
        } else if ($mode == "error") {
            echo "<script>console.error('%c$str','font-size:14px;color:#111;');</script>";
        }
    }
    // 모바일접속환경인지체크
    function isMobile() {
        $mAgent = array("iPhone", "iPod", "Android", "Blackberry", "Opera Mini", "Windows ce", "Nokia", "sony");
        $chkMobile = false;
        for ($i = 0; $i < sizeof($mAgent); $i++) {
            if (stripos($_SERVER['HTTP_USER_AGENT'], $mAgent[$i])) {
                $chkMobile = true;
                break;
            }
        }
        return $chkMobile;
    }
    /*********************************************************************/
    function encrypt($string, $key) {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }
    function decrypt($string, $key) {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }
    //DB접속
    function db_connect() {
        echo $_SERVER['HTTP_HOST'];
        $key = 'yeshtml5.com';
        /*
        $encrypted = encrypt("yeshtml5.com", $key);
        echo $encrypted."<br>";
        $decrypted = decrypt("$encrypted", $key);
        echo $decrypted;
        */
        if ($_SERVER['HTTP_HOST'] === "localhost") {
            $host = decrypt("5t7Y29zh2aFjkdLc", $key);
        } else {
            $host = 'localhost';
        }
        $user = decrypt("5t7Y29zh2Q==", $key);
        $pass_word = decrypt("0ObRo8vh2Zw=", $key);
        $db = mysqli_connect($host, $user, $pass_word, $user);
        if ($db) {
            console('ok');
        } else {
            console("db fail", "error");
        }
        return $db;
        /*
         * @example)
            $db = db_connect();
            $query = "SELECT * FROM `wp_users` ";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_assoc($result);
         */
    }
    function db_query($_query) {
        $db = db_connect();
        $result = mysqli_query($db, $_query);
        return mysqli_fetch_assoc($result);
    }
    /*
    $str = "안녕하세요. 하보니입니다.";
    $secret_key = "123456789";
    $secret_iv = "#@$%^&*()_+=-";
    $encrypted = Encrypt($str, $secret_key, $secret_iv);
    echo "암호화 문자열 => " . $encrypted . "<br />\n";
    $decrypted = Decrypt($encrypted, $secret_key, $secret_iv);
    echo "복호화 문자열 => " . $decrypted . "\n";
    */
?>