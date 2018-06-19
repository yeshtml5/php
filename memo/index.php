<?php
    /*
    $file = new SplFileObject('data.txt');
    $file->fwrite((rand(1, 100)));
    var_dump($file->fread($file->getSize()))
    */
?>


<?php
    /*
     * FileMemo : class
     */
    class FileMemo {
        private $filename;

        function __construct($file_name) {
            $this->filename = $file_name;
            //유효성체크
            if (!file_exists($this->filename)) {
                die('There is no file' . $this->filename);
            }
        }

        function isFile() {
            return is_file($this->filename);
        }

        function getFile() {
            return $this->filename;
        }
    }
    /*----[instance]*/
    $file = new FileMemo('data.txt');
    var_dump($file->isFile());
    var_dump($file->getFile());
    echo "<p></p>";
?>
<article>
    <hr>
</article>
<p>
    <a href="https://opentutorials.org/course/3018/15727">https://opentutorials.org/course/3018/15727</a>
</p>