<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
<!--contents-->
<article>
    <div class="panel">
        <?php
            $files = array_diff(scandir("./"), array(".", "..", "db", ".git", ".idea", ".gitignore", "README.md"));
            foreach ($files as &$key) {
                echo "<p><a href=\"index.php?$key\"><span>$key</span></a></p>";
            }
        ?>
    </div>
    <div class="mgt_50 mgb_50 panel">
        <?php
            $_GET['width'] = '100%';
            $_GET['height'] = '600px';
            $_GET['lat'] = '37';
            $_GET['lon'] = '127';
            $_GET['level'] = '8';
            include_once(__ROOT__ . "/php/api/kakao_map.php");
        ?>
    </div>
</article>
<!--//contents-->
<?= footer(); ?>