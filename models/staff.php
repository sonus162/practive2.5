<?php 
    class Staff{
        private $conn;

        // Properties Staff
        public $id;
        public	$group_id;
        public	$code;
        public	$staff_name;
        public	$kana;
        public	$password;
        public	$position;
        public	$occupation;
        public	$area;
        public	$entry_date;
        public	$admin;
        public	$user_flg;

        // connect db
        public function __construct($db)
        {
            $this->conn = $db;
        }

        //read data

        public function get(){
            $query= "SELECT * FROM `staff` ORDER BY `id` DESC";

            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function show(){
            $query= "SELECT * FROM `staff` WHERE `id`=? LIMIT =1 ";
            $stmt=$this->conn->prepare($query);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->group_id = $row['group_id']; 
            $this->code = $row['code'];
            $this->staff_name = $row['staff_name'];
            $this->kana=$row['kana'];
            $this->password=$row['password'];
            $this->position=$row['position'];
            $this->occupation=$row['occupation'];
            $this->area=$row['area'];
            $this->entry_date=$row['entry_date'];
            $this->admin=$row['admin'];
            $this->user_flg=$row['use_flg'];   
        }

        // create data
        public function create(){
            $query ="INSERT INTO `staff` SET  `group_id`=:group_id, `code`=:code, `staff_name`=:staff_name, `kana`=:kana, `password`=:password, `position`=:position, `occupation`=:occupation, `area`=:area, `entry_date`=:entry_date, `admin`=:admin, `user_flg`=:user_flg";
            $stmt=$this->conn->prepare($query);


            // clear special character
            $this->group_id =htmlspecialchars(strip_tags($this->group_id)); 
            $this->code =htmlspecialchars(strip_tags($this->code)); 
            $this->staff_name = htmlspecialchars(strip_tags($this->staff_name)); 
            $this->kana=htmlspecialchars(strip_tags($this->kana)); 
            $this->password=htmlspecialchars(strip_tags($this->password)); 
            $this->position=htmlspecialchars(strip_tags($this->position)); 
            $this->occupation=htmlspecialchars(strip_tags($this->occupation)); 
            $this->entry_date=htmlspecialchars(strip_tags($this->entry_date)); 
            $this->admin=htmlspecialchars(strip_tags($this->admin)); 
            $this->user_flg=htmlspecialchars(strip_tags($this->user_flg)); 
            

            $stmt->bindParam(':group_id',$this->group_id);
            $stmt->bindParam(':code',$this->code);
            $stmt->bindParam(':staff_name',$this->staff_name);
            $stmt->bindParam(':kana',$this->kana);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':position',$this->position);
            $stmt->bindParam(':occupation',$this->occupation);
            $stmt->bindParam(':area',$this->area);
            $stmt->bindParam(':entry_date',$this->entry_date);
            $stmt->bindParam(':admin',$this->admin);
            $stmt->bindParam(':user_flg',$this->user_flg);
            
            
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function update(){
            $query ="UPDATE `staff` SET  `group_id`=:group_id, `code`=:code, `staff_name`=:staff_name, `kana`=:kana, `password`=:password, `position`=:position, `occupation`=:occupation, `area`=:area, `entry_date`=:entry_date, `admin`=:admin, `user_flg`=:user_flg WHERE `id`=:id";
            $stmt=$this->conn->prepare($query);

            // clear special character
            $this->group_id =htmlspecialchars(strip_tags($this->group_id)); 
            $this->code =htmlspecialchars(strip_tags($this->code)); 
            $this->staff_name = htmlspecialchars(strip_tags($this->staff_name)); 
            $this->kana=htmlspecialchars(strip_tags($this->kana)); 
            $this->password=htmlspecialchars(strip_tags($this->password)); 
            $this->position=htmlspecialchars(strip_tags($this->position)); 
            $this->occupation=htmlspecialchars(strip_tags($this->occupation)); 
            $this->entry_date=htmlspecialchars(strip_tags($this->entry_date)); 
            $this->admin=htmlspecialchars(strip_tags($this->admin)); 
            $this->user_flg=htmlspecialchars(strip_tags($this->user_flg));  

            $stmt->bindParam(':group_id',$this->group_id);
            $stmt->bindParam(':code',$this->code);
            $stmt->bindParam(':staff_name',$this->staff_name);
            $stmt->bindParam(':kana',$this->kana);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':position',$this->position);
            $stmt->bindParam(':area',$this->area);
            $stmt->bindParam(':occupation',$this->occupation);
            $stmt->bindParam(':entry_date',$this->entry_date);
            $stmt->bindParam(':admin',$this->admin);
            $stmt->bindParam(':user_flg',$this->user_flg);
            $stmt->bindParam(':id',$this->id);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error%s.\n",$stmt->error);
            return false;
        }
        public function delete(){
            $query ="DELETE FROM`staff`WHERE `id`=:id";
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