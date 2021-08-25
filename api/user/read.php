<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../models/user.php');

    $db = new db();
    $connect= $db->connect();

    $user = new User($connect);
    $items=$user->get();

    $num = $items->rowCount();
    if($num >0){
        $user_arr=[];
        $user_arr['data']=[];
        while($row = $items->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $user_item= array(
                'id'            => $id,
                'name'          =>$name,
                'kana'          =>$kana,
                'status'        =>$status,
                'start_date'   =>$start_date,
                'end_date'     =>$end_date,
                'use_flg'      =>$use_flg
            );
            array_push($user_arr['data'],$user_item);
        }
        echo json_encode($user_arr);
    }