<?php session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="~/../libs/bootstrap.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Students Details</h2>
                        <a href="view/insert.php" class="btn btn-success pull-right">Add New Student</a>
                    </div>
                    <?php
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";                                        
                                        echo "<th>Sports Name</th>";
                                        echo "<th>Sports Department</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['stud_id'] . "</td>";                                        
                                        echo "<td>" . $row['stud_name'] . "</td>";
                                        echo "<td>" . $row['stud_dept'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='index.php?act=update&id=". $row['stud_id'] ."' title='Update Record' data-toggle='tooltip'>EDIT</i></a>&nbsp;&nbsp;&nbsp;";
                                        echo "<a href='index.php?act=delete&id=". $row['stud_id'] ."' title='Delete Record' data-toggle='tooltip'>DELETE</i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>