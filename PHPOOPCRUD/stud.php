<?php
include("db.php");
$obj = new query();

if(isset($_GET['type']) && $_GET['type']=='delete'){
    $id = $obj->get_safe_str($_GET['id']);
    $condition_arr = array('stud_id'=>$id);
    $result=$obj->deleteData("stud_mst",$condition_arr);
}

$result=$obj->getData("stud_mst",'*');
//echo "<pre>";
//print_r($result);
?>
<html>
    <head>
        <title>MVC Website</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</html>
<body>
    <a href="manage_user.php"class="btn btn-success">Add user</a>
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student Address</th>
            <th>Student Salary</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result[0])) {
                $i = 1;
                foreach ($result as $list) {
                    
                    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $list['stud_name']; ?></td>
            <td><?php echo $list['stud_email']; ?></td>
            <td><?php echo $list['stud_address']; ?></td>
            <td><?php echo $list['stud_salary']; ?></td>
            <td>
               <a href="manage_user.php?id=<?php echo $list['stud_id']; ?>" class="btn btn-primary"> Edit</a>
               <a href="?type=delete&id=<?php echo $list['stud_id']; ?>" class="btn btn-danger"onclick="return confirm('Are you sure want to delete?');">Delete</a>
            </td>
        </tr>
        <?php
        $i++;
                }
            } else {
        ?>
        <tr>
            <td colspan="6">NO DATA FOUND</td>
        </tr>
        
        <?php
            }
        ?>
        </tbody>
    </table>
</body>