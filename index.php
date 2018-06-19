<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    $string = file_get_contents("menu.json");
    $json_a = json_decode($string, true);
    foreach ($json_a as $person_name => $person_a) {
        echo $person_a['status'];
    }
    print("<br>");
?>
<?php header(); ?>
    <!--contents-->
    <article>
        <ul>
            <li><p>https://material.io/design/</p></li>
        </ul>
    </article>
    <!--//contents-->
<?php footer(); ?>