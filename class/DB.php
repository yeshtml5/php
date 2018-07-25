<?php
    class DB {
        private $database;
        private $result;

        public function __construct() {
            $this->connect();
        }

        public function connect() {
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
            $user = $this->decrypt("5t7Y29zh2Q==", $key);
            $pass_word = $this->decrypt("0ObRo8vh2Zw=", $key);
            $this->database = mysqli_connect($host, $user, $pass_word, $user);
        }

        /*
         *
         */
        public function query($_query) {
            $this->result = mysqli_query($this->database, $_query);
            return $this->result;
        }

        /*
         *
         */
        public function getJson() {
            $infoArry = array();
            while ($row = mysqli_fetch_assoc($this->result)) {
                $infoArry[] = $row;
            }
            //echo json_encode($infoArry);
            return json_encode($infoArry);
        }

        /*
         *
         */
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

        /*
         *
         */
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

