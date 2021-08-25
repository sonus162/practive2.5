<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/period.php');

$db = new db();
$connect = $db->connect();
$period = new Period($connect);

$data =json_decode(file_get_contents("php://input"));

$period->id = $data->id;
if ($period->delete()) {
    echo json_encode(['message','Period Deleted']);
}
else
    echo json_encode(['message','Period Not Deleted']);