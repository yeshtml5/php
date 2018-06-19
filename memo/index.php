<?php
/*
$file = new SplFileObject('data.txt');
$file->fwrite((rand(1, 100)));
var_dump($file->fread($file->getSize()))
*/
?>
<?php
class FileMemo {
    private $fileRead;
    private $filename;
    public function __construct($file_name) {
        $this->filename = $file_name;
        //유효성체크
        $this->ifEmptyDie($file_name);
        $this->fileRead = file_get_contents($file_name);

        $this->read();
    }
    function read() {
       var_dump($this->fileRead );
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
    <hr>
</article>
<p>
    <a href="https://opentutorials.org/course/3018/15727">https://opentutorials.org/course/3018/15727</a>
</p>