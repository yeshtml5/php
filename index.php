<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    $query = "SELECT * FROM `wp_users` ";
    $data = db_query($query);
?>
<?php head(); ?>
    <!--contents-->
    <article>
        <pre>
            <?php var_dump($data); ?>
            <?php echo count($data); ?>
        </pre>
        <ul>
            <li><a href="/php/memo/" target="_blank">메모장</a></li>
            <li><a href="https://opentutorials.org/course/3167/19600" target="_blank">https://opentutorials.org/course/3167/19600</a>
            </li>
            <li><a href="https://opentutorials.org/course/3130" target="_blank">생활코딩 PHP</a></li>
        </ul>
        <h1>참고파일</h1>
        <ul>
            <li><p>https://material.io/design/</p></li>
        </ul>
    </article>
    <!--//contents-->
<?php footer(); ?>