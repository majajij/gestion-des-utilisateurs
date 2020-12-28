<?php
require_once 'Connection.php';
class User extends Connection{
    protected $table = '`users`';
    public function getAll(){
        try{
            $users = array();
            $result = parent::query('SELECT * FROM '.$this->table);
            while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($users, $record);
            }
            return $users;
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage());
        }
    }

    public function find($id){
        try{
            $result = parent::query("SELECT * FROM ".$this->table." WHERE id=".$id);
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    public function addUser($name,$email,$pseudo,$password){
        try{
            $password=password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO ".$this->table."(name,email,pseudo,password) VALUES(?,?,?,?)";
            $pre = $this->connection->prepare($sql);
            $pre->execute([$name,$email,$pseudo,$password]);
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage());
        }
    }

    public function deleteUser($id){
        try{
            if ($this->find($id)) {
                $sql = "DELETE FROM ".$this->table." WHERE id=?";
                $pre = $this->connection->prepare($sql);
                $pre->execute([$id]);
            }else{
                echo 'user does not exist';
            }
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage());
        }
    }

    public function updateUser($id,$name,$email,$pseudo){
        try{
            $sql = "UPDATE users SET name=?, email=?, pseudo=? WHERE id=?";
            $pre = $this->connection->prepare($sql);
            $pre->execute([$name,$email,$pseudo,$id]);
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage());
        }
    }

    public function login($email, $password){
        try{
            $result = parent::query("SELECT * FROM $this->table WHERE email LIKE '$email'");
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                $password_db =  $data['password'];

                if (password_verify($password,$password_db)) {
                    $_SESSION['alert'] = "Welcome back !";
                    return $data;
                }else{
                    $_SESSION['alert'] = "email or password are not correct";
                }

            }else{
                $_SESSION['alert'] = "email or password are not correct";
            }
            
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage());
        }
    }
    
}
?>