<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/woodart.php';

$type = $_POST['type'];
$card = $_POST['card'];

if(!empty($card) and !empty($type)) {
    $time = date('Y-m-d H:i:s');
    $unixTime = time();
    $data = [];
    $db = new QueryBuilder(Connection::make());
    $user = $db->getUserIdByCard($card);
    $user['subStatus'] = $type;
    $data['userId'] = $user['id'];
    $data['type'] = $type;
    $data['time'] = $time;
    $data['unixtime'] = $unixTime;
    if($data['userId'] != NULL){
        if($db->changeUserSubStatus($user)) {
            $result = $db->insertInTableUserevents($data);
        }
        echo $result;
    } else {
        $numb['time'] = $time;
        $numb['unixTime'] = $unixTime;
        $numb['card'] = $card;
        if (storeInvalidCard($numb)) {
            echo '3';
        }
        else {
            echo '4';
        };
    }
}
else {
    echo '8';
}