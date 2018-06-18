<?php
/**
 * Created by PhpStorm.
 * User: bos
 * Date: 2018. 6. 18.
 * Time: PM 12:35
 */


$string = file_get_contents("menu.json");
$json_a = json_decode($string, true);
foreach ($json_a as $person_name => $person_a) {
    echo $person_a['status'];
}
?>
<article>
    <ul>
        <li><p>https://material.io/design/</p></li>
    </ul>
</article>


