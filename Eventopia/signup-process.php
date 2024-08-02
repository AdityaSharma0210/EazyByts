<?php
session_start();
include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);

$full_name			    =$_REQUEST["full_name"];
$email_id			    =$_REQUEST["email_id"];
$mobile_number		    =$_REQUEST["mobile_number"];
$password		        =$_REQUEST["password"];
$cpassword		        =$_REQUEST["cpassword"];


$_SESSION["full_name"]		     =$full_name;
$_SESSION["email_id"]		     =$email_id;
$_SESSION["mobile_number"]	     =$mobile_number;
$_SESSION["password"]		     =$password;
$_SESSION["cpassword"]	         =$cpassword;

if($password != $cpassword){
    header("location:signup.php?err=1");
	exit;
}

$stmt = $conn->prepare("select * from tbl_info where email_id=:email_id");
$stmt->bindParam(":email_id",$email_id);
$stmt->execute();
$count=$stmt->rowcount();
if($count>0)
{
	header("location:signup.php?err=2");
	exit;	
}

$sql="insert into 
tbl_info (full_name,email_id,mobile_number,password,cpassword)
values (:full_name,:email_id,:mobile_number,:password,:cpassword)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":full_name",$full_name);
$stmt->bindParam(":email_id",$email_id);
$stmt->bindParam(":mobile_number",$mobile_number);
$stmt->bindParam(":password",$password);
$stmt->bindParam(":cpassword",$cpassword);
$stmt->execute();
$stmt=null;
$conn=null;

unset($_SESSION["full_name"]);
unset($_SESSION["email_id"]);
unset($_SESSION["mobile_number"]);
unset($_SESSION["password"]);
unset($_SESSION["cpassword"]);

header("location:login.php?");
exit;
?>