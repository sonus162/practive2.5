<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/user.php');

$db = new db();
$connect = $db->connect();
$user = new User($connect);

$data =json_decode(file_get_contents("php://input"));

$user->id = $data->id;
if ($user->delete()) {
    echo json_encode(['message','User Deleted']);
}
else
    echo json_encode(['message','User Not Deleted']);