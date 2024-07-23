<?php
error_reporting(E_ALL ^ E_WARNING);
session_start(); 
include "db-connect.php";

$editId=$_REQUEST["editId"];
$stmt = $conn->prepare("select * from tbl_data where id=:editId");
$stmt->bindParam(":editId",$editId);
$stmt->execute();
$row=$stmt->fetch();

$transaction			=$row["transaction"];
$type				    =$row["type"];
$category			    =$row["category"];

$conn=null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <title>Finance Tracker</title>
    <style>
    body {
        background-color: white;
        color: black;
        font-family: "Nunito", sans-serif;
        font-size: 20px;
    }

    .c2 {
        margin: 40px auto;
    }

    .c6 {
        padding: 20px;
        border-radius: 20px;
        border: 4px solid #007ea7;
        margin: 50px auto;
    }

    h1,
    h3 {
        color: #023047;
    }

    hr {
        border: 3px solid #007ea7;
    }
    </style>
</head>


<body>
    <div class="container">
        <div class="row c2">
            <center>
                <h1>Finance Tracker</h1>
            </center>
        </div>
        <hr />
        <div class="col-md-4 col-sm-4 c6">
            <div class="row">
                <form action="edit-process.php" method="post">
                    <input type="hidden" id="editId" name="editId" value="<?php echo $editId;?>">
                    <center>
                        <h3>Edit Transaction</h3>
                    </center>
                    <hr />
                    <div class="mb-4 sb-4">
                        <label for="exampleFormControlInput1" class="form-label">Transaction Amount</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter amount In Rupees" name="transaction" value="<?php echo $transaction ?>"
                            required />
                    </div>
                    <div class="mb-4 sb-4">
                        <label for="exampleFormControlInput1" class="form-label">Transaction Type</label>
                        <select class="form-select" aria-label="Default select example" name="type"
                            value="<?php echo $_SESSION["type"]; ?>" required>
                            <option selected>Select</option>
                            <option <?php if($type==1) { ?> selected <?php } ?> value="1">Income</option>
                            <option <?php if($type==2) { ?> selected <?php } ?> value="2">Expense</option>
                            <option <?php if($type==3) { ?> selected <?php } ?> value="3">Investment</option>
                        </select>
                    </div>
                    <div class="mb-4 sb-4">
                        <label for="exampleFormControlInput1" class="form-label">Transaction Caption</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Details about the transaction" name="category" value="<?php echo $category ?>"
                            required />
                    </div>
                    <br>
                    <button type="submit" class="btn" style="background-color:#007ea7;color:white">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>