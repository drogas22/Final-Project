<?php
include_once('../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\BITM\SEIPXXXX\Message\Message;


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>
<!-- Top content -->


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/FinalProject_TeamCoder_B59/Home.php?_ijt=d3e9v7pm572j5poul2tauejhqu">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div
    </div><!-- /.container-fluid -->
</nav>

<div class="top-content">
        <div class="container" >
            <table>
                <tr>
                    <td width='230' >

                    <td width='600' height="50" >


                        <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                            <div  id="message" class="form button"   style="font-size: smaller  " >
                                      <center>
                                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                        echo "&nbsp;".Message::message();
                                    }
                                    Message::message(NULL);
                                    ?></center>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            </table>

            <div class="row" >
                <div class="col-sm-5">


                    <div class="form-box" style="margin-top: 0%">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Log in </h3>
                                <p>Enter username and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="../Authentication/login.php" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                </div>
                                <button type="submit" class="btn">Log in!</button>
                            </form>
                            <a href="forgotten.php">Forgot Password?</a>
                        </div>
                    </div>

                </div>

                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>

                <div class="col-sm-5">

                    <div class="form-box" style="margin-top: 0%">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Registration</h3>
                                <p>Fill in the form below to get instant access:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="registration.php" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first_name">Student name</label>
                                    <input type="text" name="student_name" placeholder="Student name..." class="form-first-name form-control" id="form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Phone</label>
                                    <input type="text" name="phone" placeholder="Phone..." class="form-phone form-control" id="form-phone">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-4 control-label">Gender</label>
                                    <div class="col-sm-8">
                                        <div class="radio">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="genderName"  value="MALE" required> MALE &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<input type="radio" name="genderName"  value="FEMALE" > FEMALE
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="course">Course</label>
				                        	<input type="text" name="course" placeholder="course..." class="form-address form-control" id="form-address">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="institution">Institution</label>
                                    <input type="text" name="institution" placeholder="institution..." class="form-address form-control" id="form-address">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-8 control-label">Photo</label>
                                    <div class="col-sm-4">
                                        <input type="file" id="exampleInputFile" name="image" title="Select only image file" required>
                                    </div>
                                </div><br><br>
                                <button type="submit" class="btn">Register</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


<!-- Javascript -->
<script src="../../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>

</html>

