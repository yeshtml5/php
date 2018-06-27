<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    /*------[config]--------*/
    $DB_TABLE = 'php_bookmark';
    /*------[function]--------*/
    function reload() {
        echo "<script>window.location = \"/php/module/bookmark/\";</script>";
    }
    if (isset($_POST['submit']) && $_POST['submit'] == "INSERT"):/*------[CREATE]--------*/
        $sql = "INSERT INTO $DB_TABLE (`id`,`memo`,`url`,`date`,`favorite`) VALUES (null, '{$_POST['memo']}', '{$_POST['url']}', '', 'N')";
        $result = db_query($sql);
        reload();
    elseif (isset($_POST['submit']) && $_POST['submit'] == "DELETE"):/*------[DELETE]--------*/
        $id = $_POST['row_id'];
        $sql = "DELETE FROM $DB_TABLE WHERE `php_bookmark`.`id` = {$id}";
        $result = db_query($sql);
        reload();
    elseif (isset($_POST['submit']) && $_POST['submit'] == "UPDATE"):/*------[UPDATE]--------*/
        //---
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
                <input type="text" name="memo" placeholder="memo">
                <input type="text" name="url" placeholder="url">
                <input type="submit" name="submit" value="INSERT">
            </form>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <dl data-id="<?= $row['id']; ?>">
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
                        </dd>
                    </form>
                </dl>
            <?php endwhile; ?>
        </div>
    </section>
    <!--input[type="hidden"]-->
    <input type="hidden" name="form_mode" value="list">
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
