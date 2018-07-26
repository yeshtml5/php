<?php
    /**
     * Created by wanhwi.son
     * Email: yeshtml5@gmail.com
     * Date: 2018. 7. 26.
     * Time: AM 10:18
     */
    class DB {
        //DB connected
        private $connect;
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
                $host = $this->decrypt("5t7Y29zh2aFjkdLc", $key);
            } else {
                $host = 'localhost';
            }
            $user = $this->decrypt("5t7Y29zh2Q==", $key);
            $pass_word = $this->decrypt("0ObRo8vh2Zw=", $key);
            $this->connect = mysqli_connect($host, $user, $pass_word, $user);
            if (mysqli_connect_errno()) {
                throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
            }
        }

        /**
         *
         *
         */
        public function query($_query) {
            $this->result = mysqli_query($this->connect, $_query);
            return $this->result;
        }

        /**
         *
         *
         */
        public function getJson() {
            $infoArry = array();
            while ($row = mysqli_fetch_assoc($this->result)) {
                $infoArry[] = $row;
            }
            return json_encode($infoArry);
        }

        /**
         *
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

        /**
         *
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

