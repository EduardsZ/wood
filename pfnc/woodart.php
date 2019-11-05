<?php

/* 
function ddd($arr, $die = true){
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if ($die) die;
}
 */
class Connection {
    public static function make () {
        return new PDO("mysql:host=localhost;dbname=woodart;port=3306", "geekst", "taS1996");
    }
}


class QueryBuilder {
    private $db;

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    public function changeUserSubStatus($user) {
        // ddd($user);
        // $data = [];
        if($user['substatus'] == $user['subStatus']) {
            return 0;
        }
        $data['id'] = $user['id'];
        $data['substatus'] = $user['subStatus'];
        $sql = "UPDATE users SET substatus=:substatus WHERE id=:id";
        return $this->db->prepare($sql)->execute($data);
    }


    public function selectAll($table, $where = '1', $order = 'id', $fields = '*') {
        // ddd("SELECT $fields FROM $table WHERE $where ORDER BY $order");
        return $this->db->query("SELECT $fields FROM $table WHERE $where ORDER BY $order")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectWhere($table, $where) {
        return $this->db->query("SELECT * FROM $table WHERE $where")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertInTableUserevents($values) {
        $sql = "INSERT INTO userevents (userid, type, time, unixtime) VALUES (:userId, :type, :time, :unixtime)";
        $stmt= $this->db->prepare($sql);
        return $stmt->execute($values);
    }

    public function storeInvalidCard($values) {
        
        $sql = "INSERT INTO invalidcards (card, dtime, utime) VALUES (:card, :time, :unixtime)";
        $stmt= $this->db->prepare($sql);
        return $stmt->execute($values);
    }


    public function getUserIdByCard($card){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE card=? LIMIT 1");
        $stmt->execute([$card]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>

