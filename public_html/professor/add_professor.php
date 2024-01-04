<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/587a7128aa.js" crossorigin="anonymous"></script>
  <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js
"></script>
  <style>
body {
    background: #eee;
    min-height: 100vh;
}
.wrapper {
    max-width: 800px;
    margin: 10px auto;
    padding: 30px 45px;
    box-shadow: 5px 25px 35px #3535356b;
    background-color: white;
    border-radius: 10px;
}
.wrapper label {
    display: block;
    padding-bottom: 0.2rem;
}
.wrapper .form .row {
    padding: 0.6rem 0;
}
.wrapper .form .option {
    position: relative;
    padding-left: 20px;
    cursor: pointer;
}


.wrapper .form .option input {
    opacity: 0;
}

.wrapper .form .checkmark {
    position: absolute;
    top: 1px;
    left: 0;
    height: 20px;
    width: 20px;
    border: 1px solid #bbb;
    border-radius: 50%;
}



.wrapper .form .option .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: linear-gradient(45deg, #ce1e53, #8f00c7);
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s;
}

.wrapper .form .option input[type="radio"]:checked~.checkmark {
    background: #fff;
    transition: 300ms ease-in-out 0s;
}

.wrapper .form .option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1);
}

  </style>
</head>

<body>

  <form   method="post" action="add_professor.php">
  <div style="max-width: 818px; "class="container">
  <div style=" margin-top: 70px; padding-top: 30px;
padding-bottom: 30px;
background-color:white; border-radius:10px;" class="containermaintext container">
                <h3 style="font-size:30px" class="text-center">Add New Professor</h3>
            </div><hr class="mx-n3">  
    </div>
<div  class="wrapper">

              <!-- ACADEMIC YEAR BLOCK -->
              <div style="padding: 20px; " class=" container"><h3>
                  <label class="d-flex  justify-content-center"  for="drop1">Academic Year:-
                    <?php
                    if (date("m") > 5) {
                    ?>
                      <?php echo date("Y") . '-' . (date("y") + 1);  ?>
                    <?php } else { ?>
                      <?php echo (date("Y") - 1) . '-' . date("y");     ?>
                    <?php } ?></label></h3>
                </div>
<div class="form">
    <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Full Name</label>
            <input type="name" placeholder="Enter Full Name" name="pname" id="profname" class="form-control " />
        </div>

        <!-- DATE OF JOINING -->
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Date Of Joining</label>
            <input type="date"  name="doj" id="doj" class="form-control " />
        </div>
    </div>
    <!-- Department -->
    <div class="row">
    <div class="col-md-6 mt-md-0 mt-3">
            <label>Department</lable>
            <div style="padding:10px; font-size:20px" class="dropdown row">
              <select name="department" id="department">
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
<!-- Programmm -->
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Programme</lable>
         
            <div style="padding:10px; font-size:20px" class="dropdown row">
              <div class="col-12 text-center"></div>
              <select name="programme" id="programme" onchange="getprogramme(this.value);">

                <option disabled selected>Select programme</option>
              </select>
              <br>
            </div>
         
    </div>

              </div>
<!-- Course -->
<div class="row">
    <div  class="col-md-6 mt-md-0 mt-3">
            <label>Course</lable>
            <div  style="padding:10px; font-size:20px"  class="dropdown row">
              <div class=" text-center"></div>
              <select name="course" id="course">
                <option disabled selected>Select course</option>
              </select>
              <br>
            </div>
         
    </div>
<!-- Designation -->

  <!-- DESIGNATION BLOCK -->



                
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Designation</lable>
         
            <div style="padding:10px; font-size:20px" class="dropdown row">
              <div class="col-12 text-center"></div>
              <select name="designation" id="dsgn">
              <option selected disabled>Select Designation</option>
                <option>Dean</option>
                <option>HOD</option>
                <option>Professor</option>
                <option>Associate Professor</option>
                <option>Assitant Professor</option>
              </select>
              <br>
            </div>
         
    </div>
              </div>

<!-- type -->
    <div class="row">
    <div class="col-md-6 mt-md-0 mt-3">
            <label>Type</label>
            <div class="d-flex align-items-center mt-2">
                <label class="option">
                    <input type="radio" name="type" id="regular" value="R">Regular
                    <span class="checkmark"></span>
                </label>
                <label class="option ms-4">
                <input type="radio" name="type" id="visiting" value="V">Visiting
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
<!-- Examcommiteemember -->
        <div class="col-md-6 mt-md-0 mt-3">
            <label>Exam Commitee Member</label>
            <div class="d-flex align-items-center mt-2">
                <label class="option">
    
                  <input type="radio" name="ecm" id="" value="yes">Yes
                    <span class="checkmark"></span>
                </label>
                <label class="option ms-4">
                <input type="radio" name="ecm" id="" value="no">No
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>


    </div>
    <hr>
    <div class="row">
    <div  class="col-md-12  ">
    <div  class="d-flex justify-content-center mt-2">
                <label  class="option">
    
                  <input type="radio" name="staff" value="reg">Regular
                    <span class="checkmark"></span>
                </label>
                <label class="option ms-4">
                <input type="radio" name="staff" value="sfc">SFC
                    <span class="checkmark"></span>
                </label>
                <label class="option ms-4">
                <input type="radio" name="staff" value="both">Both
                    <span class="checkmark"></span>
                </label>
            </div>
              </div>

    <button type="submit" class="btn btn-outline-primary  mt-3">Submit</button>

  </div>
</div>
</div>

</div>
     </form>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#department').change(function() {
        var d_id = $(this).val();
        // alert (d_id);

        $.ajax({

          type: 'POST',
          cache: false,
          url: 'fetch.php',
          data: {
            id: d_id
          },
          success: function(data) {
            $('#programme').html(data);
          }
        });
      });
    });

    $(document).ready(function() {
      $('#programme').change(function() {
        var pr_id = $(this).val();


        $.ajax({

          type: 'POST',
          cache: false,
          url: 'fetchcourse.php',
          data: {
            id: pr_id
          },
          success: function(data) {
            $('#course').html(data);
          }
        });
      });
    });
  </script>
  <?php
  require ("../connect.php");
  if(isset($_POST['pname'])){
    $name=$_POST["pname"];
    $doj= $_POST['doj'];
    $dept=$_POST['programme'];
    $prog=$_POST['department'];
    $course=$_POST['course'];
    $type=$_POST['type'];
    $ecm=$_POST['ecm'];
    $designation=$_POST['ecm'];
    $staff=$_POST['staff'];
    
    $sq="INSERT INTO `professor`( `name`,`d_id`,`doj`,`reg_sfc`,`type`,`ecm`,`designation`)
    VALUES ('$name','$dept','$doj','$staff','$type','$ecm','$designation')";
  
    
    if($conn->query($sq)){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
       <strong>Sucess!</strong> Data saved sucessfully.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    } 
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
       <strong>Error!</strong> something went wrong.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }

  }
  ?>

  
</body>

</html>







