<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
<!--contents-->
<article>
    <?php
        $files = array_diff(scandir("./"), array(".", "..", "db", ".git", ".idea", ".gitignore", "README.md"));
        foreach ($files as &$key) {
            echo "<p><a href=\"index.php?$key\"><span>$key</span></a></p>";
        }
    ?>
</article>
<section>
    <ul>
        <li><a href="/php/module/bookmark">즐겨찾기</a></li>
        <li><a href="/php/memo/" target="_blank">메모장</a></li>
        <li><a href="https://opentutorials.org/course/3167/19600" target="_blank">https://opentutorials.org/course/3167/19600</a>
        </li>
        <li><a href="https://opentutorials.org/course/3130" target="_blank">생활코딩 PHP</a></li>
    </ul>
    <h1>참고파일</h1>
    <time></time>
    <ul>
        <li><p>https://material.io/design/</p></li>
        <li><p>http://superieur-admin-templates.multipurposethemes.com/main/pages/icons_fontawesome.html/</p></li>
    </ul>
</section>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            common.time("time", "time");
        });
    })($);
</script>

<style>
    article {margin:50px;padding:50px;border:1px solid #2b669a;}
    li {padding:10px;}
    li:nth-child(odd) {background:#e1e1e1;}
</style>
<!--//contents-->
<?= footer(); ?>
