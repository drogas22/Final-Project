<?php
namespace App\BITM\SEIPXXXX\Admin;
use App\BITM\SEIPXXXX\Message\Message;
use App\BITM\SEIPXXXX\Utility\Utility;
use App\BITM\SEIPXXXX\Model\Database as DB;
use PDO;
use App\BITM\SEIPXXXX\Student\Student;
class Admin extends DB
{
    public $id;
    public $email;
    public $password;

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){

        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }



        return $this;
    }
    public function change_password(){
        $query="UPDATE `coaching`.`admin` SET `password`=:password  WHERE `admin`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }

    }
    //end of change_password

    public function index()
    {

        $sql = "Select * from student WHERE soft_deleted='No'";

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();

    }
    //end of index

    public function view(){
        $query=" SELECT * FROM student WHERE email = '$this->email' ";
        // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()




}