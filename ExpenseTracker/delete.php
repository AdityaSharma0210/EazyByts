<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include "db-connect.php";

$deleteId = $_REQUEST["deleteId"];
$sql = "delete from tbl_data where id =:deleteId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':deleteId', $deleteId);
$stmt->execute();
$stmt = null;
header("Location:index.php?msg=1#table");

?>