<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>allotment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/indexmain.css" type="text/css">
</head>

<body>
    <div style="margin-top:90px;background-color:white;border-radius:10px;padding:20px;max-width:800px;"
        class="container">
        <h3 style="font-size:30px;font-weight:bold;color:#064d99;text-align:center;">Feed Timetable</h3>
        <!-- ACADEMIC YEAR BLOCK -->
        <div>
            <h3>
                <label style="margin-top:10px;display:flex;justify-content:center;"
                    class="d-flex justify-content-center" for="drop1">Academic Year:-
                    <?php
                    if (date("m") > 5) {
                        ?>
                        <?php echo date("Y") . '-' . (date("y") + 1); ?>
                    <?php } else { ?>
                        <?php echo (date("Y") - 1) . '-' . date("y"); ?>
                    <?php } ?>
                </label>
            </h3>
        </div>
    </div>


    <form class="row g-1" method="post" action="allotment.php">


        <div class="formm">
            <div class="sizeform">
                <!-- ACADEMIC YEAR -->
                <label for="drop1">Academic Year:-</label>

                <div class="year">
                    <select name="ay" class="form-select" aria-label="Default select example" id="drop1">

                        <option class="col-md-3 col-sm-3" value="<?php echo (date("Y")); ?>">
                            <?php echo date("Y") . '-' . (date("y") + 1);
                            ?></option>

                        <option class="col-md-3 col-sm-3" value="<?php echo (date("Y") - 1); ?>">
                            <?php echo (date("Y") - 1) . '-' . date("y"); ?></option>
                    </select>
                </div>

                <div class="div">
                    <hr class="mx-n3">
                </div>
                <!-- EXAM TYPE -->
                <label for="drop2">Exam type :-</label>
                <select name="exam" class="form-select" aria-label="Default select example" id="exam">
                    <option disabled selected>Select Exam type </option>
                    <option value="1">Class test </option>
                    <option value="2">Regular </option>
                    <option value="3">ATKT</option>
                </select>
                <div class="div">
                    <hr class="mx-n3">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <?php require '../connect.php';

    if (isset($_POST['exam'])) { ?>
        <div class="formm1">
            <div class="sizeform">
                <div class="table-responsive">
                    <table class='table table-hover mx-auto px-auto' id="table">
                        <?php

                        echo "
            <table border='3' class='table table-hover mx-auto px-auto'>
            <thead class='thead-dark'>
            <th >Date</th>
            <th>nob</th>
            </thead>
            ";

                        $e = $_POST["exam"];
                        $ay = $_POST['ay'];
                        $sql = "SELECT `date`, SUM(nob) as nob FROM timetable  WHERE e_id='$e' and academic_year='$ay' group by date;";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($result) {
                            $result1 = $result->fetch_all(MYSQLI_ASSOC);

                            foreach ($result1 as $row) {

                                $date = $row['date'];
                                $nob = $row['nob'];
                                echo "<tr> 
                    <td>" . $date . "</td>
                     <td>" . $nob . "</td>          
                </tr>
                ";
                            }
                        } else {
                            echo "No data found";
                        }
    } else {
        echo "<script>";
        echo 'alert("Please Select Exam type")';
        echo "</script>";
    }
    ?>

            </div>
        </div>
    </div>

</body>

</html>