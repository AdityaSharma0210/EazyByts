<?php
session_start();
include "db_connect.php";
error_reporting(E_ALL ^ E_WARNING);

$full_name			    =$_REQUEST["full_name"];
$email_id			    =$_REQUEST["email_id"];
$mobile_number		    =$_REQUEST["mobile_number"];
$message			    =$_REQUEST["message"];

$_SESSION["full_name"]		     =$full_name;
$_SESSION["email_id"]		     =$email_id;
$_SESSION["mobile_number"]	     =$mobile_number;
$_SESSION["message"]		     =$message;

$sql="insert into 
tbl_data (full_name,email_id,mobile_number,message)
values (:full_name,:email_id,:mobile_number,:message)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":full_name",$full_name);
$stmt->bindParam(":email_id",$email_id);
$stmt->bindParam(":mobile_number",$mobile_number);
$stmt->bindParam(":message",$message);
$stmt->execute();
$stmt=null;
$conn=null;

unset($_SESSION["full_name"]);
unset($_SESSION["email_id"]);
unset($_SESSION["mobile_number"]);
unset($_SESSION["message"]);
header("location:portfolio.php?msg=1#contact");
exit;
?>