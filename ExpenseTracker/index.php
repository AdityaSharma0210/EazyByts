<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include "db-connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <title>Finance Tracker</title>

    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: white;
        color: black;
        font-family: "Nunito", sans-serif;
    }

    .c1 {
        margin: 30px auto;
    }

    .c2 {
        margin: 40px auto;
    }

    .c3 {
        margin: 0px auto;
    }

    .c4 {
        font-size: 35px;
    }

    .c5 {
        margin: 20px auto;
    }

    .c6 {
        padding: 20px;
        border-radius: 20px;
        border: 4px solid #007ea7;
    }

    h1,
    h3 {
        color: #023047;
    }

    hr {
        border: 3px solid #007ea7;
    }

    .c7 {
        margin: 20px auto;
        border-radius: 20px;
        border: 4px solid #007ea7;
    }

    .tble {
        text-align: center;
        margin: 20px auto;
    }

    .c8 {
        margin-top: 50px;
    }

    .c9 {
        margin-bottom: 200px;
    }

    .alert {
        margin: 5px auto;
    }
    </style>
</head>

<body>
    <?php

        $conns = new mysqli("localhost", "root", "", "db_expensetracker");

        $sql1 = "SELECT SUM(transaction) AS income FROM `tbl_data` WHERE type=1; ";
        $stmt1 = $conns->query($sql1);
        $result1 = $stmt1->fetch_assoc();
        if ($result1) {
             $income = $result1["income"];
        }

        $sql2 = "SELECT SUM(transaction) AS expense FROM `tbl_data` WHERE type=2; ";
        $stmt2 = $conns->query($sql2);
        $result2 = $stmt2->fetch_assoc();
        if ($result2) {
            $expense = $result2["expense"];
        }

        $sql3 = "SELECT SUM(transaction) AS investment FROM `tbl_data` WHERE type=3; ";
        $stmt3 = $conns->query($sql3);
        $result3 = $stmt3->fetch_assoc();
        if ($result3) {
            $investment = $result3["investment"];
        }

        $balance= $income - $expense;
    ?>

    <div class="container c1">
        <div class="row c2">
            <center>
                <h1>Finance Tracker</h1>
            </center>
        </div>
        <hr />
        <div class="row c2">
            <div class="col-md-7 col-sm-7 c3">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="card mb-3 sb-3" style="max-width: 18rem ; background-color:#023047 ;color:white">
                            <div class="card-header" style="font-size: 15px">BALANCE</div>
                            <div class="card-body">
                                <h5 class="card-title">Rs .</h5>
                                <p class="card-text c4">
                                    <?php echo $balance;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card mb-3 sb-3" style="max-width: 18rem ; background-color:#007ea7; color:white">
                            <div class="card-header" style="font-size: 15px">INCOME</div>
                            <div class="card-body">
                                <h5 class="card-title">Rs .</h5>
                                <p class="card-text c4">
                                    <?php echo $income;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card mb-3 sb-3" style="max-width: 18rem; background-color:#8ecae6; color:white">
                            <div class="card-header" style="font-size: 15px">EXPENSES</div>
                            <div class="card-body">
                                <h5 class="card-title">Rs .</h5>
                                <p class="card-text c4">
                                    <?php echo $expense;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card mb-3 sb-3"
                            style="max-width: 18rem; background-color:lightslategrey; color:white">
                            <div class="card-header" style="font-size: 15px">INVESTMENT</div>
                            <div class="card-body">
                                <h5 class="card-title">Rs .</h5>
                                <p class="card-text c4">
                                    <?php echo $investment;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 c5">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 c6">
                <div class="row">
                    <form action="process.php" method="post">
                        <center>
                            <h3>Add Transaction</h3>
                        </center>
                        <hr />
                        <div class="row alert">
                            <?php
						if($_REQUEST["msg"]==3)
						{
							?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Transaction added successfully!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
						}
					?>
                        </div>
                        <div class="mb-4 sb-4">
                            <label for="exampleFormControlInput1" class="form-label">Transaction Amount</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter amount In Rupees" name="transaction"
                                value="<?php echo $_SESSION["transaction"]; ?>" required />
                        </div>
                        <div class="mb-4 sb-4">
                            <label for="exampleFormControlInput1" class="form-label">Transaction Type</label>
                            <select class="form-select" aria-label="Default select example" name="type"
                                value="<?php echo $_SESSION["type"]; ?>" required>
                                <option selected>Select</option>
                                <option value="1">Income</option>
                                <option value="2">Expense</option>
                                <option value="3">Investment</option>
                            </select>
                        </div>
                        <div class="mb-4 sb-4">
                            <label for="exampleFormControlInput1" class="form-label">Transaction Caption</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Details about the transaction" name="category"
                                value="<?php echo $_SESSION["category"]; ?>" required />
                        </div>
                        <br>
                        <button type="submit" class="btn" style="background-color:#007ea7;color:white">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row c2" id="table">
            <div class="row c8">
                <center>
                    <h1>Transaction History</h1>
                </center>
            </div>
            <div class="row alert">
                <?php
						if($_REQUEST["msg"]==1)
						{
							?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Transaction deleted successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
						}
					?>
                <?php
						if($_REQUEST["msg"]==2)
						{
							?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Transaction updated successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
						}
					?>

            </div>
            <div class="row c7">
                <div class="col-md-10 col-sm-10" style="margin: auto;">
                    <div class="table-responsive-sm">
                        <table class="table tble">
                            <thead>
                                <th scope="col">Transaction Amount</th>
                                <th scope="col">Transaction Type</th>
                                <th scope="col">Transaction Caption</th>
                                <th scope="col">Delete / Edit</th>
                            </thead>
                            <?php 
            $stmt = $conn->query("select * from tbl_data ");
            while($row=$stmt->fetch())
            {
                ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?php echo $row["transaction"] ?></td>
                                    <td scope="row">
                                        <?php
                                        if($row["type"]==1){
                                            echo "income" ;
                                        }
                                        elseif($row["type"]==2){
                                            echo "expense";
                                        }
                                        else{
                                            echo "investment";
                                        }
                                    ?>
                                    </td>
                                    <td scope="row"><?php echo $row["category"] ?></td>
                                    <td scope="row">
                                        <a style="text-decoration:none"
                                            href="delete.php?deleteId=<?php echo $row["id"]; ?>">
                                            <img src="delete1.png">
                                        </a>
                                        /
                                        <a href="edit.php?editId=<?php echo $row["id"]; ?>"
                                            style="text-decoration:none">
                                            <img src="edit1.png" alt="edit">
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                            <?php
            }
            ?>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Balance',
                'Income',
                'Expense',
                'Investment'
            ],
            datasets: [{
                    label: 'Amount: ',
                    data: [<?php echo $balance; ?>, <?php echo $income; ?>, <?php echo $expense; ?>,
                        <?php echo $investment; ?>
                    ],
                    backgroundColor: [
                        '#023047',
                        '#007ea7',
                        '#8ecae6',
                        '#778899'
                    ],
                    hoverOffset: 4,
                    borderRadius: 10,
                    borderWidth: 5
                },

            ]
        },
        options: {
            cutout: '70%',
        }
    });
    </script>

</body>

</html>