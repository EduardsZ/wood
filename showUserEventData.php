<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/woodart.php';

$id = $_POST['id'];
$period = $_POST['period'];

if(!empty($id)) {
    
    $where = "userid = $id";
    $userData = "id = $id";
    $thisYear = date('Y');
    $thisMonth = date('m');
    $thisDay = date('d');
    
    if($period == 'day') {
        $where = "userid = $id AND time >= '" . $thisYear . "-" . $thisMonth . "-" . $thisDay . " 00:00:00'"; 
    } else {
        $where = "(userid = $id AND time >= '" . $thisYear . "-" . $thisMonth . "-01 00:00:00')"; 
    }
    $db = new QueryBuilder(Connection::make());
    $user['Events'] = $db->selectAll('userevents', $where, 'time');
    $user['Data'] = $db->selectAll('users', $userData);
    echo json_encode($user);
}
else {
    echo 'err';
}