<?php
if ($_GET['id'] == 6) {
    $return[0]["name"] = "1.1.1 Criteria";
    $return[0]["id"] = 3;
}

if ($_GET['id'] == 7) {
    $return[0]["name"] = "2.1.1 Criteria";
    $return[0]["id"] = 9;
    $return[1]["name"] = "2.3.2 Criteria";
    $return[1]["id"] = 10;
    $return[2]["name"] = "2.5.3 Criteria";
    $return[2]["id"] = 11;
}

echo json_encode($return);