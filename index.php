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
</article>
<!--//contents-->
<?= footer(); ?>
