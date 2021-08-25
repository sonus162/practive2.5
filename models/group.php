<?php
    class Group{
        private $conn;

        // Properties Staff
        public  $id;
        public	$code;
        public   $user_id;
        public	$group_name;
        public   $kana;
        public   $admin;	
        public   $ser_flg;

        // connect db
        public function __construct($db)
        {
            $this->conn = $db;
        }
        //get db
        public function get(){
            $query= "SELECT * FROM `group` ORDER BY `id` DESC";

            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function create(){
            $query ="INSERT INTO `group` SET  `code`=:code,`user_id`=:user_id, `group_name`=:group_name, `kana`=:kana, `admin`=:admin, `ser_flg`=:ser_flg";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->code =htmlspecialchars(strip_tags($this->code)); 
            $this->user_id = htmlspecialchars(strip_tags($this->user_id)); 
            $this->group_name=htmlspecialchars(strip_tags($this->group_name)); 
            $this->kana=htmlspecialchars(strip_tags($this->kana)); 
            $this->admin=htmlspecialchars(strip_tags($this->admin)); 
            $this->ser_flg=htmlspecialchars(strip_tags($this->ser_flg)); 
            

            $stmt->bindParam(':code',$this->code);
            $stmt->bindParam(':user_id',$this->user_id);
            $stmt->bindParam(':group_name',$this->group_name);
            $stmt->bindParam(':kana',$this->kana);
            $stmt->bindParam(':admin',$this->admin);
            $stmt->bindParam(':ser_flg',$this->ser_flg);
            
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function update(){
            $query ="UPDATE `group` SET  `code`=:code,`user_id`=:user_id, `group_name`=:group_name, `kana`=:kana, `admin`=:admin, `ser_flg`=:ser_flg WHERE `id`=:id";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->code =htmlspecialchars(strip_tags($this->code)); 
            $this->user_id = htmlspecialchars(strip_tags($this->user_id)); 
            $this->group_name=htmlspecialchars(strip_tags($this->group_name)); 
            $this->kana=htmlspecialchars(strip_tags($this->kana)); 
            $this->admin=htmlspecialchars(strip_tags($this->admin)); 
            $this->ser_flg=htmlspecialchars(strip_tags($this->ser_flg)); 
            $this->id=htmlspecialchars(strip_tags($this->id)); 
            

            $stmt->bindParam(':code',$this->code);
            $stmt->bindParam(':user_id',$this->user_id);
            $stmt->bindParam(':group_name',$this->group_name);
            $stmt->bindParam(':kana',$this->kana);
            $stmt->bindParam(':admin',$this->admin);
            $stmt->bindParam(':ser_flg',$this->ser_flg);
            $stmt->bindParam(':id',$this->id);
            
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function delete(){
            $query ="DELETE FROM`group`WHERE `id`=:id";
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