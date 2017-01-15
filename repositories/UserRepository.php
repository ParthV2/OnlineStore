<?php
  class UserRepository {
    public static function register($user) {
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("INSERT INTO USER (user_first_name, user_last_name, user_email, user_password, user_is_vendor, user_address, user_city, user_state, user_zip_code)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);")) {

            $stmt->bind_param("ssssissss", $user->first_name, $user->last_name, $user->email, $user->password, $user->is_vendor, $user->address, $user->city, $user->state, $user->zip);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    public static function getUserByEmail($email){
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM USER WHERE user_email = ? LIMIT 1;")) {

            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();
            
            
            while ($row = $result->fetch_assoc()) {
                $user = UserRepository::bindUser($row);
                
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $user;
    }
    
    
    public static function login($email, $password){
        require_once('models/User.php');
        
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM USER WHERE user_email = ? AND user_password = ? LIMIT 1;")) {

            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();

            $result = $stmt->get_result();
            
            
            while ($row = $result->fetch_assoc()) {
                $user = UserRepository::bindUser($row);
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $user;
    }
    
    public static function bindUser($row){
        $user = new User();
        $user->id = $row['user_id'];
        $user->first_name = $row['user_first_name'];
        $user->last_name = $row['user_last_name'];
        $user->email = $row['user_email'];
        $user->is_vendor = $row['user_is_vendor'];
        $user->address = $row['user_address'];
        $user->city = $row['user_city'];
        $user->state = $row['user_state'];
        $user->zip = $row['user_zip_code'];
        return $user;
    }
  }
?>