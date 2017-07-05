<?php
namespace App\BITM\SEIPXXXX\Student;
use App\BITM\SEIPXXXX\Message\Message;
use App\BITM\SEIPXXXX\Utility\Utility;
use App\BITM\SEIPXXXX\Model\Database as DB;
use PDO;


class Student extends DB{
    public $table="student";
    public $student_name="";
    public $email="";
    public $password="";
    public $phone="";
    public $gender="";
    public $course="";
    public $institution="";
    public $image="";

    public $id="";
    public $email_verified="";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('student_name',$data)){
            $this->student_name=$data['student_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('gender',$data)){
            $this->gender=$data['gender'];
        }
        if(array_key_exists('course',$data)){
            $this->course=$data['course'];
        }
        if(array_key_exists('institution',$data)){
            $this->institution=$data['institution'];
        }
        if(array_key_exists('image',$data)){
            $this->image=$data['image'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('email_verified',$data)){
            $this->email_verified=$data['email_verified'];
        }


        return $this;
    }





    public function store() {


        $dataArray= array(':student_name'=>$this->student_name,':email'=>$this->email,':password'=>$this->email,':phone'=>$this->phone,
            ':gender'=>$this->gender,':course'=>$this->course,':institution'=>$this->institution,':image'=>$this->image,':email_verified'=>$this->email_verified);


        $query="INSERT INTO `coaching`.`student` (`student_name`, `email`, `password`, `phone`, `gender`, `course`,`institution`,`image`,`email_verified`) 
VALUES (:student_name, :email, :password, :phone,:gender, :course, :institution, :image, :email_verified)";

        $STH=$this->conn->prepare($query);

        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `coaching`.`student` SET `password`=:password  WHERE `student`.`email` =:email";
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

    public function view($idx)
    {

        $sql = "Select * from student WHERE id=" . $idx;

        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()


    public function validTokenUpdate(){
        $query="UPDATE `coaching`.`student` SET  `email_verified`='".'Yes'."' WHERE `student`.`email` ='$this->email'";
        $result=$this->conn->prepare($query);
        $result->execute();

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/SEIPXXXX/Student/Profile/signup.php');
    }

    public function update(){

        $query="UPDATE `coaching`.`student` SET `student_name`=:student_name, `email` =:email ,  `password` =:password, `phone` = :phone,
 `gender` = :gender, `course` = :course, `institution` = :institution, `image` = :image, `email_verified` = :email_verified WHERE `users`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':student_name'=>$this->student_name,':email'=>$this->email,':password'=>$this->email,':phone'=>$this->phone,
            ':gender'=>$this->gender,':course'=>$this->course,':institution'=>$this->institution,':image'=>$this->image,':email_verified'=>$this->email_verified));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }

}

