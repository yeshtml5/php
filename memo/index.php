<!Doctype html>
<html>
<head>
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<body>
<!--contents-->
<?php
    class FileMemo {
        private $fileRead;
        private $filename;

        public function __construct($file_name = "file.txt") {
            $this->filename = $file_name;
            //유효성체크
            $this->ifEmptyDie($file_name);
            $this->fileRead = file_get_contents($file_name);
            $this->read();
        }

        function read() {
            var_dump($this->fileRead);
        }

        function isFile() {
            return is_file($this->filename);
        }

        function setFile($_data) {
            $this->ifEmptyDie($_data);
            $this->filename = $_data;
        }

        function getFile() {
            return $this->filename;
        }

        /*private*/
        private function ifEmptyDie($_value) {
            if (!file_exists($_value)) {
                die('There is no file or params ' . $_value);
            }
        }
    }
    /*----[instance]*/
    $file = new FileMemo('data.txt');
    var_dump($file->getFile());
?>
<article>
    <div class="memo">
        test
    </div>
</article>
<!--//contents-->
</body>
</html>

