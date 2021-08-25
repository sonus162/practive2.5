<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
header('Content-Type: application/json');


include_once('../../config/db.php');
include_once('../../models/staff.php');

$db = new db();
$connect = $db->connect();
$period = new Period($connect);

$data =json_decode(file_get_contents("php://input"));
$period->id =$data->id;
$period->user_id        = $data->user_id;
$period->register_name  = $data->register_name;
$period->start_date    =$data->start_date;
$period->end_date        =$data->end_date;

if ($period->update()==true) {
    echo json_encode(['message','Period Created']);
}
else
    echo json_encode(['message','Period Not Created']);