<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/php/inc/common.inc"); ?>
<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    //
    /*------[config]--------*/
    $DB_TABLE = 'php_bookmark';
    $submit_label = 'INSERT';
    $escaped['memo'] = null;
    $escaped['url'] = null;
    //
    $sql = "SELECT * FROM $DB_TABLE";
    $result = db_query($sql);
    echo "{";
    while ($row = mysqli_fetch_array($result)) {
        extract($row);
        echo "[";
        foreach ($row as $key=>$value){
            echo $key.":".$value;
        }
        echo "]";
    }
   // echo json_encode($products_arr);
    echo "}";
?>
