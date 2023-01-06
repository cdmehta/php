<?php
        require '../model/students.php'; 
        session_start();             
        $studenttb=isset($_SESSION['studenttbl0'])?unserialize($_SESSION['studenttbl0']):new students();            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Student</h2>
                    </div>
                    <form action="../index.php?act=update" method="post" >
                        <div class="form-group <?php echo (!empty($studenttb->name_msg)) ? 'has-error' : ''; ?>">
                            <label>Student Name</label>
                            <input type="text" name="stud_name" class="form-control" value="<?php echo $studenttb->stud_name; ?> ">
                            <span class="help-block"><?php echo $studenttb->name_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($studenttb->dept_msg)) ? 'has-error' : ''; ?>">
                            <label>Student Department</label>
                            <input type="text" name="stud_dept" class="form-control" value="<?php echo $studenttb->stud_dept; ?>">
                            <span class="help-block"><?php echo $studenttb->dept_msg;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $studenttb->stud_id; ?>"/>
                        <input type="submit" name="updatebtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>