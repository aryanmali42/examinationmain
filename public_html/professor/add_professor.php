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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <link rel="stylesheet" href="../css/addprof.css">
</head>

<body>

<div style="max-width:800px;border-radius:10px;background-color:white; margin-top: 10px; padding-top: 10px;padding-bottom: px;" class="container">

                <h3 style="font-size:30px;color:gray;font-weight:550;" class="text-center">Add New Professor</h3>

                <!-- ACADEMIC YEAR BLOCK -->
     
        <h3 style="display:flex;justify-content:center;font-weight:300;">
          <label class="" for="drop1">Academic Year:-
            <?php
            if (date("m") > 5) {
            ?>
              <?php echo date("Y") . '-' . (date("y") + 1);  ?>
            <?php } else { ?>
              <?php echo (date("Y") - 1) . '-' . date("y");     ?>
            <?php } ?></label>
        </h3>

</div>         


<div class="frmm ">

  <form method="post" action="add_professor.php">
    
      
    
    
<div style="padding:10px;" class="row">
      <div class="col">
            <label style="color:grey;">Full Name:-</label>
            <input type="name" placeholder="Enter Full Name" name="pname" id="profname" class="form-control " />
      </div>

          <!-- DATE OF JOINING -->
      <div class="col">
            <label style="color:grey;">Date Of Joining:-</label>
            <input type="date" name="doj" id="doj" class="form-control " />
      </div>
</div>
        <?php

        //index.php

        include('../connect.php');

        $query = "
          SELECT * FROM department 
ORDER BY name ASC
";
        $statement = $conn->prepare($query);
        $statement->execute();
        $resultSet = $statement->get_result();
        $result = $resultSet->fetch_all(MYSQLI_ASSOC);
        ?>
        <!-- DEPARTMENT BLOCK -->
       
          
<div style="padding:10px;" class="row">
  <div class="col">
              <label style="color:grey;">Select Departments:-</Select></label><br />
              <select id="first_level" name="first_level[]" multiple class="form-control">
                <?php
                foreach ($result as $row) {
                  echo '<option value="' . $row["d_id"] . '">' . $row["name"] . '</option>';
                }
                ?>
              </select>
  </div>
            <!-- PROGRAMME BLOCK -->

  <div class="col">
              <label style="color:grey;">Select Programs:-</label><br />
              <select id="second_level" name="second_level[]" multiple class="form-control">
              </select>
  </div>

</div>
            <!-- COURSE BLOCK -->
<div style="padding:10px;" class="row">
        <div class="col">
              <label style="color:grey;">Select Courses:-</label><br />
              <select id="third_level" name="third_level[]" multiple class="form-control">
              </select>
        </div>
        <!-- DESIGNATION BLOCK -->

        <div class="col">
          <div style="padding-left:15px;padding-top:5px;">
          
          <label style="color:grey;">Designation:-</lable>
            <div style="width:300px;" class="dropdown row">
            <select class="form-control" id="dsgn">
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
</div>

      <!-- type -->
<div style="padding:px;" class="row">
    <div class="col">
          <label style="color:grey;">Type:-</label>
        <div class="d-flex align-items-center mt-2">
            <label class="option">
              <input type="radio" name="type" id="regular" value="R">Regular
              <span class="checkmark" for="regular"></span>
            </label>
            <label class="option ms-4">
              <input type="radio" name="type" id="visiting" value="V">Visiting
              <span class="checkmark" for="visiting"></span>
            </label>
        </div>
    </div>
        <!-- Examcommiteemember -->
    <div class="col">
          <label style="color:grey;">Exam Commitee Member:-</label>
        <div class="d-flex align-items-center mt-2">
            <label class="option">
              <input type="radio" name="ecm" id="yes" value="yes">Yes
              <span class="checkmark" for="yes"></span>
            </label>
            <label class="option ms-4">
              <input type="radio" name="ecm" id="no" value="no">No
              <span class="checkmark" for="no"></span>
            </label>
        </div>
    </div>
</div>
      <hr>
      
        <div class="radio3">
          <div class="d-flex justify-content-center mt-2">
            <label class="option">

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
                <!-- Submit Button -->
                <div style="" class="d-grid gap-2 submit">
          
                <button type="submit" class="btn btn-outline-primary">Submit</button>
          
              </div>

  
 
  </form>
  </div>
  <script>
    $(document).ready(function() {

      $('#first_level').multiselect({
        nonSelectedText: 'Select Deparment(s)',
        buttonWidth: 'auto',
        onChange: function(option, checked) {
          $('#second_level').html('');
          $('#second_level').multiselect('rebuild');
          $('#third_level').html('');
          $('#third_level').multiselect('rebuild');
          var selected = this.$select.val();
          
          if (selected.length > 0) {
            $.ajax({
              url: "fetch_second_level_category.php",
              method: "POST",
              data: {
                selected: selected
              },
              success: function(data) {
                $('#second_level').html(data);
                $('#second_level').multiselect('rebuild');
              }
            })
          }
        }
      });

      $('#second_level').multiselect({
        nonSelectedText: 'Select Program(s)',
        buttonWidth: 'auto',
        onChange: function(option, checked) {
          $('#third_level').html('');
          $('#third_level').multiselect('rebuild');
          var selected = this.$select.val();
          if (selected.length > 0) {
            $.ajax({
              url: "fetch_third_level_category.php",
              method: "POST",
              data: {
                selected: selected
              },
              success: function(data) {
                $('#third_level').html(data);
                $('#third_level').multiselect('rebuild');
              }
            });
          }
        }
      });

      $('#third_level').multiselect({
        nonSelectedText: 'Select Course(s)',
        buttonWidth: 'auto'
      });

    });
  </script>

  <?php
  require("../connect.php");
  if (isset($_POST['pname'])) {
    $name = $_POST["pname"];
    $doj = $_POST['doj'];
    $department = $_POST['first_level'];
   // $prog = $_POST['department'];
    $course = $_POST['third_level'];
    $type = $_POST['type'];
    $ecm = $_POST['ecm'];
    $designation = $_POST['designation'];
    $staff = $_POST['staff'];

    $sq = "INSERT INTO `professor`( `name`,`doj`,`reg_sfc`,`type`,`ecm`,`designation`)
    VALUES ('$name','$doj','$staff','$type','$ecm','$designation')";
    $res=$conn->query($sq);
    $sq2="Select p_id from professor where name='$name' and doj='$doj' and reg_sfc='$staff' and type='$type' and ecm= '$ecm' and designation='$designation'";
    $res2=$conn->query($sq2);
    $row = $res2->fetch_assoc();
    $id=$row['p_id'];
    foreach($department as $d){
    $sq3="INSERT INTO p_department VALUES ($id,$d);";
    $res3=$conn->query($sq3);
    }
    foreach($course as $c){
      $sq4="INSERT INTO p_course VALUES ($id,$c);";
    $res4=$conn->query($sq4);
    }
    if ($res4) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
       <strong>Sucess!</strong> Data saved sucessfully.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
       <strong>Error!</strong> something went wrong.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
  }
  ?>


</body>

</html>