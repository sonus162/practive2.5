<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/group.php');

$db = new db();
$connect = $db->connect();
$group = new Group($connect);

$data =json_decode(file_get_contents("php://input"));

$group->code        = $data->code;
$group->user_id  = $data->user_id;
$group->group_name    =$data->group_name;
$group->kana        =$data->kana;
$group->admin       =$data->admin;
$group->ser_flg    =$data->ser_flg;

if ($group->create()==true) {
    echo json_encode(['message','Group Created']);
}
else
    echo json_encode(['message','Group Not Created']);