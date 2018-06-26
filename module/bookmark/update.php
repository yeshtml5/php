<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>


<?php head(); ?>
<?php footer(); ?>
<?php
    $id = $_POST['id'];
    $sql = "DELETE FROM `php_bookmark` WHERE id={$id}";
    $result = db_query($sql);
    var_dump($result);
    if ($result === false) {
        echo "문제발생";
    } else {
        ?>
        <script type="text/javascript">

            window.location = "/php/module/bookmark/";
        </script>
        <?php
    }
?>