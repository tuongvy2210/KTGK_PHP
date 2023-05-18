<?php
class User
{

    //DB params
    private $table = "blog_user";
    private $conn;

    //blog_post properties
    public $user_id;
    public $user_name;
    public $user_password;
    public $user_fullname;
    public $user_phone;
    public $user_email;
    public $user_image;
    public $user_message;
    public $user_date_updated;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login(){
		//tạo câu truy vấn sql để lấy thông tin user
		$sql = "SELECT * FROM $this->table 
		WHERE user_email = :get_email 
		AND user_password = :get_password";


		//thuc hien truy van sql

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_email",$this->user_email);
		$stmt->bindParam(":get_password",$this->user_password);
		$stmt->execute();
	
		//tra ve ket qua truy van
		return $stmt;
	

	
	}

    //Read all records
    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    //Read one record
    public function read()
    {
        $sql = "SELECT * FROM $this->table WHERE user_id = :get_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":get_id", $this->user_id);
        $stmt->execute();
        $row = $stmt->fetch();

        $this->user_id = $row['user_id'];
        $this->user_name = $row['user_name'];
        $this->user_password = $row['user_password'];
        $this->user_fullname = $row['user_fullname'];
        $this->user_phone = $row['user_phone'];
        $this->user_email = $row['user_email'];
        $this->user_image = $row['user_image'];
        $this->user_message = $row['user_message'];
        $this->user_date_updated = $row['user_date_updated'];
    }

    //Add record
    public function add()
    {
        $sql = "INSERT INTO $this->table
				SET user_name = :new_user_name,
					user_password = :new_user_password,
					user_fullname = :new_user_fullname,
					user_phone = :new_user_phone,
					user_email = :new_user_email,
					user_image = :new_user_image,
					user_message = :new_user_message,
					user_date_updated = :new_user_date_updated";


        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":new_user_name", $this->user_name);
        $stmt->bindParam(":new_user_password", $this->user_password);
        $stmt->bindParam(":new_user_fullname", $this->user_fullname);
        $stmt->bindParam(":new_user_phone", $this->user_phone);
        $stmt->bindParam(":new_user_email", $this->user_email);
        $stmt->bindParam(":new_user_image", $this->user_image);
        $stmt->bindParam(":new_user_message", $this->user_message);
        $stmt->bindParam(":new_user_date_updated", $this->user_date_updated);


        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error insert record: <br>" . $e->getMessage();
            return false;
        }
    }

    //Update record
    public function update()
    {
        $sql = "UPDATE $this->table
				SET user_fullname = :new_user_fullname,
					user_phone = :new_user_phone,
					user_email = :new_user_email,
					user_image = :new_user_image,
					user_message = :new_user_message,
					user_date_updated = :new_user_date_updated
				WHERE user_id = :get_id";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":new_user_fullname", $this->user_fullname);
        $stmt->bindParam(":new_user_phone", $this->user_phone);
        $stmt->bindParam(":new_user_email", $this->user_email);
        $stmt->bindParam(":new_user_image", $this->user_image);
        $stmt->bindParam(":new_user_message", $this->user_message);
        $stmt->bindParam(":new_user_date_updated", $this->user_date_updated);
        $stmt->bindParam(":get_id", $this->user_id);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error update record: <br>" . $e->getMessage();
            return false;
        }
    }

}
