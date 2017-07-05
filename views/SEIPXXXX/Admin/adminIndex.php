<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\SEIPXXXX\Admin\Auth;
use App\BITM\SEIPXXXX\Message\Message;
use App\BITM\SEIPXXXX\Utility\Utility;

?>

<ul>
    <li> <a href= "Authentication/logout.php" > LOGOUT </a></li>
</ul>
