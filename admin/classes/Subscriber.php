<?php
class Subscriber
{
    //DB params
    private $table = "blog_subscriber";
    private $conn;

    //Myguests properties
    public $subscriber_id;
    public $subscriber_email;
    public $subscriber_date_created;

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
				SET subscriber_email = :new_subscriber_email,
                    subscriber_date_created = localtime()";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":new_subscriber_email", $this->subscriber_email);
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
        $sql = "DELETE FROM $this->table WHERE subscriber_id = :get_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":get_id", $this->subscriber_id);

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
