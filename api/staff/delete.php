<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/staff.php');

$db = new db();
$connect = $db->connect();
$staff = new Staff($connect);

$data =json_decode(file_get_contents("php://input"));

$staff->id = $data->id;
if ($staff->delete()) {
    echo json_encode(['message','Staff Deleted']);
}
else
    echo json_encode(['message','Staff Not Deleted']);