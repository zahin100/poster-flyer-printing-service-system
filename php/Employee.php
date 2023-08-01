<?php 

class Employee{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $phoneNumber;
    private $username;
    private $password;
    private $role;
    private $adminId;

    public function __construct($id,$firstName,$lastName,$email,$phoneNumber,$username,$password,$role,$adminId){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->adminId = $adminId;
    }

    public function getId() {
        return $this->id;

    }

    public function getFirstName() {
        return $this->firstName;

    }

    public function getLastName() {
        return $this->lastName;

    }

    public function getEmail() {
        return $this->email;

    }

    public function getPhoneNumber() {
        return $this->phoneNumber;

    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;

    }

    public function getRole() {
        return $this->role;

    }

    public function getAdminId() {
        return $this->adminId;

    }

}



?>