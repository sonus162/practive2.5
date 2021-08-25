<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../models/group.php');

    $db = new db();
    $connect= $db->connect();

    $group = new Group($connect);
    $items=$group->get();

    $num = $items->rowCount();
    if($num >0){
        $group_arr=[];
        $group_arr['data']=[];
        while($row = $items->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $group_item= array(
                'id'        => $id,
                'code'      =>$code,
                'user_id'   =>$user_id,
                'group_name'=>$group_name,
                'kana'      =>$kana,
                'admin'     =>$admin,
                'ser_flg'  =>$ser_flg
            );
            array_push($group_arr['data'],$group_item);
        }
        echo json_encode($group_arr);
    }