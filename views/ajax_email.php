<?php

$email=$_POST['email'];

// データベース接続

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWD','');
define('DB_NAME','jleague_review');

try {
$dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8;',DB_USER,DB_PASSWD,array(PDO::ATTR_EMULATE_PREPARES => false));	
$sql = "SELECT COUNT(*) AS cnt FROM user_table WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt-> execute();
$cnt = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
 var_dump($e->getMessage());
 exit;
}
$rst[] = array(
    'count'=> $cnt['cnt']
 );

header("Content-Type: application/json; charset=utf-8");
header('X-Content-Type-Options: nosniff');

//JSON 出力
echo json_encode($rst);

?>