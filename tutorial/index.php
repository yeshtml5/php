<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?= head(); ?>
<!--contents-->

<article>
    <div class="panel">
        <?php
            if (isset($_GET['mode'])):
                phpFunction();
            endif;
            function phpFunction() {
                echo "Execute php funciton";
            }
        ?>
        <script type="text/javascript">
            function execute(){
                document.write('<?php phpFunction();?>')
            }
        </script>
        <h1>PHP -> Javascript</h1>
        <br>
        <p class="mgb_50"><a href="?mode=php">클릭으로 처리</a></p>
        <p class="mgb_50"><button onclick="execute();">방법2</button></p>
        <p></p>
        <input type="button" value="화면갱신" onclick="document.write('<?php phpFunction(); ?>');"/>
        <input type="button" value="simple" onclick="<?php echo 'sdd'; ?>"/>
    </div>
</article>
<!--//contents-->
<?= footer(); ?>

