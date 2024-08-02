<?php
session_start();
include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);

$eventName			    =$_REQUEST["eventName"];
$eventDate			    =$_REQUEST["eventDate"];
$eventLocation		    =$_REQUEST["eventLocation"];
$eventTimings		    =$_REQUEST["eventTimings"];
$eventDescription		=$_REQUEST["eventDescription"];
$price		          =$_REQUEST["price"];


$_SESSION["eventName"]		      =$eventName;
$_SESSION["eventDate"]		      =$eventDate;
$_SESSION["eventLocation"]	    =$eventLocation;
$_SESSION["eventTimings"]		    =$eventTimings;
$_SESSION["eventDescription"]	  =$eventDescription;
$_SESSION["price"]		          =$price;

    if (isset($_POST['submit'])) {
 
      $name = $_POST['name'];

        if (isset($_FILES['file']))
        {
          $file_name = $_FILES['file']['name'];
          $file_tmp = $_FILES['file']['tmp_name'];
 
          move_uploaded_file($file_tmp,"./poster/".$file_name);

          $sql="insert into 
            tbl_events (eventName,eventDate,eventLocation,eventTimings,eventDescription,file,price)
            values (:eventName,:eventDate,:eventLocation,:eventTimings,:eventDescription,:file,:price)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":eventName",$eventName);
            $stmt->bindParam(":eventDate",$eventDate);
            $stmt->bindParam(":eventLocation",$eventLocation);
            $stmt->bindParam(":eventTimings",$eventTimings);
            $stmt->bindParam(":eventDescription",$eventDescription);
            $stmt->bindParam(":eventDescription",$eventDescription);
            $stmt->bindParam(":file",$file_name);
            $stmt->bindParam(":price",$price);
            $stmt->execute();
        }
    }

// $sql="insert into 
// tbl_events (eventName,eventDate,eventLocation,eventTimings,eventDescription)
// values (:eventName,:eventDate,:eventLocation,:eventTimings,:eventDescription)";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(":eventName",$eventName);
// $stmt->bindParam(":eventDate",$eventDate);
// $stmt->bindParam(":eventLocation",$eventLocation);
// $stmt->bindParam(":eventTimings",$eventTimings);
// $stmt->bindParam(":eventDescription",$eventDescription);
// $stmt->execute();
// $stmt=null;
// $conn=null;

unset($_SESSION["eventName"]);
unset($_SESSION["eventDate"]);
unset($_SESSION["eventLocation"]);
unset($_SESSION["eventTimings"]);
unset($_SESSION["eventDescription"]);
unset($_SESSION["price"]);

header("location:index.php?#Events");
exit;
?>