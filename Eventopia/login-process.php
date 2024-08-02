<?php
session_start();
include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);

$userinfo			    =$_REQUEST["userinfo"];
$password		        =$_REQUEST["password"];

$stmt = $conn->prepare("select password from tbl_info where email_id=:userinfo OR mobile_number=:userinfo");
$stmt->bindParam(":userinfo",$userinfo);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $stored_password = $row['password'];

    // Verify the password
    if ($password === $stored_password) {
        $_SESSION['userinfo'] = $userinfo;
        header("Location:index.php");
        exit;
    }
    else {
        header("Location:login.php?err=1");
        exit;
    }
}
else {
    header("Location: login.php?err=2");
    exit;
}

$stmt=null;
$conn=null;
?>