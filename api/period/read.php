<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../models/period.php');

    $db = new db();
    $connect= $db->connect();

    $period = new Period($connect);
    $items=$period->get();

    $num = $items->rowCount();
    if($num >0){
        $period_arr=[];
        $period_arr['data']=[];
        while($row = $items->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $period_item= array(
                'id'        => $id,
                'user_id'   =>$user_id,
                'register_name'=>$register_name,
                'start_date'      =>$start_date,
                'end_date'     =>$end_date
            );
            array_push($period_arr['data'],$period_item);
        }
        echo json_encode($period_arr);
    }