<?php
    class Period{
        private $conn;
        // Properties Staff
        public  $id;
        public	$user_id;
        public   $register_name;
        public   $start_date;
        public   $end_date;	

        // connect db
        public function __construct($db)
        {
            $this->conn = $db;
        }
        //get db
        public function get(){
            $query= "SELECT * FROM `period` ORDER BY `id` DESC";

            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function create(){
            $query ="INSERT INTO `period` SET  `user_id`=:user_id,`register_name`=:register_name,  `start_date`=:start_date, `end_date`=:end_date";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->user_id =htmlspecialchars(strip_tags($this->user_id)); 
            $this->register_name=htmlspecialchars(strip_tags($this->register_name)); 
            $this->start_date=htmlspecialchars(strip_tags($this->start_date)); 
            $this->end_date=htmlspecialchars(strip_tags($this->end_date)); 
            
            $stmt->bindParam(':user_id',$this->user_id);
            $stmt->bindParam(':register_name',$this->register_name);
            $stmt->bindParam(':start_date',$this->start_date);
            $stmt->bindParam(':end_date',$this->end_date);
            
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function update(){
            $query ="UPDATE `period` SET  `user_id`=:user_id,`register_name`=:register_name,  `start_date`=:start_date, `end_date`=:end_date WHERE `id`=:id";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->user_id =htmlspecialchars(strip_tags($this->user_id)); 
            $this->register_name=htmlspecialchars(strip_tags($this->register_name)); 
            $this->start_date=htmlspecialchars(strip_tags($this->start_date)); 
            $this->end_date=htmlspecialchars(strip_tags($this->end_date)); 
            $this->id=htmlspecialchars(strip_tags($this->id)); 
            
            $stmt->bindParam(':user_id',$this->user_id);
            $stmt->bindParam(':register_name',$this->register_name);
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
            $query ="DELETE FROM`period`WHERE `id`=:id";
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