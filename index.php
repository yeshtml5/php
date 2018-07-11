<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
    <!--contents-->
    <article>
        <div class="panel">
            <?php
                if (isset($_GET['inc'])):
                    include (__ROOT__ . $_GET['inc']);
                else:
                    $files = array_diff(scandir("./"), array(".", "..", "db", ".git", ".idea", ".gitignore", "README.md"));
                    foreach ($files as &$key) {
                        echo "<p><a href=\"index.php?$key\"><span>$key</span></a></p>";
                    }
                endif;
            ?>
        </div>
        <div class="mgt_50 mgb_50 panel">
            <?php
            ?>
        </div>
    </article>
    <!--//contents-->
<?= footer(); ?>