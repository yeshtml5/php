<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    /*------[config]--------*/
    $DB_TABLE = 'php_bookmark';
    $submit_label = 'INSERT';
    $escaped['memo'] = null;
    $escaped['url'] = null;
    /*------[function]--------*/
    function reload() {
        echo "<script>window.location = \"/php/module/bookmark/\";</script>";
    }
    /*------[logic]--------*/
    if (isset($_POST['submit']) && $_POST['submit'] == "INSERT"):/*------[INSERT]--------*/
        $sql = "INSERT INTO $DB_TABLE (`id`,`memo`,`url`,`date`,`favorite`) VALUES (null, '{$_POST['memo']}', '{$_POST['url']}', '', 'N')";
        $result = db_query($sql);
        reload();
    elseif (isset($_POST['submit']) && $_POST['submit'] == "DELETE"):/*------[DELETE]--------*/
        $sql = "DELETE FROM $DB_TABLE WHERE `php_bookmark`.`id` = '{$_POST['row_id']}'";
        $result = db_query($sql);
        reload();
    elseif (isset($_POST['submit']) && $_POST['submit'] == "MODIFY"):/*------[UPDATE]--------*/
        //---
        $submit_label = 'UPDATE';
        $sql = "SELECT * FROM $DB_TABLE WHERE id={$_POST['row_id']}";
        $result = db_query($sql);
        $row = mysqli_fetch_array($result);
        $escaped['memo'] = htmlspecialchars($row['memo']);
        $escaped['url'] = htmlspecialchars($row['url']);
    elseif (isset($_POST['submit']) && $_POST['submit'] == "UPDATE"):/*------[UPDATE]--------*/
        $sql = "UPDATE $DB_TABLE SET `memo` = '{$_POST['memo']}', `url` = '{$_POST['url']}' WHERE id='{$_POST['row_id']}'";
        $result = db_query($sql);
        reload();
    else:
        //---
    endif;
    /*------[SELECT]--------*/
    $sql = "SELECT * FROM $DB_TABLE";
    $result = db_query($sql);
?>
<?php head(); ?>
<!--contents-->
<article>
    <section>
        <div class="bookmark">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="row_id" value="<?= $row['id']; ?>">
                <input type="text" name="memo" placeholder="memo" value="<?= $escaped['memo']; ?>">
                <input type="text" name="url" placeholder="url" value="<?= $escaped['url']; ?>">
                <input type="submit" name="submit" value="<?= $submit_label; ?>">
            </form>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <dl>
                    <dt><input type="checkbox" <?php if ($row['favorite'] == "Y") {
                            echo "checked = 'checked'";
                        } ?> ></dt>
                    <dd>
                        <a href="<?= $row['url']; ?>" target="_blank"><?= $row['memo']; ?></a>
                    </dd>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <dd>
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>">
                            <input type="submit" name="submit" value="DELETE">
                            <input type="submit" name="submit" value="MODIFY">

                            <?= $row['id']; ?>
                        </dd>
                    </form>
                </dl>
            <?php endwhile; ?>
        </div>
    </section>
</article>
<!--//contents-->
<?php footer(); ?>
<style>
    form input[type="text"] {display:inline-block;padding:10px 20px; border:1px solid #000;}
    section {display:block;width:100%;padding:50px;text-align:left;}
    .bookmark {display:inline-block;width:500px;margin:0 auto;}
    .bookmark dl {border-bottom:1px solid #111;}
    .bookmark dl > * {display:inline-block;padding:10px;}
    .bookmark dl dd a:hover {color:#ff0000;}
</style>
