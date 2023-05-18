<?php
class Contact
{
    //DB params
    private $table = "blog_contact";
    private $conn;

    //Myguests properties
    public $contact_id;
    public $contact_fullname;
    public $contact_email;
    public $contact_phone;
    public $contact_message;
    public $contact_date_created;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Read all records
    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function read_db() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    //Add record
    public function add()
    {
        $sql = "INSERT INTO $this->table
				SET contact_fullname = :new_contact_fullname,
                    contact_email = :new_contact_email,
                    contact_phone = :new_contact_phone,
                    contact_message = :new_contact_message,
                    contact_date_created = localtime()";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":new_contact_fullname", $this->contact_fullname);
        $stmt->bindParam(":new_contact_email", $this->contact_email);
        $stmt->bindParam(":new_contact_phone", $this->contact_phone);
        $stmt->bindParam(":new_contact_message", $this->contact_message);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error insert record: <br>" . $e->getMessage();
            return false;
        }
    }

    //Delete record
    public function delete()
    {
        $sql = "DELETE FROM $this->table WHERE contact_id = :get_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":get_id", $this->contact_id);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error delete record: <br>" . $e->getMessage();
            return false;
        }
    }
}
