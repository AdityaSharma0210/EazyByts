<?php
session_start();
include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);

$transaction = $_REQUEST["transaction"];
$type = $_REQUEST["type"];
$category = $_REQUEST["category"];


$_SESSION["transaction"] = $transaction;
$_SESSION["type"] = $type;
$_SESSION["category"] = $category;


$sql = "insert into 
tbl_data (transaction,type,category)
values (:transaction,:type,:category)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":transaction", $transaction);
$stmt->bindParam(":type", $type);
$stmt->bindParam(":category", $category);
$stmt->execute();
$stmt = null;
$conn = null;

unset($_SESSION["transaction"]);
unset($_SESSION["type"]);
unset($_SESSION["category"]);

header("location:index.php?msg=3");
exit;
?>