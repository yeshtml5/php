<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
    <!--contents-->
    <article>
        <div class="panel">
            <?php
                if (isset($_GET['inc'])):
                    include(__ROOT__ . $_GET['inc']);
                else:
                    $files = array_diff(scandir("./"), array(".", "..", "db", ".git", ".idea", ".gitignore", "README.md"));
                    foreach ($files as &$key) {
                        echo "<p><a href=\"index.php?$key\"><span>$key</span></a></p>";
                    }
                endif;
            ?>
        </div>

        <div class="mgt_50 mgb_50 panel">
            <img src="https://vuejs.org/images/logo.png" style="width:100px;">
            <p id="app">{{message}}</p>
            <?php
            ?>
        </div>
    </article>
    <!--//contents-->
    <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hellow world'
            }
        })
        setTimeout(function () {
            app.message = "TEST";
        }, 1000);
    </script>
<?= footer(); ?>