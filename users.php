<?php

class Users {
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($name,$email,$password,$id=null){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function selectAllUsers($db){
        $sql = "SELECT *
                FROM `users`";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function selectUser($db,$id){
        $sql = "SELECT `ID`, `name`, `email`, `password` 
                FROM `users` 
                WHERE ID = :id";
        
        $stmt = $db->prepare($sql);
        $stmt->bindparam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function insert($db){
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) 
        VALUES (:name,:email,:password)";

        $stmt = $db->prepare($sql);
        $stmt->bindparam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindparam(':email',$this->email,PDO::PARAM_STR);
        $stmt->bindparam(':password',$this->password,PDO::PARAM_STR);

        $stmt->execute();
    }

    public function update($db){
        $sql = "UPDATE `users` 
                SET `name`= :name,
                    `email`= :email,
                    `password`= :password 
                WHERE ID = :id";
        
        $stmt = $db->prepare($sql);
        $stmt->bindparam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindparam(':email',$this->email,PDO::PARAM_STR);
        $stmt->bindparam(':password',$this->password,PDO::PARAM_STR);
        $stmt->bindparam(':id',$this->id,PDO::PARAM_STR);

        $stmt->execute();
    }

    public function delete($db){
        $sql = "DELETE FROM `users` WHERE ID = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindparam(':id', $this->id, PDO::PARAM_STR);

        $stmt->execute();
    }

}