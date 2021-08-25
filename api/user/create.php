<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/user.php');

$db = new db();
$connect = $db->connect();
$user = new User($connect);

$data =json_decode(file_get_contents("php://input"));

$user->name        = $data->name;
$user->kana  = $data->kana;
$user->status    =$data->status;
$user->start_date        =$data->start_date;
$user->end_date       =$data->end_date;
$user->use_flg    =$data->use_flg;

if ($user->create()==true) {
    echo json_encode(['message','User Created']);
}
else
    echo json_encode(['message','User Not Created']);