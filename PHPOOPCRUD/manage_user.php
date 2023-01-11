<?php 
include("db.php");
$obj = new query();
$stud_name = "";
$stud_email = "";
$stud_address = "";
$stud_salary ="";
if(isset($_GET['id'])&&$_GET['id']!=""){
    $stud_id = $obj->get_safe_str($_REQUEST['id']);
    $condition_arr = array('stud_id'=>$stud_id);

    $result=$obj->getData("stud_mst","*",$condition_arr);
    $stud_name = $result[0]['stud_name'];
    $stud_email = $result[0]['stud_email'];
    $stud_address = $result[0]['stud_address'];
    $stud_salary = $result[0]['stud_salary'];
    
}

if(isset($_REQUEST['btnsubmit'])){
    $stud_name = $obj->get_safe_str($_REQUEST['stud_name']);
    $stud_email = $obj->get_safe_str($_REQUEST['stud_email']);
    $stud_address = $obj->get_safe_str($_REQUEST['stud_address']);
    $stud_salary = $obj->get_safe_str($_REQUEST['stud_salary']);

    
    $condition_arr = array('stud_name'=>$stud_name,'stud_email'=>$stud_email,'stud_address'=>$stud_address,'stud_salary'=>$stud_salary);
    
    if($stud_id=="")
        $result=$obj->insertData("stud_mst",$condition_arr);
    else
        $result=$obj->updateData("stud_mst",$condition_arr,'stud_id',$stud_id);
    header("location:stud.php");
}
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <form method="post">
        <h1 align="center">Insert Data</h1>
        <div>
            <div>Student Name</div>
            <div><input type="text" name="stud_name" class="form-control" required value="<?php echo $stud_name; ?>"></div>
        </div>
        <div>
            <div>Student Email</div>
            <div><input type="email" name="stud_email" class="form-control"required value="<?php echo $stud_email; ?>"></div>
        </div>
        <div>
            <div>Student Address</div>
            <div><input type="text" name="stud_address" class="form-control"required value="<?php echo $stud_address; ?>"></div>
        </div>
        <div>
            <div>Student Salary</div>
            <div><input type="text" name="stud_salary" class="form-control"required value="<?php echo $stud_salary; ?>"></div>
        </div>
        <div>
            <div align="center"><input type="submit"class="btn btn-success" name="btnsubmit">
            <input type="reset"class="btn btn-danger"></div>
        </div>
    </form>
</body>
</html>