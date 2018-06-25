<!DOCTYPE html>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
?>
<?php
    $sql = "INSERT INTO `php_bookmark` (`id`,`memo`,`url`,`date`,`favorite`)
    VALUES (null, '{$_POST['memo']}', '{$_POST['url']}', '', 'N')";
    $result = db_query($sql);
    var_dump($result);
    if ($result === false) {
        echo "문제발생";
    } else {
        exit(header("Location: /php/"));
    }
?>

