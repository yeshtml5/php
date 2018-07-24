<?php
    class DB {
        public function __construct() {
            $this->connect();
        }
        public function connect() {
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
                echo "ok";
            } else {
                console("db fail", "error");
            }
            return $db;
        }

        private function encrypt($string, $key) {
            $result = '';
            for ($i = 0; $i < strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char = chr(ord($char) + ord($keychar));
                $result .= $char;
            }
            return base64_encode($result);
        }

        private function decrypt($string, $key) {
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
    }
?>

