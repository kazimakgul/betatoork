 <?php
session_start();
$session_uid=$_SESSION['uid']; 
if(!empty($session_uid))
{
$uid=$session_uid;
}
else
{
header("location:login.php");
}
?>
