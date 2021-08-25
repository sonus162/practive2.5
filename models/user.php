<?php
    class User{
        private $conn;
        // Properties Staff
        public  $id;
        public	$name;
        public   $kana;
        public	$status;
        public   $start_date;
        public   $end_date;	
        public   $use_flg;

        // connect db
        public function __construct($db)
        {
            $this->conn = $db;
        }
        //get db
        public function get(){
            $query= "SELECT * FROM `user` ORDER BY `id` DESC";

            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function create(){
            $query ="INSERT INTO `user` SET  `name`=:name,`kana`=:kana, `status`=:status, `start_date`=:start_date, `end_date`=:end_date, `user_flg`=:user_flg";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->name =htmlspecialchars(strip_tags($this->name)); 
            $this->kana=htmlspecialchars(strip_tags($this->kana)); 
            $this->status = htmlspecialchars(strip_tags($this->status)); 
            $this->start_date=htmlspecialchars(strip_tags($this->start_date)); 
            $this->end_date=htmlspecialchars(strip_tags($this->end_date)); 
            $this->user_flg=htmlspecialchars(strip_tags($this->user_flg)); 
            

            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':kana',$this->kana);
            $stmt->bindParam(':status',$this->status);
            $stmt->bindParam(':start_date',$this->start_date);
            $stmt->bindParam(':end_date',$this->end_date);
            $stmt->bindParam(':user_flg',$this->user_flg);
            
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function update(){
            $query ="UPDATE `user` SET  `name`=:name,`kana`=:kana, `status`=:status, `start_date`=:start_date, `end_date`=:end_date, `user_flg`=:user_flg WHERE `id`=:id";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->name =htmlspecialchars(strip_tags($this->name)); 
            $this->kana=htmlspecialchars(strip_tags($this->kana)); 
            $this->status = htmlspecialchars(strip_tags($this->status)); 
            $this->start_date=htmlspecialchars(strip_tags($this->start_date)); 
            $this->end_date=htmlspecialchars(strip_tags($this->end_date)); 
            $this->user_flg=htmlspecialchars(strip_tags($this->user_flg)); 
            $this->id=htmlspecialchars(strip_tags($this->id)); 
            

            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':kana',$this->kana);
            $stmt->bindParam(':status',$this->status);
            $stmt->bindParam(':start_date',$this->start_date);
            $stmt->bindParam(':end_date',$this->end_date);
            $stmt->bindParam(':id',$this->id);
            
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function delete(){
            $query ="DELETE FROM`user`WHERE `id`=:id";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->id=htmlspecialchars(strip_tags($this->id)); 

            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }


    }