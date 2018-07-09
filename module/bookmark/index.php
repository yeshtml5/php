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
        $now = date('Y-m-d H:i:s');
        $escaped['memo'] = htmlspecialchars($_POST['memo']);
        $escaped['url'] = htmlspecialchars($_POST['url']);
        $sql = "INSERT INTO $DB_TABLE (`id`,`memo`,`url`,`date`,`favorite`) VALUES (null, '{$escaped['memo']}', '{$escaped['url']}', '{$now}', 'N')";
        $result = db_query($sql);
        reload();
    elseif (isset($_POST['submit']) && $_POST['submit'] == "DELETE"):/*------[DELETE]--------*/
        $sql = "DELETE FROM $DB_TABLE WHERE `php_bookmark`.`id` = '{$_POST['row_id']}'";
        $result = db_query($sql);
        reload();
    elseif (isset($_POST['submit']) && $_POST['submit'] == "MODIFY"):/*------[MODIFY]--------*/
        //---
        $submit_label = 'UPDATE';
        $sql = "SELECT * FROM $DB_TABLE WHERE id={$_POST['row_id']}";
        $result = db_query($sql);
        $row = mysqli_fetch_array($result);
        $escaped['memo'] = htmlspecialchars($row['memo']);
        $escaped['url'] = htmlspecialchars($row['url']);
        $escaped['favorite'] = htmlspecialchars($row['favorite']);
    elseif (isset($_POST['submit']) && $_POST['submit'] == "UPDATE"):/*------[UPDATE]--------*/
        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE $DB_TABLE SET `memo` = '{$_POST['memo']}', `url` = '{$_POST['url']}',`favorite` = '{$_POST['row_checked']}',`date` = '{$now}' WHERE id='{$_POST['row_id']}'";
        $result = db_query($sql);
        reload();
    else:
        //---
    endif;
    /*------[SELECT]--------*/
    $sql = "SELECT * FROM $DB_TABLE";
    $result = db_query($sql);
?>
<!Doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[script]-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <!--[style]-->
    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/fontawesome.css"/>
    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/basic.css"/>
    <link type="text/css" rel="stylesheet" href="<?= theme(); ?>src/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<body>
<!--contents-->
<article>
    <section class="bookmark-wrap">
        <?= debug($escaped); ?>
        <?= isMobile(); ?>
        <div class="cont">
            <div class="create-wrap">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php if (isset($row)) : ?>
                        <input type="hidden" name="row_id" value="<?= $row['id']; ?>">
                        <input type="checkbox" name="row_checked" <?php if ($row['favorite'] == "on") {
                            echo "checked = 'checked'";
                        } ?> >
                    <?php endif; ?>
                    <input type="text" name="memo" placeholder="memo" value="<?= $escaped['memo']; ?>">
                    <input type="text" name="url" placeholder="url" value="<?= $escaped['url']; ?>">
                    <input type="submit" name="submit" value="<?= $submit_label; ?>">
                </form>
            </div>
            <div class="list-wrap">
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <dl>
                        <dt><input type="checkbox" name="checked"
                                   value="<?= $row['favorite'] ?>" <?php if ($row['favorite'] == "on") {
                                echo "checked = 'checked'";
                            } ?> ></dt>
                        <dd>
                            <a href="<?= $row['url']; ?>" target="_blank"><?= $row['memo']; ?></a>
                        </dd>
                        <dd class="btn-wrap">
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>">
                                <input type="submit" name="submit" value="DELETE">
                                <input type="submit" name="submit" value="MODIFY">
                            </form>
                        </dd>
                    </dl>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
</article>
<!--//contents-->
</body>
</html>