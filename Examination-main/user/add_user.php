<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js
"></script>
<link rel="stylesheet" href="../css/adduser.css" type="text/css"> 
</head>
<body>
    <form style="" method="post" action="add_user.php">
    <div style="padding-top: 30px;padding-bottom:30px;margin-top:90px;background-color:white;border-radius:10px;padding:20px;max-width:800px;" class="container">
		<h3 style="font-size:30px;font-weight:bold;color:#064d99;text-align:center;">Add New User</h3>
		  <!-- ACADEMIC YEAR BLOCK -->
		   <div>
        <h3>
          <label style="margin-top:10px;display:flex;justify-content:center;" class="d-flex justify-content-center" for="drop1">Academic Year:-
            <?php
            if (date("m") > 5) {
            ?>
              <?php echo date("Y") . '-' . (date("y") + 1);  ?>
            <?php } else { ?>
              <?php echo (date("Y") - 1) . '-' . date("y");     ?>
            <?php } ?></label>
        </h3>
      </div>
	</div>


      
        <div class="wrapper">
            <div class="form">
                <!-- Academic Year -->
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <span for="drop1">Academic Year:-</span>

                        <div class="year">
                            <select class="form-select" aria-span="Default select example" id="drop1">
                                <?php
                                if (date("m") > 5) {
                                    ?>
                                    <option class="col-md-3 col-sm-3" value="2022-2023">
                                        <?php echo date("Y") . '-' . (date("y") + 1);
                                        ?>
                                    </option>
                                <?php } else { ?>
                                    <option class="col-md-3 col-sm-3" value="2023-2024">
                                        <?php echo (date("Y") - 1) . '-' . date("y");
                                        ?>
                                    </option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <!-- DEPARTMENT -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <div style="" class=" department ">
                            <span for="drop2">Department:-</span>
                            <select class="form-select" aria-span="Default select example" id="department" name="d_id">
                                <option disabled selected>Select Department</option>
                                <?php
                                require "../connect.php";
                                $sql = "SELECT * FROM department;";
                                $result = mysqli_query($conn, $sql);
                                while ($department = mysqli_fetch_assoc($result)) {
                                    echo "<option id='d_id' value='" . $department['d_id'] . "'>" . $department['name'] . "</option>";
                                }
                                ?>

                            </select>


                        </div>
                    </div>
                </div>

                <!-- NAME OF PROFESSOR -->

                <div class="prof  justify-content-center">
                    <span for="drop2">ProfessorName:-</span>
                    <select class="form-select" aria-span="Default select example" id="p_id" name="p_id">
                        <option disabled selected>Select professor</option>
                    </select>
                </div>
                <!-- EMAIL -->
                <div class="row">
                    <div class="col-md-12 mt-md-0 mt-3">
                        <div class="user ">
                            <span for="">Email:-</span>
                            <div class=" ok input-group ">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- USERNAME -->
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <div class="user">
                            <span for="">Username:-</span>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>

                        </div>
                    </div>
                    <!-- PASSWORD -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <div class="pass ">
                            <span for="">Password:-</span>
                            <div class="input-group ">
                                <span class="input-group-text">$</span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TYPE ||| ADMIN AND OTHER -->
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <span>Type:-</span>
                        <div class="d-flex align-items-center mt-2">
                            <label class="option">
                                <input type="radio" name="type" id="Admin" value="A">Admin
                                <span class="checkmark" for="Admin"></span>
                            </label>
                            <label class="option ms-4   ">
                                <input type="radio" name="type" id="Other" value="O">Other
                                <span class="checkmark" for="Other"></span></label>
                        </div>
                    </div>
                    <!-- TYPE|||ACTIVE AND INACTIVE -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <span>Active:-</span>
                        <div class="d-flex align-items-center mt-2">
                            <label class="option">
                                <input type="radio" name="active" id="Yes" value="A">Yes
                                <span class="checkmark" for="Yes"></span>
                            </label>
                            <label class="option ms-4">
                                <input type="radio" name="active" id="No" value="I">No
                                <span class="checkmark" for="No"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div style="margin-top: 20px;" class="container">

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-lg btn-block btn-success">Submit</button>

                    </div>
                </div>

            </div>
        </div>
    </form>
    <?php
error_reporting(0);

    if (isset($_POST["username"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $type = $_POST["type"];
        $acti = $_POST["active"];
        $d_id = $_POST['d_id'];
        $p_id = $_POST['p_id'];
        $email = $_POST['email'];
        //echo "$user,$pass,$type,$acti,$d_id,$p_id";
        $sql = "INSERT INTO `login` VALUES ('$user','$pass','$type','$acti','$p_id','$email')";
        //echo "<script>alert('$user')</script>";
        $q = $conn->query($sql);
        if ($q) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
            <strong>Sucess!</strong> Data saved sucessfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-span="Close"></button>
          </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
            <strong>Error!</strong> something went wrong.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-span="Close"></button>
          </div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
            <strong>Warning!</strong> please select a valid department and name .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-span="Close"></button>
          </div>';

    }


    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#department').change(function () {
                var d_id = $(this).val();
                //alert (d_id);

                $.ajax({

                    type: 'POST',
                    cache: false,
                    url: 'add_user2.php',
                    data: {
                        id: d_id
                    },
                    success: function (data) {
                        $('#p_id').html(data);
                    }
                });
            });
        });
    </script>


</body>

</html>