<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/staff.php');

$db = new db();
$connect = $db->connect();
$staff = new Staff($connect);

$data =json_decode(file_get_contents("php://input"));

$staff->id = $data->id;
$staff->group_id    = $data->group_id;
$staff->code        = $data->code;
$staff->staff_name  = $data->staff_name;
$staff->kana        =$data->kana;
$staff->password    =$data->password;
$staff->position    =$data->position;
$staff->occupation  =$data->occupation;
$staff->area        =$data->area;
$staff->entry_date  =$data->entry_date;
$staff->admin       =$data->admin;
$staff->user_flg    =$data->user_flg;

if ($staff->update()) {
    echo json_encode(['message','Staff Updated']);
}
else
    echo json_encode(['message','Staff Not Updated']);