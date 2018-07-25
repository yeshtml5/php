<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    // required headers
    //
    /*------[config]--------*/
    $DB_TABLE = 'php_bookmark';
    $submit_label = 'INSERT';
    $escaped['memo'] = null;
    $escaped['url'] = null;
    //
    $sql = "SELECT * FROM $DB_TABLE";
    $db = new DB();
    $db->query($sql);
    echo $db->getJson();
?>
