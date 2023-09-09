<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manageprofessor info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
</html> -->
<?php
require "../connect.php";
$p_reson=$_POST['p_reson'];
$p_id=$_POST['p_id'];
$datee=$_POST['p_date'];
// echo $p_reson,$p_id,$datee;
$sq = "INSERT INTO `unavailability`( `date`,`reason`,`p_id`)
    VALUES ('$datee','$p_reson','$p_id')";
    $res=$conn->query($sq);
    if($res){
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

    
?>
