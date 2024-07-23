<?php
session_start(); 
include "db-connect.php";

$editId				    =$_REQUEST["editId"];
$transaction			=$_REQUEST["transaction"];
$type			        =$_REQUEST["type"];
$category			    =$_REQUEST["category"];

$sql="update tbl_data set transaction=:transaction, type=:type, category=:category where id=:editId";

$stmt=$conn->prepare($sql);
$stmt->bindParam(":editId",$editId);
$stmt->bindParam(":transaction",$transaction);
$stmt->bindParam(":type",$type);
$stmt->bindParam(":category",$category);

$stmt->execute();
header("location:index.php?msg=2#table");
exit;
?>