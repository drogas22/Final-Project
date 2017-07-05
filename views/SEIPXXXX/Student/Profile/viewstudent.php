<?php


include_once('../../../../vendor/autoload.php');
use App\BITM\SEIPXXXX\Student\Auth;
use App\BITM\SEIPXXXX\Student\Student;
if(!isset($_SESSION) )session_start();


$data = new Student();
$studendata = $data->view();

$auth= new Auth();
$status = $auth->setData($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Student/Profile/signup.php');
    return;
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>Name</td>
        <td><?php echo $studendata->student_name?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td></td>
    </tr>
    <tr>
        <td>Selected Course</td>
        <td></td>
    </tr>
    <tr>
        <td>Institution</td>
        <td></td>
    </tr>
</table>
</body>
</html>