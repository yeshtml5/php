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
        return "https://yeshtml5.com/wordpress/wp-content/themes/yeshtml5/";
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
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $res = socket_connect($sock, '8.8.8.8', 53);
        // You might want error checking code here based on the value of $res
        socket_getsockname($sock, $addr);
        socket_shutdown($sock);
        socket_close($sock);
        return $addr; // Ta-da! The IP address you're connecting from
    }
    function getIP() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
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
        //echo $_SERVER['HTTP_HOST'];
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
    }
    function db_query($_query) {
        $db = db_connect();
        $result = mysqli_query($db, $_query);
        return $result;
        //return mysqli_fetch_array($result);
    }
?>