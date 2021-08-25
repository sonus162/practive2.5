<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../models/staff.php');

    $db = new db();
    $connect= $db->connect();

    $staff = new Staff($connect);
    $items=$staff->get();

    $num = $items->rowCount();
    if($num >0){
        $staff_arr=[];
        $staff_arr['data']=[];
        while($row = $items->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $staff_item= array(
                'id'        => $id,
                'group'     =>$group_id,
                'code'      =>$code,
                'staff_name'=>$staff_name,
                'kana'      =>$kana,
                'password'  =>$password,
                'position'  =>$position,
                'occupation'=>$occupation,
                'area'      =>$area,
                'entry'     =>$entry_date,
                'admin'     =>$admin,
                'user_flg'  =>$user_flg
            );
            array_push($staff_arr['data'],$staff_item);
        }
        echo json_encode($staff_arr);
    }