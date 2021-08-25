<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/group.php');

$db = new db();
$connect = $db->connect();
$group = new Group($connect);

$data =json_decode(file_get_contents("php://input"));

$group->id = $data->id;
if ($group->delete()) {
    echo json_encode(['message','Group Deleted']);
}
else
    echo json_encode(['message','Group Not Deleted']);